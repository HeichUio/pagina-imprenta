<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telefono -->
        <div class="mt-4">
            <x-input-label for="telefono_u" :value="__('Teléfono')" />
            <x-text-input id="telefono_u" class="block mt-1 w-full"
                type="text"
                name="telefono_u"
                pattern="[0-9]{10}"
                maxlength="10"
                minlength="10"
                inputmode="numeric"
                required
                placeholder="Ej: 7221234567"
                :value="old('telefono_u')" />
            <x-input-error :messages="$errors->get('telefono_u')" class="mt-2" />
        </div>

        <!-- Codigo Postal -->
        <div class="mt-4">
            <x-input-label for="codigo_postal" :value="__('Código Postal')" />
            <x-text-input id="codigo_postal" class="block mt-1 w-full"
                type="text"
                name="codigo_postal"
                pattern="[0-9]{5}"
                maxlength="5"
                minlength="5"
                inputmode="numeric"
                required
                placeholder="Ej: 50000"
                :value="old('codigo_postal')" />
            <x-input-error :messages="$errors->get('codigo_postal')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>