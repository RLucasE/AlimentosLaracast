<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home paage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">

    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="bg-white shadow-sm sticky top-0">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-1 md:py-4">
                    <div class="flex items-center justify-between md:justify-start">
                        <!-- Menu Trigger -->
                        <button type="button"
                            class="md:hidden w-10 h-10 rounded-lg -ml-2 flex justify-center items-center">
                            <svg class="text-gray-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <!-- ./ Menu Trigger -->

                        <a href="#" class="font-bold text-gray-700 text-2xl">Logo</a>

                        <div class="hidden md:flex space-x-3 flex-1 lg:ml-8">
                            {{-- <a href="#"
                                class="px-2 py-2 hover:bg-gray-100 rounded-lg text-gray-400 hover:text-gray-600">Electronics</a>
                                    --}}
                            @can('isVend', \App\Models\User::class)
                                <!-- The current user can update the post... -->
                                <x-nav-link href="/offersMy" :active="request()->is('offersMy')">Mis Ofertas</x-nav-link>
                                <x-nav-link href="/myBusiness" :active="request()->is('myBusiness')">Mi Negocio</x-nav-link>
                                <x-nav-link href="/clients" :active="request()->is('clients')">Clientes</x-nav-link>
                            @endcan

                            @can('isCom', \App\Models\User::class)
                                <!-- El botón solo se muestra si el usuario es administrador -->
                                <x-nav-link href="/offers" :active="request()->is('offers')">Ofertas</x-nav-link>
                                @can('new-adress', \App\Models\User::class)
                                    <x-nav-link href="/newVend" :active="request()->is('newVend')">Ser Vendedor</x-nav-link>
                                @endcan
                            @endcan

                            @can('isAdm', \App\Models\User::class)
                                <!-- El botón solo se muestra si el usuario es administrador -->
                                <x-nav-link href="/foods" :active="request()->is('foods')">Comidas</x-nav-link>
                                <x-nav-link href="/adresses" :active="request()->is('adresses')">Direcciones</x-nav-link>
                                <x-nav-link href="/reporteAlimentos" :active="request()->is('reporteAlimentos')">Reportes</x-nav-link>
                            @endcan
                        </div>

                        <div class="flex items-center space-x-4">
                            {{-- <div class="relative hidden md:block">
                                <input type="search"
                                    class="pl-10 pr-2 h-10 py-1 rounded-lg border border-gray-200 focus:border-gray-300 focus:outline-none focus:shadow-inner leading-none"
                                    placeholder="Search">
                                <svg class="h-6 w-6 text-gray-300 ml-2 mt-2 stroke-current absolute top-0 left-0"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div> --}}

                            @can('isCom', \App\Models\User::class)
                                <a href="/offerCarrito"
                                    class="flex h-10 items-center px-2 rounded-lg border border-gray-200 hover:border-gray-300 focus:outline-none hover:shadow-inner">
                                    <svg class="h-6 w-6 leading-none text-gray-300 stroke-current"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <span class="pl-1 text-gray-500 text-md">0</span>
                                </a>
                            @endcan

                            <form action="/logout" method="POST">
                                @csrf
                                <button href="#" title=""
                                    class="text-base font-medium text-gray-900 transition-all duration-200 rounded focus:outline-none font-pj hover:text-opacity-50 focus:ring-1 focus:ring-gray-900 focus:ring-offset-2"
                                    type="submit">
                                    Cerrar Sesion </button>
                            </form>





                            {{-- <button type="button"
                                class="hidden md:block w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex justify-center items-center">
                                <img src="https://avatars.dicebear.com/api/bottts/2.svg" alt="bottts" width="28"
                                    height="28" class="rounded-lg mx-auto">
                            </button> --}}
                        </div>
                    </div>

                    <!-- Search Mobile -->
                    <div class="relative md:hidden">
                        <input type="search"
                            class="mt-1 w-full pl-10 pr-2 h-10 py-1 rounded-lg border border-gray-200 focus:border-gray-300 focus:outline-none focus:shadow-inner leading-none"
                            placeholder="Search">

                        <svg class="h-6 w-6 text-gray-300 ml-2 mt-3 stroke-current absolute top-0 left-0"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <!-- ./ Search Mobile -->
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
