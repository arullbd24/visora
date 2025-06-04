<div class="flex items-center justify-center min-h-screen bg-gray-800 ">
    <div class=" w-96  ">
        <div class="bg-gray-500 p-6 rounded-lg shadow-lg w-full max-w-md ">
            <div class="flex justify-center mb-6">
                <div class="h-24 w-24 flex items-center justify-center">
                    <!-- Logo Placeholder -->
                    <img src="{{ asset('assets/img/visora..png') }}" alt="">
                </div>
            </div>
            <h2 class="text-center text-2xl text-white font-bold mb-6">Create an Account</h2>
            <form wire:submit.prevent='store' id="registerForm ">
                <div class="relative mb-6">
                    <input required wire:model='fullname' type="text" id="name" name="name"
                        class="input-field text-sm block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-transparent">
                    <label for="name"
                        class="floating-label absolute text-gray-400 transition-all duration-300 top-3 left-4 pointer-events-none">Name</label>
                </div>

                <div class="relative mb-6">
                    <input required wire:model='email' type="email" id="email" name="email"
                        class="input-field text-sm block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-transparent">
                    <label for="email"
                        class="floating-label absolute text-gray-400 transition-all duration-300 top-3 left-4 pointer-events-none">Email</label>
                </div>

                <div class="relative mb-6">
                    <input required wire:model='phone_number' type="tel" id="phone" name="phone"
                        class="input-field text-sm block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-transparent">
                    <label for="phone"
                        class="floating-label absolute text-gray-400 transition-all duration-300 top-3 left-4 pointer-events-none">Phone
                        Number</label>
                </div>

                <div class="relative mb-6">
                    <input required wire:model='password' type="password" id="password" name="password"
                        class="input-field text-sm block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-transparent">
                    <label for="password"
                        class="floating-label absolute text-gray-400 transition-all duration-300 top-3 left-4 pointer-events-none">Password</label>
                </div>

                <div class="relative mb-6">
                    <input required wire:model='confirm_password' type="password" id="confirm_password"
                        name="confirm_password"
                        class="input-field text-sm block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-100 placeholder-transparent">
                    <label for="confirm_password"
                        class="floating-label absolute text-gray-400 transition-all duration-300 top-3 left-4 pointer-events-none">Confirm
                        Password</label>
                </div>
                @error('confirm_password')
                    <span class="text-[#1C64F2]">{{ $message }}</span>
                @enderror
                <div class="relative flex items-center mb-4">
                    <input required type="checkbox" id="terms" name="terms" class="mr-2">
                    <label for="terms" class="text-sm text-white">I agree to the <a href="#"
                            class="text-[#1C64F2]">terms and conditions</a>.</label>
                </div>
                <div id="terms-error" class="text-[#1C64F2] text-sm hidden mb-4">Please accept the terms and conditions.
                </div>
                <button type="submit"
                    class="w-full bg-[#1C64F2] text-white p-2 rounded-md hover:bg-[#c99d00c3] transition duration-200">Register</button>
            </form>
            <div class="mt-4 text-center">
                <span class="text-sm text-white">Already have an account? <a href="{{ route('auth.login') }}"
                        class="text-[#1C64F2] underline" wire:navigate>Login</a></span>
            </div>
        </div>
        <footer class="mt-10 pb-8">
            <div class="grp-cpryApps w-full selectDisable">
                <div class="ctr-cpryApps">
                    <div class="cCpryApps w-fit mx-auto">
                        <div class="txCpyApps flex items-center gap-2"
                            style="background: -webkit-linear-gradient(#E1EFFE,#1C64F2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            <div class="icnCpry">
                                <span class="icn text-2xl">
                                    <i class="far fa-copyright"></i>
                                </span>
                            </div>
                            <div class="txCpry text-sm">
                                <p>{{ date('Y') }} Visora</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>




    <script>
        // Floating label logic remains the same
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

        // Checkbox validation
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
        /* Floating Label Styles */
        .floating-label {
            top: 50%;
            transform: translateY(-50%);
            font-size: 13px;
            ;
        }

        .label-active {
            top: -10px;
            left: 3px;
            font-size: 12px;
            /* Tailwind blue color */
        }

        /* Error message styling */
        #terms-error {
            color: red;
        }
    </style>
</div>
