<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <figure class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 ">
                    <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                        <blockquote>
                          <h1 class="text-3xl text-center">¡Bienvenidos!</h1>
                          <p class="text-lg text-center p-4">
                            “Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, 
                            cuando un impresor N. del T. persona que se dedica a la imprenta desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. 
                            No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.
                           Fue popularizado en los 60s”
                          </p>
                          <p class="text-lg text-center p-4">
                            “Del T. persona que se dedica a la imprenta desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. 
                            No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.
                           Fue popularizado en los 60s”
                          </p>
                        </blockquote>
                      </div>
                    <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-nuevo-empleado_114360-8899.jpg?w=2000"
                     class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="/sarah-dayan.jpg" alt="" width="384" height="512">
                  </figure>
            </div>
        </div>
    </div>
</x-app-layout>
