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
                </p>
                <div
                    class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <button class="text-sm" wire:click="agregaralcarro({{ $producto->id }})">Agregar</button>
                </div>
                </div>
            </div>            
        </article>        
    @endforeach 
</div> 
