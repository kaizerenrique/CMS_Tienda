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


    <h1 class="mb-11 text-center text-2xl font-bold">Administrar Carrito</h1>
    <hr class="my-6 border-blue bg-gray-900">
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
        <div class="rounded-lg md:w-2/3">
            @foreach($cart_items as $cart_item)
            <div
                class="justify-between mb-6 rounded-lg bg-white p-6 shadow-lg hover:shadow-xl sm:flex sm:justify-start hover:transform hover:scale-105 duration-300">
                <img src="{{ $cart_item->associatedModel->cover_img }}" alt="product-image"
                    class="w-full rounded-lg sm:w-40" />

                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                    <div class="mt-5 sm:mt-0">
                        <h2 class="text-lg font-bold text-gray-900">{{ $cart_item->name }}</h2>
                        <p class="mt-1 text-xs text-gray-700">{{ $cart_item->associatedModel->descripcion }}</p>
                        <p class="text-sm">{{ $cart_item->price }}</p>
                        <div>
                            <hr class="my-6 border-blue bg-gray-900">
                            <p class="text-sm font-bold">
                                {{\Cart::session(auth()->user()->id)->get($cart_item->id)->getPriceSum()}}</p>
                        </div>
                    </div>

                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                        <div class="flex items-center border-gray-300">
                            <span class="cursor-pointer rounded-l bg-gray-200 py-1 px-3.5 duration-100
                                 hover:bg-blue-500 hover:text-blue-50" wire:click="dec_cantidad({{ $cart_item->id }})">
                                -
                            </span>
                            <input class="h-8 w-16 rounded-lg bg-white text-center text-xs outline-none" type="text"
                                value="{{ $cart_item->quantity }}" disabled />
                            <span class="cursor-pointer rounded-l bg-gray-200 py-1 px-3.5 duration-100
                                 hover:bg-blue-500 hover:text-blue-50" wire:click="inc_cantidad({{ $cart_item->id }})">
                                +
                            </span>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="" wire:click="eliminar_item({{ $cart_item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.50" stroke="currentColor"
                                    class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
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
            
            <button {{-- onclick="getLocation()" --}} wire:click="orden()"
                class="mt-6 w-full rounded-md bg-blue-700 py-1.5 font-medium text-blue-50 hover:bg-blue-800">
                Siguiente
            </button>
        </div>
    </div>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            window.livewire.emit('set:latitude-longitude', latitude, longitude)
        }
    </script>

</div>