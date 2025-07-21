<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-700 via-blue-600 to-blue-400">
    <div class="w-full max-w-md px-4">
        <div class="bg-white/20 backdrop-blur-lg p-8 rounded-xl shadow-2xl">
            <div class="flex justify-center mb-6">
                <div class="h-20 w-20 flex items-center justify-center rounded-full bg-white/30 shadow">
                    <img src="{{ asset('assets/img/visora..png') }}" alt="" class="h-16 w-16 object-contain">
                </div>
            </div>
            <h2 class="text-center text-3xl text-blue-900 font-extrabold mb-8 tracking-wide">Create an Account</h2>
            <form wire:submit.prevent='store' id="registerForm">
                <div class="relative mb-6">
                    <input required wire:model='fullname' type="text" id="name" name="name"
                        class="input-field text-base block w-full px-4 py-3 bg-blue-50/80 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-900 placeholder-transparent transition">
                    <label for="name"
                        class="floating-label absolute text-blue-400 transition-all duration-300 top-3 left-4 pointer-events-none">Name</label>
                </div>

                <div class="relative mb-6">
                    <input required wire:model='email' type="email" id="email" name="email"
                        class="input-field text-base block w-full px-4 py-3 bg-blue-50/80 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-900 placeholder-transparent transition">
                    <label for="email"
                        class="floating-label absolute text-blue-400 transition-all duration-300 top-3 left-4 pointer-events-none">Email</label>
                </div>

                <div class="relative mb-6">
                    <input required wire:model='phone_number' type="tel" id="phone" name="phone"
                        class="input-field text-base block w-full px-4 py-3 bg-blue-50/80 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-900 placeholder-transparent transition">
                    <label for="phone"
                        class="floating-label absolute text-blue-400 transition-all duration-300 top-3 left-4 pointer-events-none">Phone Number</label>
                </div>

                <div class="relative mb-6">
                    <input required wire:model='password' type="password" id="password" name="password"
                        class="input-field text-base block w-full px-4 py-3 bg-blue-50/80 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-900 placeholder-transparent transition">
                    <label for="password"
                        class="floating-label absolute text-blue-400 transition-all duration-300 top-3 left-4 pointer-events-none">Password</label>
                </div>

                <div class="relative mb-6">
                    <input required wire:model='confirm_password' type="password" id="confirm_password"
                        name="confirm_password"
                        class="input-field text-base block w-full px-4 py-3 bg-blue-50/80 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-blue-900 placeholder-transparent transition">
                    <label for="confirm_password"
                        class="floating-label absolute text-blue-400 transition-all duration-300 top-3 left-4 pointer-events-none">Confirm Password</label>
                </div>
                @error('confirm_password')
                    <span class="text-blue-500">{{ $message }}</span>
                @enderror
                <div class="relative flex items-center mb-4">
                    <input required type="checkbox" id="terms" name="terms" class="mr-2 accent-blue-500">
                    <label for="terms" class="text-sm text-blue-900">I agree to the <a href="#"
                            class="text-blue-600 underline">terms and conditions</a>.</label>
                </div>
                <div id="terms-error" class="text-red-500 text-sm hidden mb-4">Please accept the terms and conditions.</div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white font-semibold p-2 rounded-lg hover:from-blue-500 hover:to-blue-300 transition duration-200 shadow-lg">Register</button>
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
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', () => {
                input.nextElementSibling.classList.add('label-active');
            });
            input.addEventListener('blur', () => {
                if (input.value === '') {
                    input.nextElementSibling.classList.remove('label-active');
                }
            });
        });

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
    <style>
        .floating-label {
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
        }
        .label-active {
            top: -12px;
            left: 3px;
            font-size: 12px;
            color: #1C64F2;
        }
        #terms-error {
            color: #ef4444;
        }
    </style>
</div>
