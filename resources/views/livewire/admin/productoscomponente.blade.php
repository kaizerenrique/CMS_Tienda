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
   
    <!-- Seccion que contiene el titulo las busquedas y el boton para registro nuevo -->
  <div class="flex flex-wrap items-center px-4 py-2">
    <div class="relative w-full max-w-full flex-grow flex-1">
      <h3 class="font-semibold text-lg text-gray-800 ">Listado de Productos </h3>
    </div>
    <div class="flex flex-col items-center w-full max-w-xl">
      <input wire:model="buscar" type="search" placeholder="Buscar"
        class="input input-bordered w-full max-w-xs rounded-lg" />
    </div>
    <div class="relative w-full max-w-full flex-grow flex-1 text-right">
        <button type="button"
        class="border border-blue-700 bg-blue-700 text-white rounded-lg px-4 py-2 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline">
        <div class="flex items-center">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
              </svg>                                                                
          </span>
          <span class="ml-2">Producto</span>
        </div>
      </button>
    </div>
  </div>
  <!-- / Seccion que contiene el titulo las busquedas y el boton para registro nuevo -->

  <div class="px-4 py-2">
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4"> 
      <div class="col-span-2 sm:col-span-2">
        
      </div>     
      <div class="col-span-2 sm:col-span-2">
        <div class="flex-1 text-right">      
          <label class="inline-flex items-center mt-3 ">
            <span class="mr-2 pt-4">Solo Productos Activos: </span>
            <input type="checkbox" class="mt-4 form-checkbox h-5 w-5 text-primary-500 rounded-full" wire:model="activo">
          </label>
        </div>
      </div>
    </div>    
  </div>
  

   <!--Tabla Producto-->
   <div class="overflow-x-auto">
    <div class="bg-white shadow-md rounded my-6">
      <table class="min-w-max w-full table-auto">
        <thead>
          <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Nombre</th>
            <th class="py-3 px-6 text-left">Código</th>
            <th class="py-3 px-6 text-left">Estado</th>
            <th class="py-3 px-6 text-center">Categoria</th>
            <th class="py-3 px-6 text-center">Precio</th>
            <th class="py-3 px-6 text-center">Moneda</th>
            <th class="py-3 px-6 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @foreach ($productos as $producto)
          <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap">
              {{ $producto->nombre }}
            </td>
            <td class="py-3 px-6 text-left whitespace-nowrap">
              {{ $producto->codigo }}
            </td>
            <td class="py-3 px-6 text-left">
              @switch($producto->stado)
                @case(0)
                <span
                  class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-lg">Inactivo</span>
                @break
                @case(1)
                <span
                  class="bg-emerald-100 text-emerald-700 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-lg">Active</span>
                @break
                @default
              @endswitch

            </td>
            <td class="py-3 px-6 text-center">
              {{ $producto->categoria->categoria }}
            </td>
            <td class="py-3 px-6 text-center">
              {{ number_format($producto->costo , 2) }}
            </td>
            <td class="py-3 px-6 text-center">
              {{ $producto->metodo }}
            </td>             
            <td class="py-3 px-6 text-center">
              <div class="flex item-center justify-center">
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </div>
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                </div>
                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" wire:click="consultaeliminarproducto({{ $producto->id }})">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
      {{ $productos->links() }}
    </div>
  </div>

    <!-- Inicio del Modal para Eliminar Producto -->
    <x-jet-dialog-modal wire:model="modalEliminar">
      <x-slot name="title">
          {{ __('Borrar Producto') }}
      </x-slot>
      <x-slot name="content">             
          {{$mensajemodal}}
      </x-slot>
  
      <x-slot name="footer">
          <button type="button" wire:click="$toggle('modalEliminar', false)" wire:loading.attr="disabled"
            class="border border-emerald-700 bg-emerald-700 text-white rounded-lg px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-emerald-800 focus:outline-none focus:shadow-outline">
            {{ __('Cancelar') }}
          </button>
          <button type="button" wire:click="eliminar({{$identificador}})" wire:loading.attr="disabled"
            class="border border-red-700 bg-red-700 text-white rounded-lg px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-800 focus:outline-none focus:shadow-outline">
            {{ __('Eliminar') }}
          </button>
      </x-slot>
    </x-jet-dialog-modal>
    <!-- Fin del Modal para Eliminar Producto -->


</div>
