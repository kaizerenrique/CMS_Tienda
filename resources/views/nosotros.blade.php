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
    
         

      

      
        <footer class="relative bg-blue-500 pt-8 pb-6">
            <livewire:comp.footercomponente /> 
        </footer>
        
        @livewireScripts   
    </body>
</html>
