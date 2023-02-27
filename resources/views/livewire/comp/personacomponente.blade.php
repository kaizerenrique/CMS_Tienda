<div class="justify-center">
    <button wire:click="persona()"
        class="mt-6 p-4 rounded-md bg-blue-700 py-1.5 font-medium text-blue-50 hover:bg-blue-800">
        Ingrese sus datos para continuar
    </button>

    <!-- Inicio del Modal para comprobar cedula -->
    <x-jet-dialog-modal wire:model="modalPersona">
        <x-slot name="title">
            {{ __('Registro') }}
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm text-gray-600">
                <div class="col-span-2 sm:col-span-4">
                    <x-jet-label for="nacionalidad" value="{{ __('Nacionalidad') }}" />
                    <select name="persona.nac" id="persona.nac" wire:model.defer="persona.nac"
                        class="focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700 border-gray-300 mt-1 block w-full select select-bordered rounded-lg ">
                        <option value="" selected>Selecciona la Nacionalidad</option>
                        <option value="V">Venezolano</option>
                        <option value="E">Extranjero</option>
                    </select>
                    <x-jet-input-error for="persona.nac" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="ci" value="{{ __('Numero de Cedula') }}" />
                    <x-jet-input id="persona.ci" type="text" class="mt-1 block w-full" wire:model.defer="persona.ci" />
                    <x-jet-input-error for="persona.ci" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-jet-input id="persona.fecha_nacimiento" type="date" class="mt-1 block w-full"
                        wire:model.defer="persona.fecha_nacimiento" />
                    <x-jet-input-error for="persona.fecha_nacimiento" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="ml-3 border border-blue-700 bg-blue-700 text-white rounded-lg hover:bg-blue-800 focus:outline-none focus:shadow-outline"
            wire:click="$toggle('modalPersona', false)" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3 border border-emerald-700 bg-emerald-700 text-white rounded-lg transition duration-500 ease select-none hover:bg-emerald-800 focus:outline-none focus:shadow-outline"
            wire:click="comprobarCedula()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Fin del Modal para comprobar cedula -->

    <!-- Agregar Persona Confirmation Modal -->
    <x-jet-dialog-modal wire:model="modalDatosPersona">
        <x-slot name="title">
            {{ 'Registrar' }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm text-gray-600">
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input id="datospersona.nombres" type="text" class="mt-1 block w-full" wire:model.defer="datospersona.nombres" />
                    <x-jet-input-error for="datospersona.nombres" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                    <x-jet-input id="datospersona.apellidos" type="text" class="mt-1 block w-full" wire:model.defer="datospersona.apellidos" />
                    <x-jet-input-error for="datospersona.apellidos" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="nac" value="{{ __('Nacionalidad') }}" />
                    <x-jet-input id="datospersona.nac" name="nac" type="text" class="mt-1 block w-full" wire:model.defer="datospersona.nac"
                        disabled />
                    <x-jet-input-error for=">datospersona.nac" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                    <x-jet-input id="datospersona.ci" name="datospersona.ci" type="text" class="mt-1 block w-full" wire:model.defer="datospersona.ci"
                        disabled />
                    <x-jet-input-error for="datospersona.ci" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="fnacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-jet-input id="datospersona.fecha_nacimiento" type="date" class="mt-1 block w-full"
                        wire:model.defer="datospersona.fecha_nacimiento" />
                    <x-jet-input-error for="datospersona.fecha_nacimiento" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="campsexo" value="{{ __('Sexo') }}" />
                    <select name="datospersona.sexo" id="datospersona.sexo" wire:model.defer="datospersona.sexo" 
                    class="focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700 border-gray-300 mt-1 block w-full select select-bordered rounded-lg">
                        <option value="" selected>Selecciona el Sexo</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                    <x-jet-input-error for="sexo" class="mt-2" />
                </div>
                <div class="col-span-1 sm:col-span-1">
                    <x-jet-label for="codigo_operador" value="{{ __('Operador') }}" />
                    <select name="datospersona.codigo_operador" id="datospersona.codigo_operador" wire:model.defer="datospersona.codigo_operador"
                        class="focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700 border-gray-300 mt-1 block w-full select select-bordered rounded-lg">
                        <option value="" selected>Selecciona el Operador</option>
                        <option value="416">416</option>
                        <option value="426">426</option>
                        <option value="414">414</option>
                        <option value="424">424</option>
                        <option value="412">412</option>
                    </select>
                    <x-jet-input-error for="codigo_operador" class="mt-2" />
                </div>

                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="nrotelefono" value="{{ __('Numero de Teléfono ') }}" />
                    <x-jet-input id="datospersona.nrotelefono" type="text" class="mt-1 block w-full"
                        wire:model.defer="datospersona.nrotelefono" />
                    <x-jet-input-error for="datospersona.nrotelefono" class="mt-2" />
                </div>

                <div class="col-span-1">
                    <x-jet-label for="whatsapp" value="{{ __('Whatsapp') }}" />
                    <x-jet-input id="datospersona.whatsapp" type="checkbox" class="mt-1 mr-2" wire:model.defer="datospersona.whatsapp" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="ml-3 border border-blue-700 bg-blue-700 text-white rounded-lg hover:bg-blue-800 focus:outline-none focus:shadow-outline"
            wire:click="$toggle('modalDatosPersona', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3 ml-3 border border-emerald-700 bg-emerald-700 text-white rounded-lg transition duration-500 ease select-none hover:bg-emerald-800 focus:outline-none focus:shadow-outline" 
            wire:click="guardarpersona()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>