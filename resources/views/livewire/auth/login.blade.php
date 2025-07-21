<div class="main-container min-h-screen bg-gradient-to-b from-blue-500 via-blue-300 to-slate-100 flex items-center justify-center">
    <div class="ctr-MainLogin w-full max-w-md overflow-auto">
        <div class="cMainLogin">
            <div class="ctr-authLogin">
                <div class="cAuthLogin flex items-center justify-center">
                    <div class="ctr-formFieldlogin">
                        <form wire:submit.prevent='login'
                            class="cformFieldlogin rounded-xl shadow-lg flex items-center justify-center w-full p-8 bg-white border border-gray-200">
                            @csrf
                            <div class="Form-contenMain">
                                <div class="image-contain flex items-center justify-center mb-4">
                                    <img src="{{ asset('assets/img/visora..png') }}" alt="Logo" class="w-24 h-auto drop-shadow-lg">
                                </div>
                                <div class="headSignIn flex justify-center text-3xl font-bold mt-2 mb-2">
                                    <div class="tx text-blue-700 flex items-center">
                                        <h1>Login</h1>
                                    </div>
                                </div>
                                <div class="tx text-sm text-gray-500 text-center mb-4">
                                    <p>Please enter your email</p>
                                </div>
                                <div class="ctr-formLoginInpt">
                                    <div class="cFormLoginInpt my-4 space-y-6 w-72">
                                        <div class="form-input items-center gap-2 relative">
                                            <input required wire:model="email" type="text" id="email"
                                                name="email"
                                                class="peer inptEmail text-sm w-full rounded-md bg-gray-100 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                                            <label for="email"
                                                class="block text-sm cursor-text px-1.5 py-0.5 rounded-lg absolute transition-all -translate-y-1/2 top-1/2 peer-focus:-top-1/4 peer-focus:text-blue-700">
                                                <div class="tx text-gray-400">
                                                    <p>Email</p>
                                                </div>
                                            </label>
                                            @error('email')
                                                <div class="tx text-red-500 text-xs mt-1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-input items-center gap-2 relative">
                                            <input required wire:model='password' type="password" id="password"
                                                name="password"
                                                class="peer inptPassword text-sm w-full rounded-md bg-gray-100 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                                            <label for="password"
                                                class="block text-sm cursor-text px-1.5 py-0.5 rounded-lg absolute transition-all -translate-y-1/2 top-1/2 peer-focus:-top-1/4 peer-focus:text-blue-700">
                                                <div class="tx text-gray-400">
                                                    <p>Password</p>
                                                </div>
                                            </label>
                                            @error('password')
                                                <div class="tx text-red-500 text-xs mt-1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="gotoForgetPass mt-2 ml-2">
                                    <div class="cGTForgetPass text-xs flex items-center gap-1">
                                        <div class="txHref text-gray-500">
                                            <p>Forgot password?</p>
                                        </div>
                                        <div class="txHref text-blue-600 font-semibold">
                                            <a href="{{ route('forgot_password') }}">Click here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ctr-btnConfirSignIn mt-6 px-2">
                                    <div class="cBtnConfirSignIn">
                                        <button type="submit"
                                            class="block w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold shadow transition">
                                            <div class="txBtn">
                                                <p>Continue</p>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="text-sm flex items-center justify-center mt-3 text-gray-400">
                                        <p>Or</p>
                                    </div>
                                </div>
                                <div class="ctr-gotoDonthaveAcount mt-3 flex items-center justify-center">
                                    <div class="cgotoDonthaveAcount text-xs flex items-center gap-1">
                                        <div class="txHref text-gray-500">
                                            <p>Don't have account?</p>
                                        </div>
                                        <a href="{{ route('auth.register') }}" class="AHrefFgtPass block text-blue-600 font-semibold"
                                            wire:navigate>
                                            <div class="txHref">
                                                <p>Register</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <footer class="mt-10 pb-8">
                            <div class="grp-cpryApps w-full selectDisable">
                                <div class="ctr-cpryApps">
                                    <div class="cCpryApps w-fit mx-auto">
                                        <div class="txCpyApps flex items-center gap-2"
                                            style="background: -webkit-linear-gradient(#E1EFFE,#1C64F2 ); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
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
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("livewire:init", () => {
        Livewire.on('redirect', url => {
            window.location.href = url;
        });
    });
</script>

@section('script-field')
    <script src="{{ asset('assets/auth/input.js') }}"></script>
@endsection
