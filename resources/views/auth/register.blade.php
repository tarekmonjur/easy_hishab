<x-app-layout>
    <x-slot name="header">
    <div class="container max-auto">
        <div class="columns-sm">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Members') }}
            </h2>
        </div>
        <div class="columns-sm">
            <x-link-button :url="route('login')" class="ml-4">
                {{ __('Add') }}
            </x-link-button>
        </div>
    </div>
       
        
    </x-slot>
    <x-section-card>

        <x-slot name="title">
            {{ __('Add Member Form') }}
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
            </div>

            <!-- Mobile -->
            <div class="mt-4">
                <x-label for="mobile" :value="__('Mobile')" />
                <x-input id="mobile" class="block mt-1 w-full" type="number" name="mobile" :value="old('mobile')" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />
                <x-textarea id="address" class="block mt-1 w-full" name="address" required>
                    {{ old('address') }}
                </x-textarea>
            </div>

             <!-- Type -->
             <div class="mt-4">
                <x-label for="type" :value="__('Type')" />
                <x-select id="type" class="block mt-1 w-full" name="type" :options="config('app.types')" default="internal" />
            </div>

            <!-- Roles -->
            <div class="mt-4">
                <x-label for="role" :value="__('Role')" />
                <x-select id="role" class="block mt-1 w-full" name="role" :options="config('app.roles')" default="user" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-section-card>
</x-app-layout>
