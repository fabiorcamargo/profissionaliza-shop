<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
      theme: {
        extend: {
          colors: {
            accent: {"50":"#fff5f0","100":"#ffd6c2","200":"#feb795","300":"#fe9868","400":"#fd783c","500":"#fb580f","600":"#db4603","700":"#b03802","800":"#862b01","900":"#5a1d00","950":"#2f0f00"}
          }
        }
      }
    }
    </script>
</head>

<body>
    <div i>


        <header class="w-dvw absolute top-0 left-1/2 -translate-x-1/2 z-[1000] py-4">
            <div class="max-w-[120rem] text-gray-50 px-6 md:px-8 lg:px-10">
                <nav class="w-full flex flex-row items-center font-sans">
                    <a class="text-gray-50" href="https://home.profissionalizaead.com.br">
                                <img class="w-50" src="Logo-new.png" alt="">
                    </a>
                   
                </nav>
            </div>
        </header>
        <section class="h-dvh w-dvw max-h-[80rem] relative py-10">
            <div class="absolute inset-0 z-[1]">
                <img class="h-full w-full object-cover object-center" src="Fundo Build.jpg" alt="">
            </div>
            <div class="max-w-[120rem] mx-auto h-full relative z-[2] px-6 md:px-8 lg:px-10">
                <div class="h-full w-full  flex flex-col relative space-y-6">
                    <div class="mt-auto mb-0 text-gray-50 md:pb-36 space-y-6">

                        <h1 class="text-3xl md:text-5xl max-w-[30rem] font-medium">Estamos em Construção</h1>
                        <p
                            class="max-w-[30rem] font-light ml-4 before:content-[''] relative before:absolute before:w-px before:h-full before:left-0 before:top-0 before:-translate-x-4 before:bg-accent-500 md:text-base text-sm">
                            Em breve estará disponíveis todas as informações.</p>
                        <div class="md:flex-row flex-col flex gap-4">
                            <a href="/"
                                class="inline-block text-base font-medium px-12 py-2 bg-purple-400 rounded-lg cursor-pointer">Início</a>
                        </div>
                    </div>
                    <div class="md:absolute md:right-0 md:bottom-32 text-gray-50 my-16">
                        <ul class="flex md:flex-col items-center justify-center gap-2">
                            <li class="h-6 w-6 block rounded-full bg-accent-400 text-gray-50">
                                <a href="https://www.facebook.com/profissionalizaead" class="block h-full w-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full fill-current "
                                        viewBox="0 0 24 24">
                                        <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M0 0h24v24H0z"></path>
                                            <path fill="currentColor"
                                                d="M18 2a1 1 0 0 1 .993.883L19 3v4a1 1 0 0 1-.883.993L18 8h-3v1h3a1 1 0 0 1 .991 1.131l-.02.112l-1 4a1 1 0 0 1-.858.75L17 15h-2v6a1 1 0 0 1-.883.993L14 22h-4a1 1 0 0 1-.993-.883L9 21v-6H7a1 1 0 0 1-.993-.883L6 14v-4a1 1 0 0 1 .883-.993L7 9h2V8a6 6 0 0 1 5.775-5.996L15 2z">
                                            </path>
                                        </g>
                                    </svg>
                                </a>
                            </li>

                            <li class="h-6 w-6 block rounded-full bg-accent-400 text-gray-50 p-1">
                                <a href="https://www.instagram.com/profissionalizaead"><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-full h-full fill-none stroke-current " viewBox="0 0 24 24"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="none"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" fill="none"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" fill="none"></line>
                                    </svg></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>