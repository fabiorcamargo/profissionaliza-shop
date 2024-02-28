<div>
    {{-- The best athlete wants his opponent at his best. --}}

    @livewire('nav-custom')



    <body class="antialiased">




        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;1,600&display=swap"
            rel="stylesheet" />

        <!-- Seção 1: Introdução -->
        <section>
            @livewire('product.header', ['product' => $product])
        </section>
        <!-- Fim Seção 1: Introdução -->









        <!-- Seção 2: Recursos -->
        <section class="relative overflow-hidden bg-gray-100 py-12 sm:py-16 lg:py-20" id='details'>
            <div class="absolute h-72 w-72 scale-125 -right-8 -bottom-10">
                <div class="absolute h-60 w-60 rounded-2xl border-4 border-blue-600"></div>
                <div class="absolute h-60 w-60 translate-x-3 translate-y-3 rounded-2xl border-4 border-blue-600"></div>
                <div class="absolute h-60 w-60 translate-x-6 translate-y-6 rounded-2xl border-4 border-blue-600"></div>
            </div>
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="sm:text-center">
                    <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-4xl xl:text-5xl">
                        Aprendizagem <br class="sm:hidden" />
                        acelerada
                    </h2>
                    <hr class="mt-4 h-1.5 w-32 border-none bg-blue-600 sm:mx-auto sm:mt-8" />
                </div>

                <div class="mx-auto mt-20 grid max-w-screen-lg grid-cols-1 gap-x-8 gap-y-12 text-center sm:text-left md:grid-cols-1">
                    <div class="relative flex flex-col items-center justify-center sm:flex-row sm:items-start backdrop-blur-lg rounded-3xl border bg-white/70  py-10 text-left shadow lg:px-12 transition hover:translate-y-2">
                        <x-heroicon-c-hand-thumb-up class="relative m-0 w-16 font-black text-blue-600 mb-5 sm:mr-5 sm:mb-0 sm:text-center"/>
                        <p class="relative mt-5 text-gray-600 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores doloremque vel</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Seção 3: Testemunhos -->
        <section class="bg-white py-12 sm:py-16 lg:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center">
                    <div class="text-center">
                        <p class="text-lg font-medium text-blue-600">623 Pessoas recomendaram {{$product->name}}</p>
                        <h2 class="mt-4 text-3xl font-bold text-blue-900 sm:text-4xl xl:text-5xl">Dê uma olhada no que
                            nossos clientes dizem</h2>
                    </div>

                    {{-- <div class="mt-8 text-center md:order-3 md:mt-16">
                        <button
                            class="mb-20 rounded-lg border-2 border-blue-700 bg-blue-700 px-6 py-2 font-medium text-white transition hover:translate-y-1">More
                            reviews on Google Reviews</button>
                    </div> --}}

                    <div class="relative mt-10 md:order-2 md:mt-24">
                        <div class="absolute -inset-x-1 inset-y-16 md:-inset-x-2 md:-inset-y-6">
                            <div class="mx-auto h-full w-full max-w-5xl rounded-3xl opacity-30 blur-lg filter"></div>
                        </div>

                        <div
                            class="relative mx-auto grid max-w-lg grid-cols-1 gap-6 md:max-w-none md:grid-cols-3 lg:gap-10">
                            <div class="flex flex-col overflow-hidden rounded-xl border shadow-sm">
                                <div class="flex flex-1 flex-col justify-between bg-white p-6 lg:px-7 lg:py-8">
                                    <div class="flex-1">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>

                                        <blockquote class="mt-8 flex-1">
                                            <p class="font-[400] text-xl italic text-blue-900">“Lorem ipsum dolor sit
                                                amet consectetur adipisicing elit. Animi ducimus repellat aperiam quam
                                                consequatur eligendi totam vitae iusto mollitia esse.”</p>
                                        </blockquote>
                                    </div>

                                    <div class="mt-8 flex items-center">
                                        <img class="h-11 w-11 flex-shrink-0 rounded-full object-cover"
                                            src="https://componentland.com/images/y9s3xOJV6rnQPKIrdPYJy.png" alt="" />
                                        <div class="ml-4">
                                            <p class="text-base font-bold text-blue-900">Akorn Veesle</p>
                                            <p class="mt-0.5 text-sm text-gray-500">CEO Lufthansa Corp</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col overflow-hidden rounded-xl border shadow-sm">
                                <div class="flex flex-1 flex-col justify-between bg-white p-6 lg:px-7 lg:py-8">
                                    <div class="flex-1">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>

                                        <blockquote class="mt-8 flex-1">
                                            <p class="font-[400] text-xl italic text-blue-900">“Lorem ipsum dolor sit
                                                amet consectetur adipisicing elit. Animi ducimus repellat aperiam quam
                                                consequatur eligendi totam vitae iusto mollitia esse.”</p>
                                        </blockquote>
                                    </div>

                                    <div class="mt-8 flex items-center">
                                        <img class="h-11 w-11 flex-shrink-0 rounded-full object-cover"
                                            src="https://componentland.com/images/y9s3xOJV6rnQPKIrdPYJy.png" alt="" />
                                        <div class="ml-4">
                                            <p class="text-base font-bold text-blue-900">Akorn Veesle</p>
                                            <p class="mt-0.5 text-sm text-gray-500">CEO Lufthansa Corp</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col overflow-hidden rounded-xl border shadow-sm">
                                <div class="flex flex-1 flex-col justify-between bg-white p-6 lg:px-7 lg:py-8">
                                    <div class="flex-1">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>

                                        <blockquote class="mt-8 flex-1">
                                            <p class="font-[400] text-xl italic text-blue-900">“Lorem ipsum dolor sit
                                                amet consectetur adipisicing elit. Animi ducimus repellat aperiam quam
                                                consequatur eligendi totam vitae iusto mollitia esse.”</p>
                                        </blockquote>
                                    </div>

                                    <div class="mt-8 flex items-center">
                                        <img class="h-11 w-11 flex-shrink-0 rounded-full object-cover"
                                            src="https://componentland.com/images/y9s3xOJV6rnQPKIrdPYJy.png" alt="" />
                                        <div class="ml-4">
                                            <p class="text-base font-bold text-blue-900">Akorn Veesle</p>
                                            <p class="mt-0.5 text-sm text-gray-500">CEO Lufthansa Corp</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>








    </body>
</div>
