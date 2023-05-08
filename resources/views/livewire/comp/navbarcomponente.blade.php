<div class="container mx-auto flex max-w-6xl flex-wrap items-center justify-between z-20">
    <a href="#" class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="mr-3 h-6 text-blue-500 sm:h-9">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
        </svg>
        <span class="self-center whitespace-nowrap text-xl font-semibold">Tienda</span>
    </a>
    <div class="mt-2 sm:mt-0 sm:flex md:order-2">
        <button data-collapse-toggle="navbar-sticky" type="button"
            class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
            aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-sticky">
        <ul
            class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:text-sm md:font-medium">
            <li>
                <a href="{{ route('welcome') }}"
                    class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('nosotros') }}"
                    class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">
                    Nosotros
                </a>
            </li>
            <li>
                <a href="{{ route('servicios') }}"
                    class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">
                    Servicios
                </a>
            </li>
            <li>
                <a href="{{ route('contacto') }}"
                    class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">
                    Contacto
                </a>
            </li>             
                @if (Route::has('login'))
                    
                        @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" 
                            class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">
                                Dashboard                                
                            </a>
                        </li> 
                        <li>
                            <!--componente indicardo de carro-->
                            <livewire:shop.cartcomponente />
                        </li>                      
                        
                        @else
                        <li>
                            <a href="{{ route('login') }}"
                            class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">                                
                                Login                                
                            </a>
                        </li>                        

                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}"
                                class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">
                                    Register
                                </a>
                            </li>
                        @endif
                        @endauth                    
                @endif
            
            
        </ul>
    </div>
</div>