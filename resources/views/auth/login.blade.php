<x-guest-layout>

    <div class="w-full max-w-md">

        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Welcome Back
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                            class="block mt-1 w-full"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password"
                            class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between mt-4">

                <label class="flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:underline"
                    href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif

            </div>

            <!-- Login Button -->
            <x-primary-button class="w-full justify-center mt-4">
                {{ __('Log in') }}
            </x-primary-button>

            <!-- Register -->
            @if (Route::has('register'))
                <p class="text-center text-sm text-gray-600 mt-6">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">
                        Register
                    </a>
                </p>
            @endif

        </form>

    </div>

</x-guest-layout>