<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-100 to-blue-50" >
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Reset Password</h2>
        <form wire:submit.prevent="bebas">
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-700 sm:text-sm" 
                    placeholder="Enter your email"
                >
                @error('email') 
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                {{-- <button
                    type="submit" 
                    class="w-full px-4 py-2 text-white bg-yellow-400 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-300">
                    Send OTP
                </button> --}}
                <a 
                    href="{{ route('Email_Confirm') }}" 
                    class="w-full px-4 py-2 text-white bg-yellow-400 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-300 block text-center"
                    role="button">
                    Send OTP
                </a>
            

            </div>
        </form>
    </div>
</div>
