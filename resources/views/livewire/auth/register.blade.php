<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-700 via-blue-600 to-blue-400">
    <div class="w-full max-w-md px-4">
        <div class="bg-white/80 p-8 rounded-xl shadow-2xl">
            <div class="flex justify-center mb-6">
                <div class="h-20 w-20 flex items-center justify-center rounded-full bg-blue-100 shadow">
                    <img src="{{ asset('assets/img/visora..png') }}" alt="" class="h-16 w-16 object-contain">
                </div>
            </div>
            <h2 class="text-center text-3xl text-blue-900 font-extrabold mb-8 tracking-wide">Create an Account</h2>
            <form wire:submit.prevent='store' id="registerForm" class="space-y-6">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-blue-900">Name</label>
                    <input required wire:model='fullname' type="text" id="name" name="name"
                        class="form-input block w-full rounded-lg border border-blue-300 bg-blue-50 text-blue-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Your name">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-blue-900">Email</label>
                    <input required wire:model='email' type="email" id="email" name="email"
                        class="form-input block w-full rounded-lg border border-blue-300 bg-blue-50 text-blue-900 focus:ring-blue-500 focus:border-blue-500" placeholder="you@email.com">
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-blue-900">Phone Number</label>
                    <input required wire:model='phone_number' type="tel" id="phone" name="phone"
                        class="form-input block w-full rounded-lg border border-blue-300 bg-blue-50 text-blue-900 focus:ring-blue-500 focus:border-blue-500" placeholder="08xxxxxxxxxx">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-blue-900">Password</label>
                    <input required wire:model='password' type="password" id="password" name="password"
                        class="form-input block w-full rounded-lg border border-blue-300 bg-blue-50 text-blue-900 focus:ring-blue-500 focus:border-blue-500" placeholder="********">
                </div>
                <div>
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-blue-900">Confirm Password</label>
                    <input required wire:model='confirm_password' type="password" id="confirm_password"
                        name="confirm_password"
                        class="form-input block w-full rounded-lg border border-blue-300 bg-blue-50 text-blue-900 focus:ring-blue-500 focus:border-blue-500" placeholder="********">
                    @error('confirm_password')
                        <span class="text-blue-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center">
                    <input required id="terms" name="terms" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="terms" class="ml-2 text-sm text-blue-900">I agree to the <a href="#" class="text-blue-600 underline">terms and conditions</a>.</label>
                </div>
                <div id="terms-error" class="text-red-500 text-sm hidden mb-4">Please accept the terms and conditions.</div>
                <button type="submit"
                    class="w-full text-white bg-gradient-to-r from-blue-600 to-blue-400 hover:from-blue-500 hover:to-blue-300 font-semibold rounded-lg text-base px-5 py-2.5 text-center shadow-lg transition duration-200">Register</button>
            </form>
            <div class="mt-6 text-center">
                <span class="text-sm text-blue-900">Already have an account? <a href="{{ route('auth.login') }}"
                        class="text-blue-600 underline" wire:navigate>Login</a></span>
            </div>
        </div>
        <footer class="mt-10 pb-8">
            <div class="w-full select-none">
                <div class="mx-auto w-fit">
                    <div class="flex items-center gap-2"
                        style="background: -webkit-linear-gradient(#E1EFFE,#1C64F2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        <span class="text-2xl"><i class="far fa-copyright"></i></span>
                        <span class="text-sm">{{ date('Y') }} Visora</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            const termsCheckbox = document.getElementById('terms');
            const termsError = document.getElementById('terms-error');
            if (!termsCheckbox.checked) {
                event.preventDefault();
                termsError.classList.remove('hidden');
            } else {
                termsError.classList.add('hidden');
            }
        });
    </script>
</div>
