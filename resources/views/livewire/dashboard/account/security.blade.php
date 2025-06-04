<div>
    @if ($authPassword)
        <div class="headerTop p-6 bg-white rounded-lg shadow-md relative mx-auto mt-10">
            <form wire:submit.prevent="changePassword">
                <div class="mb-4 relative">
                    <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="new_password" wire:model="new_password" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <span class="absolute right-3 top-8 cursor-pointer" onclick="togglePassword('new_password', this)">
                        <i class="far fa-eye"></i>
                    </span>
                    @error('new_password') 
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
                <!-- Confirm Password -->
                <div class="mb-4 relative">
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input type="password" id="confirm_password" wire:model="confirm_password" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <span class="absolute right-3 top-8 cursor-pointer" onclick="togglePassword('confirm_password', this)">
                        <i class="far fa-eye"></i>
                    </span>
                    @error('confirm_password') 
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Submit Button -->
                <div>
                    <button type="submit" class="px-4 py-2 bg-yellow-400 text-white rounded-md hover:bg-yellow-600">Confirm Password</button>
                </div>
            </form><!-- New Password -->
        </div>
    @else
        <div class="headerTop p-6 bg-white rounded-lg shadow-md relative mx-auto">
            <h2 class="text-xl font-semibold mb-4">Change Password</h2>
            <form wire:submit.prevent="validatecurrentPassword">
                <!-- Current Password -->
                <div class="mb-4 relative">
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input wire:model="currentPassword" type="password" id="current_password" wire:model="current_password" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <span class="absolute right-3 top-8 cursor-pointer" onclick="togglePassword('current_password', this)">
                        <i class="far fa-eye"></i>
                    </span>
                    @error('current_password') 
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
        
                <!-- Submit Button -->
                <div>
                    <button type="submit" class="px-4 py-2 bg-yellow-400 text-white rounded-md hover:bg-yellow-600">Change Password</button>
                </div>
            </form>
        </div>
    @endif

    
</div>

@push('script-body-field')
    <script>
        function togglePassword(fieldId, spanElement) {
            const passwordField = document.getElementById(fieldId);
            const icon = spanElement.querySelector('i');  // Get the icon inside the span
            const fieldType = passwordField.type === "password" ? "text" : "password";
            passwordField.type = fieldType;

            // Toggle the icon between eye and eye-slash
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        }
    </script>
@endpush
