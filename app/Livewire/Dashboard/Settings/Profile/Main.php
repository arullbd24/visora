<?php

namespace App\Livewire\Dashboard\Settings\Profile;

use Livewire\Attributes;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile\UserProfile;
use App\Models\User\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Main extends Component
{
    public $showPopup = false;
    public $showEditPopup = false;
    public $successMessage = false;
    public $successMessageEdit = false;
    public $user_profiles;
    public $profile_name;
    public $company;
    public $employment;
    public $id_user_profile;
    public $id_user;
    public $isDeleteModalOpen = false; // Status modal
    public $userIdToDelete; // ID user yang akan dihapus
    public $statusMessage; // Pesan untuk ditampilkan setelah modal ditutup
    // public $updateProfile = false, $addProfile = false;

    protected $listeners = [
        'deleteuser_profilesListner'=>'deleteuser_profiles'
    ];

    protected $rules = [
        'profile_name' => 'required',
        'company' => 'required',
        'employment' => 'required'
    ];

    public function saveProfile()
    {
        // dd($this->id_user_profile);
        $this->validate([
                    'profile_name' => 'required|string|max:255',
                    'company' => 'required|string|max:255',
                    'employment' => 'required|string|max:255',
                ]);

        $userProfile = UserProfile::where('id_user_profile', $this->id_user_profile)->first();
        // Pastikan ada ID pengguna sebelum melakukan update
        if ($this->id_user_profile) {
            $userProfile->update([
                'profile_name' => $this->profile_name,
                'company' => $this->company,
                'employment' => $this->employment,
            ]);

            // Reset form setelah menyimpan perubahan     
            $this->showEditPopup = false;     
            $this->successMessageEdit = true;
            session()->flash('error', 'ID pengguna tidak ditemukan untuk diperbarui.');
        } else {
            $userProfile = new UserProfile();
            $userProfile->create([
                'id_user_profile' => Str::uuid(),
                'id_user' => Auth::id(),
                'profile_name' => $this->profile_name,
                'company' => $this->company,
                'employment' => $this->employment,
                'status' => true,
                'locked' => false,
            ]);
            // Tampilkan pesan error jika id_user tidak ada
            $this->showPopup = false;
            $this->successMessage = true;
            $this->resetForm();
            session()->flash('error', 'ID pengguna tidak ditemukan untuk diperbarui.');
        }
        
    }
    
    #[Attributes\On('event_editProfile')]
    public function editProfile($data = null) {

        Log::info('Event Received', ['data' => $data]);

        if (!$data || !isset($data['id_user_profile'])) {
            Log::error('Data atau id_user_profile tidak ditemukan', ['data' => $data]);
            session()->flash('error', 'Data tidak valid.');
            return; // Menghentikan eksekusi jika data tidak valid
        }

        $userProfile = UserProfile::where('id_user_profile', $data['id_user_profile'])->first();
        if ($userProfile) {
            $this->id_user_profile = $userProfile->id_user_profile;
            $this->profile_name = $userProfile->profile_name;
            $this->company = $userProfile->company;
            $this->employment = $userProfile->employment;

            $this->dispatch('profile-edited', [
                'id_user_profile' => $userProfile->id_user_profile,
                'profile_name' => $userProfile->profile_name,
                'company' => $userProfile->company,
                'employment' => $userProfile->employment,
            ]);
        } else {
            // session()->flash('error', 'Data user profile tidak ditemukan.');
        }
        
        Log::info('Current User ID:', ['id_user_profile' => Auth::id()]);
        // dump(['data profile:' => UserProfile::where('id_user_profile', )]);
    }

    public function resetForm()
    {
        // Reset setiap properti yang terkait dengan form
        $this->profile_name = '';
        $this->company = '';
        $this->employment = '';
        // $this->showPopup = false;
    }

    public function deleteProfile($id_user)
    {
        try{
            Log::info('ID yang diterima untuk penghapusan: ' . $id_user); // Debug log
            // $userProfile = UserProfile::find($this->id_user);
            $userProfile = UserProfile::where('id_user', $id_user)->first();// Ambil data user profile berdasarkan id_user
            if ($userProfile) {
                $userProfile->delete(); // Menghapus data profile
                session()->flash('message', 'Profile berhasil dihapus!'); // Menampilkan pesan sukses
            } else {
                session()->flash('error', 'Profile tidak ditemukan!'); // Pesan error jika tidak ditemukan
            }
        } catch (\Exception $e) {
            $this->statusMessage = 'Error: ' . $e->getMessage();  // Pesan error
        }finally {
            $this->closeModal(); // Menutup modal setelah aksi
        }
        // try {
        //     Log::info('ID yang diterima untuk penghapusan: ' . $this->userIdToDelete);
    
        //     // Cari data berdasarkan id_user_profile
        //     // $userProfile = UserProfile::where('id_user_profile', $id_user_profile)->first();
        //     $userProfile = UserProfile::where('id_user_profile',$id_user)->firstOrFail();
        //      // Jika data ditemukan, hapus
        //     $userProfile->delete(); // Hapus data
        //     Log::info('Data berhasil dihapus untuk ID: ' . $this->userIdToDelete);
        //     session()->flash('message', 'Profile berhasil dihapus!');
        // } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        //     // Tangani jika tidak ada data ditemukan
        //     Log::info('Data tidak ditemukan untuk ID: ' . $this->userIdToDelete);
        //     session()->flash('error', 'Profile tidak ditemukan!');
        // } catch (\Exception $e) {
        //     // Tangani error lain yang mungkin terjadi
        //     Log::error('Error saat menghapus: ' . $e->getMessage());
        //     session()->flash('error', 'Terjadi kesalahan saat menghapus profile.');
        // } finally {
        //     $this->closeModal();
        // }
    }

    //Membuka modal konfirmasi
    public function confirmDelete($id_user)
    {
        // Log::info('ID User Profile diterima di confirmDelete: ' . $id_user);
        $this->isDeleteModalOpen = true;
        $this->userIdToDelete = $id_user;
        // Log::info('ID yang disimpan untuk penghapusan: ' . $this->userIdToDelete);
    }

    // Menutup modal tanpa aksi penghapusan
    public function cancelDelete()
    {
        $this->statusMessage = 'Profile cancel to deleted!';
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->isDeleteModalOpen = false;
        $this->userIdToDelete = null;
    }

    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        $user_profiles = Auth::user()->userProfile;
        // dd(Auth::user());
        return view('livewire.dashboard.settings.profile.main', [
            'list_profiles' => $user_profiles,
        ]);
    }
}
