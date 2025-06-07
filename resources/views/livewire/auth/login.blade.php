<div class="main-container min-h-screen bg-gradient-to-b from-blue-400 to-slate-200 flex items-center justify-center">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="ctr-MainLogin w-full max-w-md overflow-auto">
        <div class="cMainLogin">
            <div class="ctr-authLogin">
                <div class="cAuthLogin flex items-center justify-center">
                    <div class="ctr-formFieldlogin">
                        {{-- <div class="">
                            @php
                                $database_path = database_path('migrations');
                                $database_all_path = \Illuminate\Support\Facades\File::allFiles($database_path);
                                dd(
                                    $database_path,
                                    $database_all_path,
                                    $database_all_path[14],
                                    $database_all_path[14]->getRelativePathName(),
                                    $database_all_path[14]->getRealPath(),
                                );
                            @endphp
                        </div> --}}
                        <form wire:submit.prevent='login' class="cformFieldlogin rounded-md flex items-center justify-center w-full p-5 bg-gray-900">
                            @csrf
                            <div class="Form-contenMain">
                                <div class="image-contain flex items-center justify-center">
                                    <img src="{{ asset('assets/img/visora..png') }}" alt="Logo" class="w-32 h-auto">
                                </div>
                                <div class="headSignIn flex justify-center text-2xl md:text-[2.5rem] font-bold mt-5">
                                    <div class="tx text-slate-100 flex items-center">
                                        <h1>Login</h1>
                                    </div>
                                </div>
                                <div class="tx text-sm text-slate-200 text-center mt-2">
                                    <p>Please enter your email</p>
                                </div>
                                <div class="ctr-formLoginInpt">
                                    <div class="cFormLoginInpt my-6 space-y-8 w-72">
                                        <div class="form-input items-center gap-2 relative">
                                            {{-- <input type="text" id="email" name="email" wire:model.lazy="email" class="peer inptEmail text-sm w-full rounded-md bg-slate-100 border-1 border-gray-300 @error('email') is-invalid @enderror" placeholder=" "> --}}
                                            <input required wire:model="email" type="text" id="email" name="email" class="peer inptEmail text-sm w-full rounded-md bg-slate-100 border-1 border-gray-300">
                                            <label for="email" class="block text-sm cursor-text px-1.5 py-0.5 rounded-lg absolute transition-all -translate-y-1/2 top-1/2 peer-focus:-top-1/4 peer-focus:text-white">
                                                <div class="tx text-slate-400">
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
                                            {{-- <input type="password" id="password" name="password" wire:model.lazy="password" class="peer inptPassword text-sm w-full rounded-md bg-slate-100 border-1 border-gray-300 @error('password') is-invalid @enderror" placeholder=" "> --}}
                                            <input required wire:model='password' type="password" id="password" name="password" class="peer inptPassword text-sm w-full rounded-md bg-slate-100 border-1 border-gray-300">
                                            <label for="password" class="block text-sm cursor-text px-1.5 py-0.5 rounded-lg absolute transition-all -translate-y-1/2 top-1/2 peer-focus:-top-1/4 peer-focus:text-white">
                                                <div class="tx text-slate-400">
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
                                <div class="gotoForgetPass mt-3 ml-2">
                                    <div class="cGTForgetPass text-xs flex items-center gap-1">
                                        <div class="txHref text-white">
                                            <p>Forgot password?</p>
                                        </div>
                                            <div class="txHref text-[#1C64F2] ">
                                                <a href="{{ route('forgot_password') }}">Click here</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="ctr-btnConfirSignIn mt-8 px-2">
                                    <div class="cBtnConfirSignIn">
                                        <button type="submit" class="block w-full py-2 bg-[#1C64F2] hover:bg-[#A4CAFE   ] text-white rounded-xl">
                                            <div class="txBtn">
                                                <p>Continue</p>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="text-sm flex items-center justify-center mt-3 text-white">
                                        <p>Or</p>
                                    </div>
                                </div>
                                <div class="ctr-gotoDonthaveAcount mt-3 flex items-center justify-center">
                                    <div class="cgotoDonthaveAcount text-xs  flex items-center gap-1">
                                        <div class="txHref text-white">
                                            <p>Don't have account?</p>
                                        </div>
                                        <a href="{{ route('auth.register') }}" class="AHrefFgtPass block text-[#1C64F2]" wire:navigate> 
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
                                        <div class="txCpyApps flex items-center gap-2" style="background: -webkit-linear-gradient(#E1EFFE,#1C64F2 ); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
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

@section('script-field')
    <script src="{{ asset('assets/auth/input.js') }}"></script>
@endsection
