<div class="p-6">
    <!-- mensaje de notificacion -->
    <div>
        @if (session()->has('message'))
        <div class="max-w-lg mx-auto">
            <div class="flex bg-emerald-100 rounded-lg p-4 mb-4 text-sm text-emerald-700" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5 mr-3" fill="none"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                        clip-rule="evenodd" />
                </svg>
                <div>
                    <span class="font-medium">{{ session('message') }}</span>.
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- /mensaje de notificacion -->
    <!-- Seccion que contiene el titulo las busquedas y el boton para registro nuevo -->
    <div class="flex flex-wrap items-center px-4 py-2">
        <div class="relative w-full max-w-full flex-grow flex-1">
            <h3 class="font-semibold text-lg text-gray-800 ">Información Bancaria</h3>
        </div>
        <div class="flex flex-col items-center w-full max-w-xl">
            <input wire:model="buscar" type="search" placeholder="Buscar"
                class="input input-bordered w-full max-w-xs rounded-lg" />
        </div>
        <div class="relative w-full max-w-full flex-grow flex-1 text-right">
            <button type="button" wire:click="registrardatos()"
                class="border border-blue-700 bg-blue-700 text-white rounded-lg px-4 py-2 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline">
                <div class="flex items-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                    </span>
                    <span class="ml-2">Formas de Pago</span>
                </div>
            </button>
        </div>
    </div>
    <!-- / Seccion que contiene el titulo las busquedas y el boton para registro nuevo -->
    <!--Tabla Categoria-->
    <div class="overflow-x-auto">
        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">                        
                        <th class="py-3 px-3 text-left">Documento</th>
                        <th class="py-3 px-3 text-left">Nombre</th>
                        <th class="py-3 px-3 text-center">Nro de Cuenta o Teléfono</th>
                        <th class="py-3 px-3 text-center">Teléfono</th>
                        <th class="py-3 px-3 text-left">Banco</th>                        
                        <th class="py-3 px-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($pagosformas as $pagosforma)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">                        
                        <td class="py-3 px-3 text-left">                            
                            {{ $pagosforma->tipo }} {{ $pagosforma->documento }}
                        </td>
                        <td class="py-3 px-3 text-left">                            
                            {{ $pagosforma->cuentadante }}
                        </td>
                        <td class="py-3 px-3 text-center">                            
                                {{ $pagosforma->nrocuenta }} 
                        </td>
                        <td class="py-3 px-3 text-center">
                            {{ $pagosforma->nrotelefono }}
                        </td>
                        <td class="py-3 px-3 text-left">                            
                            @foreach ($listadebancos as $listadebanco)
                                @if ($listadebanco->id == $pagosforma->banco_id)
                                    {{$listadebanco->nombre}}
                                @endif                                
                            @endforeach
                        </td>
                        <td class="py-3 px-3 text-center">
                            <div class="flex item-center justify-center">                                
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    wire:click="vercuenta({{ $pagosforma->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>                                
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" 
                                wire:click="editarcuenta({{ $pagosforma->id }})">                         
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                    wire:click="consultareliminarcuenta({{ $pagosforma->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                            </div>
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
          {{ $pagosformas->links() }}  
        </div>
    </div>


    <!-- Inicio del Modal para elegir forma de pago-->
    <x-jet-dialog-modal wire:model="modalFomradepago">
        <x-slot name="title">
            {{ __('Registrar Forma de Pago') }}
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="col-span-2 sm:col-span-2 md:col-span-4">
                    <x-jet-label for="fpago" value="{{ __('Formas de Pago') }}" />
                    <select class="focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700 border-gray-300 mt-1 w-full 
                    select select-bordered rounded-lg" wire:model.defer="formadepago">
                        <option value="" selected>Seleccionar</option>
                        <option value="1">Cuenta bancaria</option>
                        <option value="2">Pago Móvil</option>
                    </select>
                    <x-jet-input-error for="formadepago" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button type="button" wire:click="$toggle('modalFomradepago', false)" wire:loading.attr="disabled"
                class="border border-emerald-700 bg-emerald-700 text-white rounded-lg px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-emerald-800 focus:outline-none focus:shadow-outline">
                {{ __('Cancelar') }}
            </button>
            <button type="button" wire:click="elegirformadepago() " wire:loading.attr="disabled"
                class="border border-blue-700 bg-blue-700 text-white rounded-lg px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline">
                {{ __('Agregar') }}
            </button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Fin del Modal para elegir forma de pago -->

    <!-- Inicio del Modal para registrar banco -->
    <x-jet-dialog-modal wire:model="modalregistrabanco">
        <x-slot name="title">
            {{$titulo}}
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="col-span-2 sm:col-span-4">
                    <x-jet-label for="banco" value="{{ __('Nombre del Banco') }}" />
                    <select name="bancoreg.banco" id="bancoreg.banco" wire:model.defer="bancoreg.banco"
                        class="mt-1 block w-full">
                        <option value="" selected>Seleccione el Banco </option>
                        @foreach ($listadebancos as $banco)
                        <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-2 sm:col-span-4">
                    <x-jet-label for="nrocuenta" value="{{ __('Número de Cuenta') }}" />
                    <x-jet-input id="bancoreg.nrocuenta" type="text" class="mt-1 block w-full"
                        wire:model.defer="bancoreg.nrocuenta" />
                    <x-jet-input-error for="bancoreg.nrocuenta" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-4">
                    <x-jet-label for="cuentadante" value="{{ __('Nombre') }}" />
                    <x-jet-input id="bancoreg.cuentadante" type="text" class="mt-1 block w-full"
                        wire:model.defer="bancoreg.cuentadante" />
                    <x-jet-input-error for="bancoreg.cuentadante" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="tipo" value="{{ __('Tipo de Documento') }}" />
                    <select name="bancoreg.tipo" id="bancoreg.tipo" wire:model.defer="bancoreg.tipo"
                        class="mt-1 block w-full">
                        <option value="" selected>Seleccione del tipo de Documento</option>
                        <option value="V">Venezolano</option>
                        <option value="E">Extranjero</option>
                        <option value="P">Pasaporte</option>
                        <option value="J">Juridico</option>
                        <option value="G">Gobierno</option>
                    </select>
                    <x-jet-input-error for="bancoreg.tipo" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="documento" value="{{ __('Documento de Identificación') }}" />
                    <x-jet-input id="bancoreg.documento" type="text" class="mt-1 block w-full"
                        wire:model.defer="bancoreg.documento" />
                    <x-jet-input-error for="bancoreg.documento" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <x-jet-label for="telefono" value="{{ __('Número de Teléfono') }}" />
                    <x-jet-input id="bancoreg.telefono" type="text" class="mt-1 block w-full"
                        wire:model.defer="bancoreg.telefono" />
                    <x-jet-input-error for="bancoreg.telefono" class="mt-2" />
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <x-jet-label for="transferencias " value="{{ __('Transferencias') }}" />
                    <input type="checkbox" class="mt-3 ml-4 form-checkbox h-5 w-5 text-primary-500 rounded-full" wire:model.defer="bancoreg.transferencia" >          
                  </div>
                  <div class="col-span-2 sm:col-span-1">
                    <x-jet-label for="pagomovil" value="{{ __('Pago Móvil ') }}" />
                    <input type="checkbox" class="mt-3 ml-4 form-checkbox h-5 w-5 text-primary-500 rounded-full" wire:model.defer="bancoreg.pagomovil" >          
                  </div>
                <x-jet-input id="bancoreg.id" type="hidden" class="mt-1 block w-full" wire:model.defer="bancoreg.id" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalregistrabanco', false)" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3" wire:click="salvarbanco()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Fin del Modal para registrar banco -->

    <!-- Inicio del Modal para alertas  -->
    <x-jet-dialog-modal wire:model="mensajeModal">
        <x-slot name="title">
            {{$titulo}}
        </x-slot>

        <x-slot name="content">
            {{$mensaje}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('mensajeModal', false)" wire:loading.attr="disabled">
                {{ __('Aceptar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- Inicio del Modal para Alerta Eliminar cuenta -->

        <!-- Inicio del Modal para ver banco -->
        <x-jet-dialog-modal wire:model="modalver">
            <x-slot name="title">
                {{$titulo}}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="col-span-2 sm:col-span-4">
                        <x-jet-label for="banco" value="{{ __('Nombre del Banco') }}"/>
                        <select name="bancoreg.banco" id="bancoreg.banco" wire:model.defer="bancoreg.banco"
                            class="mt-1 block w-full" disabled>
                            <option value="" selected>Seleccione el Banco </option>
                            @foreach ($listadebancos as $banco)
                            <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-4">
                        <x-jet-label for="nrocuenta" value="{{ __('Número de Cuenta') }}" />
                        <x-jet-input id="bancoreg.nrocuenta" type="text" class="mt-1 block w-full"
                            wire:model.defer="bancoreg.nrocuenta" disabled />
                    </div>
                    <div class="col-span-2 sm:col-span-4">
                        <x-jet-label for="cuentadante" value="{{ __('Nombre') }}" />
                        <x-jet-input id="bancoreg.cuentadante" type="text" class="mt-1 block w-full"
                            wire:model.defer="bancoreg.cuentadante" disabled/>
                    </div>
                    <div class="col-span-2 sm:col-span-2">
                        <x-jet-label for="tipo" value="{{ __('Tipo de Documento') }}" />
                        <select name="bancoreg.tipo" id="bancoreg.tipo" wire:model.defer="bancoreg.tipo"
                            class="mt-1 block w-full" disabled>
                            <option value="" selected>Seleccione del tipo de Documento</option>
                            <option value="V">Venezolano</option>
                            <option value="E">Extranjero</option>
                            <option value="P">Pasaporte</option>
                            <option value="J">Juridico</option>
                            <option value="G">Gobierno</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-2">
                        <x-jet-label for="documento" value="{{ __('Documento de Identificación') }}" />
                        <x-jet-input id="bancoreg.documento" type="text" class="mt-1 block w-full"
                            wire:model.defer="bancoreg.documento" disabled/>
                    </div>
                    <div class="col-span-2 sm:col-span-2">
                        <x-jet-label for="telefono" value="{{ __('Número de Teléfono') }}" />
                        <x-jet-input id="bancoreg.telefono" type="text" class="mt-1 block w-full"
                            wire:model.defer="bancoreg.telefono" disabled/>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <x-jet-label for="transferencias " value="{{ __('Transferencias') }}" />
                        <input type="checkbox" class="mt-3 ml-4 form-checkbox h-5 w-5 text-primary-500 rounded-full" 
                        wire:model.defer="bancoreg.transferencia" disabled>          
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                        <x-jet-label for="pagomovil" value="{{ __('Pago Móvil ') }}" />
                        <input type="checkbox" class="mt-3 ml-4 form-checkbox h-5 w-5 text-primary-500 rounded-full" 
                        wire:model.defer="bancoreg.pagomovil" disabled>          
                      </div>
                    <x-jet-input id="bancoreg.id" type="hidden" class="mt-1 block w-full" wire:model.defer="bancoreg.id" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalver', false)" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
        <!-- Fin del Modal para ver banco -->

        <!-- Inicio del Modal para Alerta Eliminar cuenta -->
    <x-jet-dialog-modal wire:model="eliminacuenta">
        <x-slot name="title">
            {{$titulo}}
        </x-slot>

        <x-slot name="content">
            {{$resultado}}             
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('eliminacuenta', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3" wire:click="Borrarcuenta({{$idcuenta}})" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>



</div>