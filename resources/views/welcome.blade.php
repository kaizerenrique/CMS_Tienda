<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
     
      <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        
    </head>

<body>
<!-- menu bar -->
  <nav class="fixed top-0 left-0 z-20 w-full border-b border-gray-200 bg-white py-2.5 px-6 sm:px-4">
    <livewire:comp.navbarcomponente/> 
  </nav>
  
  <br>
  <br>
  <br>
   <!--Carusel-->
  <div class="max-w-full mx-auto">
    <div id="default-carousel" class="relative" data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 md:h-72 xl:h-80 2xl:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <span
            class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
            Slide</span>
          <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://flowbite.com/docs/images/carousel/carousel-2.svg"
            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg"
            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
        </div>
      </div>
      <!-- Slider indicators -->
      <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
          data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
          data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
          data-carousel-slide-to="2"></button>
      </div>
      <!-- Slider controls -->
      <button type="button"
        class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
          class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
          <span class="hidden">Previous</span>
        </span>
      </button>
      <button type="button"
        class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
          class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
          <span class="hidden">Next</span>
        </span>
      </button>
      
    </div> 
  </div>
         <!-- Product List -->
  <section class="py-10 bg-gray-100 ">    
    <livewire:shop.productosdestacadoscomponente />    
  </section>

      <div class="py-10 mx-auto full sm:rounded-md bg-blue-500  h-48">
          <div class="flex justify-between bg-blue-500 ">
              <div class="flex items-center max-w-md p-4  sm-auto md-4 bg-blue-500 ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-12 ">
                  <path d="M16.881 4.346A23.112 23.112 0 018.25 6H7.5a5.25 5.25 0 00-.88 10.427 21.593 21.593 0 001.378 3.94c.464 1.004 1.674 1.32 2.582.796l.657-.379c.88-.508 1.165-1.592.772-2.468a17.116 17.116 0 01-.628-1.607c1.918.258 3.76.75 5.5 1.446A21.727 21.727 0 0018 11.25c0-2.413-.393-4.735-1.119-6.904zM18.26 3.74a23.22 23.22 0 011.24 7.51 23.22 23.22 0 01-1.24 7.51c-.055.161-.111.322-.17.482a.75.75 0 101.409.516 24.555 24.555 0 001.415-6.43 2.992 2.992 0 00.836-2.078c0-.806-.319-1.54-.836-2.078a24.65 24.65 0 00-1.415-6.43.75.75 0 10-1.409.516c.059.16.116.321.17.483z" />
                </svg>                
              </div>  
              <div class="max-w-full mx-auto bg-blue-500 " >
                <p class="max-w-full mx-auto px-4 text-white">Esta publicidad del año 1967 recurre utiliza como figura retórica el movimiento de las letras que simulan 
                  el movimiento del andar suave del automóvil que publicitan.</p> 
                  <p class="max-w-full mx-auto px-4 text-white">
                    La interfaz de programación de aplicaciones, conocida también por la sigla API, en inglés, application programming interface
                    es un conjunto de subrutinas.
                  </p>  
              </div>  
         </div>
      </div>

      <section class="py-10 bg-gray-100">
        <div class="mt-10 mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
              <div class="relative flex items-end overflow-hidden rounded-xl">
                <img
                  src="https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80"
                  alt="Hotel Photo" />
              </div>
              <div class="mt-1 p-2">
                <h2 class="text-slate-700">Nombre del Producto</h2>
                <p class="mt-1 text-sm text-slate-400">Clasificacion del Producto</p>
                <div class="mt-3 flex items-end justify-between">
                  <p>
                    <span class="text-lg font-bold text-blue-500">$450</span>
                    <span class="text-sm text-slate-400">Descripcion</span>
                  </p>
                  <div
                    class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <button class="text-sm">Agregar</button>
                  </div>
                </div>
              </div>
            </a>
          </article>    
          <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
              <div class="relative flex items-end overflow-hidden rounded-xl">
                <img
                  src="https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80"
                  alt="Hotel Photo" />
              </div>
              <div class="mt-1 p-2">
                <h2 class="text-slate-700">Nombre del Producto</h2>
                <p class="mt-1 text-sm text-slate-400">Clasificacion del Producto</p>
                <div class="mt-3 flex items-end justify-between">
                  <p>
                    <span class="text-lg font-bold text-blue-500">$252</span>
                    <span class="text-sm text-slate-400">Descripcion</span>
                  </p>
                  <div
                    class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <button class="text-sm">Agregar</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
          <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
              <div class="relative flex items-end overflow-hidden rounded-xl">
                <img
                  src="https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80"
                  alt="Hotel Photo" />
              </div>
              <div class="mt-1 p-2">
                <h2 class="text-slate-700">Nombre del Producto</h2>
                <p class="mt-1 text-sm text-slate-400">Clasificacion del Producto</p>
                <div class="mt-3 flex items-end justify-between">
                  <p>
                    <span class="text-lg font-bold text-blue-500">$252</span>
                    <span class="text-sm text-slate-400">Descripcion</span>
                  </p>
                  <div
                    class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <button class="text-sm">Agregar</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
          <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
              <div class="relative flex items-end overflow-hidden rounded-xl">
                <img
                  src="https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80"
                  alt="Hotel Photo" />
              </div>
              <div class="mt-1 p-2">
                <h2 class="text-slate-700">Nombre del Producto</h2>
                <p class="mt-1 text-sm text-slate-400">Clasificacion del Producto</p>
                <div class="mt-3 flex items-end justify-between">
                  <p>
                    <span class="text-lg font-bold text-blue-500">$252</span>
                    <span class="text-sm text-slate-400">Descripcion</span>
                  </p>
                  <div
                    class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <button class="text-sm">Agregar</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
          <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
              <div class="relative flex items-end overflow-hidden rounded-xl">
                <img
                  src="https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80"
                  alt="Hotel Photo" />
              </div>
              <div class="mt-1 p-2">
                <h2 class="text-slate-700">Nombre del Producto</h2>
                <p class="mt-1 text-sm text-slate-400">Clasificacion del Producto</p>
                <div class="mt-3 flex items-end justify-between">
                  <p>
                    <span class="text-lg font-bold text-blue-500">$252</span>
                    <span class="text-sm text-slate-400">Descripcion</span>
                  </p>
                  <div
                    class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <button class="text-sm">Agregar</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
          <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
              <div class="relative flex items-end overflow-hidden rounded-xl">
                <img
                  src="https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80"
                  alt="Hotel Photo" />
              </div>
              <div class="mt-1 p-2">
                <h2 class="text-slate-700">Nombre del Producto</h2>
                <p class="mt-1 text-sm text-slate-400">Clasificacion del Producto</p>
                <div class="mt-3 flex items-end justify-between">
                  <p>
                    <span class="text-lg font-bold text-blue-500">$252</span>
                    <span class="text-sm text-slate-400">Descripcion</span>
                  </p>
                  <div
                    class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <button class="text-sm">Agregar</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
          <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
              <div class="relative flex items-end overflow-hidden rounded-xl">
                <img
                  src="https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80"
                  alt="Hotel Photo" />
              </div>
              <div class="mt-1 p-2">
                <h2 class="text-slate-700">Nombre del Producto</h2>
                <p class="mt-1 text-sm text-slate-400">Clasificacion del Producto</p>
                <div class="mt-3 flex items-end justify-between">
                  <p>
                    <span class="text-lg font-bold text-blue-500">$252</span>
                    <span class="text-sm text-slate-400">Descripcion</span>
                  </p>
                  <div
                    class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <button class="text-sm">Agregar</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
          <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <a href="#">
              <div class="relative flex items-end overflow-hidden rounded-xl">
                <img
                  src="https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80"
                  alt="Hotel Photo" />
              </div>
              <div class="mt-1 p-2">
                <h2 class="text-slate-700">Nombre del Producto</h2>
                <p class="mt-1 text-sm text-slate-400">Clasificacion del Producto</p>
                <div class="mt-3 flex items-end justify-between">
                  <p>
                    <span class="text-lg font-bold text-blue-500">$252</span>
                    <span class="text-sm text-slate-400">Descripcion</span>
                  </p>
                  <div
                    class="flex items-center space-x-1.5 rounded-lg bg-blue-700 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <button class="text-sm">Agregar</button>
                  </div>
                </div>
              </div>
            </a>
          </article>


        </div>
      </section>
      
    <footer class="relative bg-blue-500 pt-8 pb-6">
      <livewire:comp.footercomponente /> 
    </footer>

    @livewireScripts   
  </body>
</html>
