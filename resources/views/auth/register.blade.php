<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Admin Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <!-- Clinic Name -->
        <div class="mt-4">
            <x-input-label for="clinic_name" :value="__('Hospital / Health Center Name')" />
            <x-text-input id="clinic_name" class="block mt-1 w-full" type="text" name="clinic_name" :value="old('clinic_name')" required />
        </div>

        <!-- District - GOVERNMENT EDITION -->
        <div class="mt-4">
            <x-input-label for="district" :value="__('District')" />
            <select id="district" name="district" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Select District</option>
                <option value="Sironko">Sironko</option>
                <option value="Mbale">Mbale</option>
                <option value="Bududa">Bududa</option>
                <option value="Bulambuli">Bulambuli</option>
                <option value="Kapchorwa">Kapchorwa</option>
                <option value="Kween">Kween</option>
                <option value="Bukwo">Bukwo</option>
                <option value="Manafwa">Manafwa</option>
                <option value="Namisindwa">Namisindwa</option>
                <option value="Kampala">Kampala</option>
                <option value="Wakiso">Wakiso</option>
                <option value="Mukono">Mukono</option>
                <option value="Jinja">Jinja</option>
                <option value="Iganga">Iganga</option>
                <option value="Mbale City">Mbale City</option>
                <option value="Gulu">Gulu</option>
                <option value="Gulu City">Gulu City</option>
                <option value="Lira">Lira</option>
                <option value="Lira City">Lira City</option>
                <option value="Mbarara">Mbarara</option>
                <option value="Mbarara City">Mbarara City</option>
                <option value="Arua">Arua</option>
                <option value="Arua City">Arua City</option>
                <option value="Moroto">Moroto</option>
                <option value="Soroti">Soroti</option>
                <option value="Soroti City">Soroti City</option>
                <option value="Hoima">Hoima</option>
                <option value="Hoima City">Hoima City</option>
                <option value="Fort Portal City">Fort Portal City</option>
                <option value="Masaka">Masaka</option>
                <option value="Masaka City">Masaka City</option>
                <option value="Kabale">Kabale</option>
                <option value="Kabale District">Kabale District</option>
                <option value="Kasese">Kasese</option>
                <option value="Tororo">Tororo</option>
                <option value="Busia">Busia</option>
                <option value="Bugiri">Bugiri</option>
                <option value="Mayuge">Mayuge</option>
                <option value="Kamuli">Kamuli</option>
                <option value="Kabarole">Kabarole</option>
                <option value="Kanungu">Kanungu</option>
                <option value="Kisoro">Kisoro</option>
                <option value="Rukungiri">Rukungiri</option>
                <option value="Ntungamo">Ntungamo</option>
                <option value="Isingiro">Isingiro</option>
                <option value="Bushenyi">Bushenyi</option>
                <option value="Sheema">Sheema</option>
                <option value="Mitooma">Mitooma</option>
                <option value="Rubirizi">Rubirizi</option>
                <option value="Buhweju">Buhweju</option>
            </select>
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Register Hospital') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>