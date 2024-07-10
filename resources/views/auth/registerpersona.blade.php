<x-guest-layout>
    <form method="POST" action="{{ route('registerpersona') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nombres" :value="__('Nombres')" />
            <x-text-input id="nombres" class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')" required autofocus autocomplete="nombres" />
            <x-input-error :messages="$errors->get('nombres')" class="mt-2" />
        </div>

        <!-- apellido paterno -->
        <div>
            <x-input-label for="apellidopaterno" :value="__('apellidopaterno')" />
            <x-text-input id="apellidopaterno" class="block mt-1 w-full" type="text" name="apellidopaterno" :value="old('apellidopaterno')" required autofocus autocomplete="apellidopaterno" />
            <x-input-error :messages="$errors->get('apellidopaterno')" class="mt-2" />
        </div>
        
        <!-- apellido materno -->
        <div>
            <x-input-label for="apellidomaterno" :value="__('apellidomaterno')" />
            <x-text-input id="apellidomaterno" class="block mt-1 w-full" type="text" name="apellidomaterno" :value="old('apellidomaterno')" required autofocus autocomplete="apellidomaterno" />
            <x-input-error :messages="$errors->get('apellidomaterno')" class="mt-2" />
        </div>

        <!-- numero de documento -->
        <div>
            <x-input-label for="numerodocumento" :value="__('numerodocumento')" />
            <x-text-input id="numerodocumento" class="block mt-1 w-full" type="text" name="numerodocumento" :value="old('numerodocumento')" required autofocus autocomplete="numerodocumento" />
            <x-input-error :messages="$errors->get('numerodocumento')" class="mt-2" />
        </div>

            <!-- Tipo de Documento -->
        <div>
            <x-input-label for="tipodocumento" :value="__('Tipo de Documento')" />
                <select id="tipodocumento" name="tipodocumento" class="block mt-1 w-full form-control" required autofocus autocomplete="tipodocumento">
                    <option value="1">Pasaporte</option>
                    <option value="2">Documento Nacional de Identidad</option>
                    <option value="3">Carnet de Estudiante</option>
                </select>
            <x-input-error :messages="$errors->get('tipodocumento')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Registrar Persona') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
