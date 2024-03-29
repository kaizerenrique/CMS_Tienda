<div class="p-6">
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

    <h1 class="mb-11 text-center text-2xl font-bold">Orden de Compra</h1>
    <hr class="my-6 border-blue bg-gray-900">

    <div class="mx-auto max-w-5xl justify-center px-4 md:flex md:space-x-6 xl:px-0">
        <div class="rounded-lg md:w-2/3">
            @if ($estado == false)
            <div class="">
                <div class="">
                    <h3 class="text-base text-gray-600 font-bold">Datos de perfil para facturación</h3>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 text-sm text-gray-600">
                    <div class="pt-6 col-span-1 sm:col-span-2 md:col-span-1">
                        {{ $perfil->nacionalidad }} - {{ $perfil->cedula }}
                    </div>
                    <div class="pt-6 col-span-1 sm:col-span-2 md:col-span-2">
                        {{ $perfil->nombres }} {{ $perfil->apellidos }}
                    </div>
    
                    <div class="pt-6 flex col-span-1 sm:col-span-2 md:col-span-1">
                        <div class="mr-2">
                            @if ($whatsapp == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6">
                                <path fill="currentColor"
                                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                            </svg>
                            @endif
                        </div>
                        <div class="">
                            {{ $telefono }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-6">
                <div>
                    <h3 class="text-base text-gray-600 font-bold">Retiro o Envio del producto</h3>
                </div>
                <div class="pt-6">
                    <label class="mb-3 block text-base font-medium text-gray-600">
                        Selecciona una Opcion
                      </label>
                      <div class="flex items-center space-x-6">
                        <div class="flex items-center">
                          <input type="radio" name="radio1" id="radioButton1" class="h-5 w-5" wire:click="$emit('requiereDelivery', 0)"/>
                          <label for="radioButton1" class="pl-3 text-base font-medium text-gray-600">
                            Retirar en el local
                          </label>
                        </div>
                        <div class="flex items-center">
                          <input type="radio" name="radio1" id="radioButton2" class="h-5 w-5" value="1" wire:click="$emit('requiereDelivery', 1)"/>
                          <label for="radioButton2" class="pl-3 text-base font-medium text-gray-600">
                            Delivery 
                          </label>
                        </div>
                      </div>
                </div>
            </div>
            @else
            <livewire:comp.personacomponente />
            @endif
        </div>
        
        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-lg hover:shadow-xl md:mt-0 md:w-1/3">
            <div class="mb-2 flex justify-between">
                <p class="text-gray-700">Subtotal</p>
                <p class="text-gray-700">{{ $monto }}</p>
            </div>
            <div class="flex justify-between">
                <p class="text-gray-700">Artículos:</p>
                <p class="text-gray-700">{{ $articulos }}</p>
            </div>
            <div class="flex justify-between">
                <p class="text-gray-700">Delivery:</p>
                <p class="text-gray-700">{{ $valorDelivery }}</p>
            </div>
            <hr class="my-4" />
            <div class="flex justify-between">
                <p class="text-lg font-bold">Total</p>
                <div class="">
                    <p class="mb-1 text-lg font-bold">{{ $total }} Bs</p>
                    <p class="text-sm text-gray-700">IVA Incluido</p>
                </div>
            </div>

            @if ($estado == false)  
                <button wire:click="generarorden()"
                    class="mt-6 w-full rounded-md bg-blue-700 py-1.5 font-medium text-blue-50 hover:bg-blue-800">
                    Siguiente
                </button>                                
            @endif
            
        </div>

        <!-- Inicio del Modal para alertas  -->
        <x-jet-dialog-modal wire:model="mensajeModal">
            <x-slot name="title">
                {{$titulo}}
            </x-slot>

            <x-slot name="content">
                {{$mensaje}}
            </x-slot>

            <x-slot name="footer">
                <button wire:click="$toggle('mensajeModal', false)" wire:loading.attr="disabled"
                class="mt-6 w-full rounded-md bg-blue-700 py-1.5 font-medium text-blue-50 hover:bg-blue-800">
                {{ __('Aceptar') }}
                </button>
            </x-slot>            
        </x-jet-dialog-modal>

        <!-- Inicio del Modal para alertas  -->
        <x-jet-dialog-modal wire:model="modalOrden">
            <x-slot name="title">
                {{$titulo}}
            </x-slot>

            <x-slot name="content">
                {{$mensaje}}
            </x-slot>

            <x-slot name="footer">
                <button wire:click="redireccionar()" wire:loading.attr="disabled"
                class="mt-6 w-full rounded-md bg-blue-700 py-1.5 font-medium text-blue-50 hover:bg-blue-800">
                {{ __('Aceptar') }}
                </button>
            </x-slot>            
        </x-jet-dialog-modal>
    </div>
</div>