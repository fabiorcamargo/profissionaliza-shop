<div>
    <div class="relative">
        <div id="conteudo" class="w-full flex items-center justify-center bg-green-500 py-16">
            <div class="w-80 items-center justify-center">
                <div id="icone" class="flex items-center justify-center text-center">
                    <!-- Remover a classe w-24 e adicionar flex, items-center e justify-center -->
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="w-24 h-24">
                        <!-- Ajustar o tamanho do SVG aqui -->
                        <circle cx="50" cy="50" r="40" fill="white" />
                        <foreignObject x="20" y="20" width="60" height="60">
                            <x-heroicon-o-currency-dollar class="text-green-500 items-center justify-center" />
                        </foreignObject>
                    </svg>
                </div>
                <div class="flex items-center justify-center py-4">
                    <div class="text-2xl font-semibold text-white">Seu pagamento foi Aprovado</div>


                </div>
                <div class="flex items-center justify-center">
                    {{-- <p class="font-semibold text-white text-center">{{$order->billingType_id == 2 ? 'Siga os passos
                        abaixo para acessar seu produto' : 'não'}}</p> --}}
                </div>

            </div>
        </div>
        <div class="flex items-center justify-center  bg-white">
            <div id=""
                class="flex items-center justify-center shadow-lg border px-10 py-4 absolute -bottom-48 bg-white rounded-lg">
                <div class="w-80 items-center justify-center">
                    <div class="flex items-center justify-center py-4">
                        {{-- <div class="text-2xl font-semibold text-gray-500 text-center">Obrigado por comprar conosco
                        </div> --}}
                    </div>
                    <div class="flex items-center justify-center">
                        <p class="font-semibold text-gray-500 text-center">Acesse o painel para ver as instruções de acesso.</p>
                    </div>
                    <div class="flex items-center justify-center py-6">
                        <a href="/client" type="button"
                            class="text-white w-40 bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">Painel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
