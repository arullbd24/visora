
<div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-500 via-blue-300 to-slate-100 relative">
    {{-- Snackbar Notification --}}
    <div
        x-data="{ show: false, message: '' }"
        x-show="show"
        x-transition
        x-init="
            Livewire.on('showError', msg => {
                message = msg;
                show = true;
                setTimeout(() => show = false, 4000);
            });
        "
        class="fixed top-5 right-5 bg-red-500 text-white text-sm px-4 py-2 rounded shadow z-50"
        x-text="message"
        style="display: none;"
    ></div>

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('assets/img/visora..png') }}" alt="Logo" class="w-20 h-20 mb-2 drop-shadow-lg">
            <h1 class="text-3xl font-bold text-blue-700 mb-1">Login</h1>
            <p class="text-gray-500 text-sm">Please enter your email</p>
        </div>

        <form wire:submit.prevent="login" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <input wire:model="email" type="email" id="email" name="email" required
                    class="form-input block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm"
                    placeholder="you@email.com">
                @error('email')
                    <div class="mt-1 text-xs text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                <input wire:model="password" type="password" id="password" name="password" required
                    class="form-input block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm"
                    placeholder="••••••••">
                @error('password')
                    <div class="mt-1 text-xs text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between items-center text-sm">
                <a href="{{ route('forgot_password') }}" class="text-blue-600 hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition focus:outline-none focus:ring-2 focus:ring-blue-500">
                Continue
            </button>
        </form>

        <div class="flex items-center justify-center my-4">
            <span class="text-gray-400 text-sm">Or</span>
        </div>

        <div class="flex items-center justify-center">
            <span class="text-gray-500 text-xs mr-1">Don't have an account?</span>
            <a href="{{ route('auth.register') }}" class="text-blue-600 font-semibold text-xs hover:underline">Register</a>
        </div>

        <footer class="mt-8 text-center text-gray-400 text-xs">
            <span class="flex items-center justify-center gap-1">
                <i class="far fa-copyright"></i>
                {{ date('Y') }} Visora
            </span>
        </footer>
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
