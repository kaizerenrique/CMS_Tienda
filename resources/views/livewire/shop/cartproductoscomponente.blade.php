<div class="p-6">
    <h1 class="mb-10 text-center text-2xl font-bold">Vista del Carrito</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
        <div class="rounded-lg md:w-2/3">
            @foreach($cart_items as $cart_item)
            {{ $cart_item }}
                <div  class="justify-between mb-6 rounded-lg bg-white p-6 shadow-lg hover:shadow-xl sm:flex sm:justify-start hover:transform hover:scale-105 duration-300">
                    <img src="{{ $cart_item->associatedModel->cover_img }}"
                    alt="product-image" class="w-full rounded-lg sm:w-40" />

                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                        <div class="mt-5 sm:mt-0">
                            <h2 class="text-lg font-bold text-gray-900">{{ $cart_item->name }}</h2>
                            <p class="mt-1 text-xs text-gray-700">{{ $cart_item->associatedModel->descripcion }}</p>
                            <p class="text-sm">{{ $cart_item->price }}</p>
                        </div>
                        <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                            <div class="flex items-center border-gray-100">
                                <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100
                                 hover:bg-blue-500 hover:text-blue-50" wire:click="dec_cantidad({{ $cart_item->id }})">                                    
                                    - 
                                </span>                        
                                <input class="h-8 w-16 border bg-white text-center text-xs outline-none" type="text" 
                                    value="{{ $cart_item->quantity }}" disabled/>                                     
                                <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100
                                 hover:bg-blue-500 hover:text-blue-50" wire:click="inc_cantidad({{ $cart_item->id }})">                                    
                                    + 
                                </span>                                   
                            </div>

                            <div class="flex items-center space-x-4">                                
                                <p class="text-sm">{{\Cart::session(auth()->user()->id)->get($cart_item->id)->getPriceSum()}}</p>
                                <div class="" wire:click="eliminar_item({{ $cart_item->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div>                
            @endforeach
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
            <hr class="my-4" />
            <div class="flex justify-between">
              <p class="text-lg font-bold">Total</p>
              <div class="">
                <p class="mb-1 text-lg font-bold">{{ $monto }} Bs</p>
                <p class="text-sm text-gray-700">IVA Incluido</p>
              </div>
            </div>
            <button class="mt-6 w-full rounded-md bg-blue-700 py-1.5 font-medium text-blue-50 hover:bg-blue-800">Check
              out</button>
        </div>
    </div>

    
</div>
