<div class="p-6">
  <div class="p-6">
    <!-- Seccion que contiene el titulo las busquedas y el boton para registro nuevo -->
    <div class="flex flex-wrap items-center px-4 py-2">
      <h5 class="font-semibold text-lg text-gray-800 ">Listado de Usuarios </h5>
      <div class="flex flex-col items-center w-full max-w-xl">
        <input wire:model="buscar" type="search" placeholder="Buscar"
          class="input input-bordered w-full max-w-xs rounded-lg" />
      </div>
      <div class="relative w-full max-w-full flex-grow flex-1 text-right">
        <button type="button"
          class="border border-blue-700 bg-blue-700 text-white rounded-lg px-4 py-2 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline">
          <div class="flex items-center">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
              </svg>
            </span>
            <span class="ml-2">Usuarios</span>
          </div>
        </button>
      </div>
    </div>

    <!--Tabla Usuario-->
    <div class="overflow-x-auto">
      <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-max w-full table-auto">
          <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
              <th class="py-3 px-6 text-left">Usuarios</th>
              <th class="py-3 px-6 text-left">Email</th>
              <th class="py-3 px-6 text-left">Rol</th>
              <th class="py-3 px-6 text-left">Perfil</th>
              <th class="py-3 px-6 text-center">Acciones</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 text-sm font-light">
            @foreach($usuarios as $usuario)
              <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                  {{ $usuario->name }}
                </td>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                  {{ $usuario->email }}
                </td>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                  @foreach($usuario->roles as $role)
                    {{ $role->name }}
                  @endforeach
                </td>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                  @if (!empty($usuario->persona->nombres))
                    {{ $usuario->persona->nombres }}                      
                  @endif
                  
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
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
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
        {{ $usuarios->links() }}
      </div>
    </div>


  </div>