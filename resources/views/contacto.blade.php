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
        <div>
            <section class="py-10">
                <br>
                <br>
                <h1 class="mb-10 text-center text-2xl font-bold">Contactanos!</h1>
                <hr class="border mx-2 bg-blue-400">
                <div class="mt-10 mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                      <a href="https://facebook.com">
                        <div class="relative flex items-end overflow-hidden rounded-xl">
                          <img
                            src="https://1000marche.net/wp-content/uploads/2020/03/Facebook-logo-500x313.png"
                            alt="Hotel Photo" />
                        </div>
                        <div class="mt-1 p-2">
                          <h2 class="text-slate-900">Facebook</h2>
                        </div>
                      </a>
                    </article>    
                    <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                        <a href="https://instagram.com">
                          <div class="relative flex items-end overflow-hidden rounded-xl">
                            <img
                              src="https://1000marcas.net/wp-content/uploads/2019/11/Instagram-Logo.png"
                              alt="Hotel Photo" />
                          </div>
                          <div class="mt-1 p-2">
                            <h2 class="text-slate-900">Instagram</h2>
                          </div>
                        </a>
                      </article>    
                      <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                        <a href="https://twitter.com">
                          <div class="relative flex items-end overflow-hidden rounded-xl">
                            <img
                              src="https://s1.eestatic.com/2015/02/03/actualidad/actualidad_8259436_128468394_1706x960.jpg"
                              alt="Hotel Photo" />
                          </div>
                          <div class="mt-1 p-2">
                            <h2 class="text-slate-900">Twitter</h2>
                          </div>
                        </a>
                      </article>    
                      <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                        <a href="#">
                          <div class="relative flex items-end overflow-hidden rounded-xl">
                            <img
                              src="https://1000marcas.net/wp-content/uploads/2019/11/WhatsApp-logo.png"
                              alt="Hotel Photo" />
                          </div>
                          <div class="mt-1 p-2">
                            <h2 class="text-slate-900">WhatsApp</h2>
                          </div>
                        </a>
                      </article>    
                </div>
            </select>
        
        <section>
            <h2 class="px-2 text-2xl lg:mb-16 font-light text-center sm:text-xl">¡Que tal te parece la experiencia! </h2>
            <br>
                <h2 class="px-2 text-2xl lg:mb-16 font-light text-center sm:text-xl">Puedes enviarnos tu comentario a traves de nuestras distintas plataformas en redes sociales</h2>
            <br>
            <hr class="border mx-2 bg-blue-400">
            <div class="px-4 flex items-center justify-center font-sans overflow-hidden">
                <div class="px-6 w-full lg:w-5/6">
                 <div class="px-4 bg-white shadow-md rounded my-6">
                    <div>
                        <label for="email" class="block mb-2 text-sm-4 text-sm font-medium text-gray-900">Tu Correo</label>
                        <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 center w-full p-2.5" placeholder="nombre@Email.com" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Tu Comentario</label>
                        <textarea id="message" rows="6" class="center p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Escribe Aqui..."></textarea>
                    </div>
                    <button type="submit" class="border border-blue-700 bg-blue-700 text-white rounded-lg px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline">Enviar comentario</button>
                </div>
                </div>
            </div>
          </section>
          <br>

            <div class="px-6 py-6 mx-auto max-w-lg ">
                <img src="https://scientiait.blob.core.windows.net/programandoamedianoche/wp-content/uploads/2011/02/google_maps.png" class="h-17 w-17 mb-8 font-bold rounded-lg">
                <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjFhe7O14n9AhUuLFkFHUDfC4EQFnoECBYQAQ&url=https%3A%2F%2Fwww.google.com%2Fmaps%2F%4039.550051%2C-105.782067%2C6z%3Fhl%3Des&usg=AOvVaw3Rqp86ceOQN5Btrq3jNtLe"> 
                 <h1 class=" text-bg-blue-700 px-6 py-6 mx-auto max-w-lg mb-8 text-center text-2xl">Puedes encontrarnos Aqui</h1>
                </a>
            </div>
          <br>

        <footer class="relative bg-blue-500 pt-8 pb-6">
            <livewire:comp.footercomponente /> 
        </footer>
        
        @livewireScripts   
    </body>
</html>