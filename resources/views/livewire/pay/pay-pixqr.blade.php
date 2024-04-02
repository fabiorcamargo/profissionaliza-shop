<div>

    <div class="relative">
        <div id="conteudo" class="w-full flex items-center justify-center bg-yellow-300 py-16">
            <div class="w-80 items-center justify-center">
                <div id="icone" class="flex items-center justify-center text-center">
                    <!-- Remover a classe w-24 e adicionar flex, items-center e justify-center -->
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="w-24 h-24">
                        <!-- Ajustar o tamanho do SVG aqui -->
                        <circle cx="50" cy="50" r="40" fill="white" />
                        <foreignObject x="20" y="20" width="60" height="60">
                            <x-heroicon-o-currency-dollar class="text-yellow-300 items-center justify-center" />
                        </foreignObject>
                    </svg>
                </div>
                <div class="flex items-center justify-center py-4">
                    <div class="text-2xl font-semibold text-gray-500">Pague através do QrCode ou do Pix Copie e Cole
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    {{-- <p class="font-semibold text-white text-center">{{$order->billingType_id == 2 ? 'Siga os passos
                        abaixo para acessar seu produto' : 'não'}}</p> --}}

                    @if($pix->encodedImage)

                    <div class="flex-row">
                        <img class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6 col-xxl-6"
                            src="data:image/jpeg;base64, {{$pix->encodedImage}}" />

                            <div class="grid grid-cols-8 gap-2 w-full max-w-[23rem] pt-4">
                            
                                <input id="texto-a-copiar" type="text"
                                    class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{!! $copycode !!}" disabled readonly>
                                <button data-copy-to-clipboard-target="npm-install" onclick="copiarParaClipboard()"
                                    class="col-span-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 items-center inline-flex justify-center">
                                    <span id="default-message">Copiar</span>
                                    <span id="success-message" class="hidden inline-flex items-center">
                                        <svg class="w-3 h-3 text-white me-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        Copiado!
                                    </span>
                                </button>
                            </div>
                    </div>

                    

                    @endif
                </div>

            </div>
        </div>
       
    </div>
</div>