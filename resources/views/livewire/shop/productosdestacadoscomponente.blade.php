<div class="mt-10 mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @foreach ($productos as $producto)
        <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">            
            <div class="relative flex items-end overflow-hidden rounded-xl">
                <img src="{{ $producto->cover_img }}" alt="Hotel Photo" />
            </div>
            <div class="mt-1 p-2">
                <h2 class="text-slate-700">{{ $producto->nombre }}</h2>
                <p class="mt-1 text-sm text-slate-400">{{ $producto->descripcion }}</p>
                <div class="mt-3 flex items-end justify-between">
                <p>
                    <span class="text-lg font-bold text-blue-500">{{ number_format($producto->costo , 2) }}</span>
                    <span class="text-sm text-slate-400">{{ $producto->metodo }}</span>
                    <!-- icono de delivery -->
                    @if ($producto->delivery)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    @endif
                </p>
                

                @auth
                    <div class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5
                    text-white duration-100 hover:bg-blue-600" wire:click="agregaralcarro({{ $producto->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        
                        <button class="text-sm">Agregar</button>
                    </div>  
                        
                    @else                    
                        <a href="{{ route('login') }}">
                            <button type="button" class="rounde mr-3 hidden border border-blue-700 py-1.5 px-6 text-center text-sm font-medium 
                            text-blue-700 focus:outline-none transition duration-500 focus:ring-4 focus:ring-blue-300 md:inline-block rounded-lg">
                                Login
                            </button>                        
                        </a>
                @endauth
            </div>            
        </article>        
    @endforeach 
</div>   
