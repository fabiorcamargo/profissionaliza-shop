<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <!-- tailwind.config.js -->
    @livewire('nav-custom')
    <main class="my-8">
        <div class="container mx-auto px-6">
            @livewire('banner-full')
            @livewire('banner-mid')

            {{-- <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div class="flex items-end justify-end h-56 w-full bg-cover"
                    style="background-image: url('https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80')">
                    <button
                        class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">Chanel</h3>
                    <span class="text-gray-500 mt-2">$12</span>
                </div>
            </div> --}}
            @livewire('cetegory-show')

        </div>
    </main>

    <footer class="bg-gray-50">
        <div class="mx-auto grid max-w-screen-xl gap-y-8 gap-x-12 px-4 py-10 md:grid-cols-2 xl:grid-cols-4 xl:px-10">
          <div class="max-w-sm">
            <div class="mb-6 flex h-12 items-center space-x-2">
              <span class="text-2xl font-bold">Bel<span class="text-blue-600">Air</span>.</span>
            </div>
            <div class="text-gray-500">Profissionaliza Cursos LTDA<br>42.866.959/0001-54</div>
          </div>
          <div class="">
            <div class="mt-4 mb-2 font-medium xl:mb-4">Endereço</div>
            <div class="text-gray-500">
                Avenida Advogado Horácio Raccanello Filho, 5410 Salas 01 e 02 - Zona 7, Maringá - PR | Brasil
            </div>
          </div>
          <div class="">
            <div class="mt-4 mb-2 font-medium xl:mb-4">Links</div>
            <nav aria-label="Footer Navigation" class="text-gray-500">
              <ul class="space-y-3">
                <li><a class="hover:text-blue-600 hover:underline" href="#">Início</a></li>
                <li><a class="hover:text-blue-600 hover:underline" href="#">Categorias</a></li>
                <li><a class="hover:text-blue-600 hover:underline" href="#">Contato</a></li>
                <li><a class="hover:text-blue-600 hover:underline" href="#">Sobre</a></li>
              </ul>
            </nav>
          </div>
          <div class="">
            <div class="mt-4 mb-2 font-medium xl:mb-4">Se inscreva na Newsletter</div>
            <div class="flex flex-col">
              <div class="mb-4">
                <input type="email" class="focus:outline mb-2 block h-14 w-full rounded-xl bg-gray-200 px-4 sm:w-80 focus:outline-none focus:ring-1 focus:ring-blue-600" placeholder="Insira seu e-mail" />
                <button class="block rounded-xl bg-blue-600 px-6 py-3 font-medium text-white">Inscrever-se</button>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-100">
          <div class="mx-auto flex max-w-screen-xl flex-col gap-y-4 px-4 py-3 text-center text-gray-500 sm:flex-row sm:justify-between sm:text-left">
            <div class="">© 2024 Profissionaliza EAD | All Rights Reserved</div>
            <div class="">
              <a class="" href="#">Política de Privacidade</a>
              <span>|</span>
              <a class="" href="#">Termos de Serviço</a>
            </div>
          </div>
        </div>
      </footer>

    </div>

    @livewireScripts

</body>

</html>
