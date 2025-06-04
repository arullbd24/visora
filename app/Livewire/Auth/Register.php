<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes;
use Livewire\Component;

use App\Library\Helper as HelperLibrary;
use App\Library\User as UserLibrary;

use App\Models\User;
use App\Models\Log\UserActivity;

use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class Register extends Component
{
    // ----- Protected
    protected $uuidUser;
    protected $username = '';
    
    // ----- Public
    public $fullname;
    public $email;
    public $phone_number;
    public $password;
    public $confirm_password;

    public function store()
    {
        $this->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email',
            'phone_number' => 'required|string',
            'password' => 'required|string|min:8|',
            'confirm_password' => 'required|same:password|string|min:8',
        ]);
        
        $this->uuidUser = HelperLibrary::generateUniqueUuId('v4', 'id_user', User\User::class);
        
        // create username
        // $tempUsername = '';
        // $this->fullname = trim($this->fullname);
        
        // $usernameExplode = explode(' ', ($this->fullname));
        // foreach($usernameExplode as $usernameWord) {
        //     $tempUsername .= ucfirst(mb_substr($usernameWord, 0, 1));
        // }
        
        // $isUsernameUnique = false;
        // $uuidUsername = '';
        // while(!$isUsernameUnique) {
        //     $uuidCheckExplode = explode('-', Uuid::uuid4());
        //     $uuidUsername = strtoupper($uuidCheckExplode[rand(0, count($uuidCheckExplode) - 1)]);
        //     if( ! (User\User::where('username', '=' ,  $tempUsername . $uuidUsername )->exists() ) ) {
        //         $isUsernameUnique = true;
        //     }
        // }
        
        // $this->username = $tempUsername . $uuidUsername;
        $this->username = UserLibrary\AuthHelper::createUsername($this->fullname);
        
        $userStore = User\User::create([
            'id_user' => $this->uuidUser,
            'email' => $this->email,
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);
         
        if  ($userStore) {
            $userPersonal = User\UserPersonal::create([
                'id_user' => $this->uuidUser,
                'fullname' => $this->fullname,
                'phone_number' => $this->phone_number,
            ]);
            
            $carbonNow = Carbon::now();
            UserLibrary\Activity::createActivity(
                $this->uuidUser,
                [
                    'Account', 'Settings',
                ],
                [
                    'title' => 'Created Account',
                    'type' => 'create',
                    'entity' => 'account',
                    'description' => $this->fullname . ' created first account at ' .  $carbonNow ,
                    'changes' => [],
                ]
            );

            session()->flash('success', 'Registration successful! Please login.');
            return redirect()->route('auth.login');  // Redirect to login route
        }else {
            session()->flash('error', 'There was an issue registering the account. Please try again.');
        }

        // if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        //     return redirect()->route('dashboard.main');
        // } else {
        //     session()->flash('error', 'Your email address or password may be incorrect!');
        // }

    }

    #[Attributes\Layout('auth.layouts.main')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
