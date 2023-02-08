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
        <!--Baner-->
        <div class="max-w-full mx-auto">
            <div id="default-carousel" class="relative" data-carousel="static">
              <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                  <span
                    class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
                    Slide</span>
                  <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
                    class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
              <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
            </div>
        </div>   
        <br>
        <section>
          <h1 class="mb-10 text-center text-2xl font-bold">Acerca de Nosotros!</h1>
          <div class="contain grid sm:grid-cols-1 md:grid-cols-2 lg:col-span-1">
            <p class="mt-1 text-12 text-gray 800 px-4">
              <a class="underline decoration-sky-500">Relleno de las imprentas y archivos de texto.</a> 
              Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, 
              cuando un impresor N. del T. persona que se dedica a la imprenta desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. 
              No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.
             Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición,
              como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum. El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. 
              Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta,
              acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.
           </p>
            <img
            src="https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1131&q=80"
            alt="product-image" class="w-64 h-80 px-4 rounded-lg md:h-80 sm:w-80 lg:w-80 sm:margin-top-6" />
          </div>
        </section>
        <br>
        <section>
          <div class="contain grid sm:grid-cols-1 md:grid-cols-2 lg:col-span-1">
            <img
            src="https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1131&q=80"
            alt="product-image" class="w-64 h-80 px-4 rounded-lg md:h-80 sm:w-80 lg:w-80 " />
            <p class="mt-1 text-12 text-gray 800 px-4">
              <a class="underline decoration-sky-500">Relleno de las imprentas y archivos de texto.</a> 
              Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, 
              cuando un impresor N. del T. persona que se dedica a la imprenta desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. 
              No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.
             Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición,
              como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum. El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. 
              Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta,
              acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.
           </p>
          </div>
        </section>
        <br>
                

      
        <footer class="relative bg-blue-500 pt-8 pb-6">
            <livewire:comp.footercomponente /> 
        </footer>
        
        @livewireScripts   
    </body>
</html>
