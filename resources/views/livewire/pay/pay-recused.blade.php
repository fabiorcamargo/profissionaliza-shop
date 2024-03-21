<div>
    <div class="relative">
        <div id="conteudo" class="w-full flex items-center justify-center bg-red-500 py-16">
            <div class="w-80 items-center justify-center">
                <div id="icone" class="flex items-center justify-center text-center">
                    <!-- Remover a classe w-24 e adicionar flex, items-center e justify-center -->
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="w-24 h-24">
                        <!-- Ajustar o tamanho do SVG aqui -->
                        <circle cx="50" cy="50" r="40" fill="white" />
                        <foreignObject x="20" y="20" width="60" height="60">
                            <x-heroicon-o-currency-dollar class="text-red-500 items-center justify-center" />
                        </foreignObject>
                    </svg>
                </div>
                <div class="flex items-center justify-center py-4">
                    <div class="text-2xl font-semibold text-white">Algo saiu errado...</div>
                </div>
                <div class="flex items-center justify-center">
                    <p class="font-semibold text-white text-center">{!!$message!!}</p>
                </div>

            </div>
        </div>
        <div class="flex items-center justify-center  bg-white">
            <div id="conteudo" class="flex items-center justify-center shadow-lg border px-10 py-10 absolute -bottom-60 bg-white rounded-lg">
                <div class="w-80 items-center justify-center">
                    <div class="flex items-center justify-center py-4">
                        <div class="text-2xl font-semibold text-gray-500">O que eu posso fazer?</div>
                    </div>
                    <div class="flex items-center justify-center">
                        <p class="font-semibold text-gray-500 text-center">Tentar novamente, ou utilizar outra forma de
                            pagamento.</p>
                    </div>
                    <div class="flex items-center justify-center pt-6">
                        <a href="/checkout" type="button"
                            class="text-white w-40 bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
