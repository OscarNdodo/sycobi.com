@extends('index')

@section('main')
    <!-- Conteúdo Principal -->
    <main class="container mx-auto px-4 py-8">
        <!-- Progresso das Etapas -->
        <div class="mb-8">
            <ol class="flex items-center w-full">
                <li
                    class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:inline-block">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <span class="text-white font-medium">1</span>
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 md:text-base">Acento</span>
                </li>
                <li
                    class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:inline-block">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <span class="text-gray-600 font-medium">2</span>
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-500 md:text-base">Passageiro</span>
                </li>

                <li class="flex items-center">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                        <span class="text-gray-600 font-medium">3</span>
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-500 md:text-base">Confirmação</span>
                </li>
            </ol>
        </div>

        <!-- Cabeçalho da Reserva -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">{{ $rota->origem }} → {{ $rota->destino }}</h1>
                    <div class="flex items-center mt-2 text-gray-600">
                        <i class="far fa-calendar-alt mr-2"></i>
                        <span>{{ now()->days()->tomorrow()->format('d/m/Y') }}</span>
                        <i class="far fa-clock ml-4 mr-2"></i>
                        <span>{{ $rota->partida }} - {{ $rota->chegada }}</span>
                    </div>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="text-xl font-bold text-blue-600">{{ number_format($rota->preco, 2, '.') }} MT</span>
                    <span class="block text-sm text-gray-500 mb-6">por passageiro</span>
                    <a href="{{ route('viagens') }}" class="px-8 py-2 bg-red-400 mt-4 flex items-center rounded-md shadow hover:opacity-80 active:scale-95 text-red-600 text-sm" ><i class="fas fa-close text-red-600 mr-2"></i> Cancelar</a>
                </div>
            </div>
        </div>

        <!-- Formulário em Etapas -->
        <form method="POST" action="{{ route('bilhete.criar.post', $rota->id) }}" class="bg-white rounded-lg shadow-md p-6">
            <!-- Etapa 1: Seleção de Assentos (Ativa por padrão) -->
            @csrf
            <div id="step1" class="step-content active">
                <h2 class="text-xl font-semibold mb-6 flex items-center">
                    Seu acento
                </h2>

                <!-- Mapa de Assentos -->
                <div class="border rounded-lg p-4 mb-6">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 flex items-center justify-center bg-blue-400 rounded-lg">
                            {{ $bilhetes > 9 ? $bilhetes + 1 : '0' . $bilhetes + 1 }}
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-4">
                        <!-- Fileira 1 -->



                        @for ($i = 0; $i < $rota->acentos; $i++)
                            @if ($i >= $bilhetes)
                                @if ($i == $bilhetes)
                                    <div
                                        class="seat bg-blue-400 w-12 h-12 flex items-center justify-center rounded cursor-pointer " id="acento">
                                        {{ $i > 9 ? $i + 1 : '0' . $i + 1 }}</div>
                                @else
                                    <div
                                        class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer">
                                        {{ $i > 9 ? $i + 1 : '0' . $i + 1 }}</div>
                                @endif
                            @else
                                <div
                                    class="seat bg-red-400 w-12 h-12 flex items-center justify-center rounded cursor-not-allowed">
                                    {{ $i > 9 ? $i + 1 : '0' . $i + 1 }}</div>
                            @endif
                        @endfor


                    </div>
                </div>

                <!-- Legenda -->
                <div class="flex flex-wrap gap-4 text-sm mb-6">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-gray-100 rounded mr-2"></div>
                        <span>Disponível</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-red-500 rounded mr-2"></div>
                        <span>Ocupado</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-blue-500 rounded mr-2"></div>
                        <span>Selecionado</span>
                    </div>
                </div>

                <!-- Botões de Navegação -->
                <div class="flex justify-end">
                    <button type="button"
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium next-step"
                        data-next="step2">
                        Próximo <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Etapa 2: Dados do Passageiro -->
            <div id="step2" class="step-content hidden">
                <h2 class="text-xl font-semibold mb-6 flex items-center">
                    <i class="fas fa-user-edit mr-2 text-blue-500"></i>
                    Seus dados
                </h2>

                <div>
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 mb-2">Nome completo <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="nome" placeholder="Joe Doe"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        <div>
                            <label class="block text-gray-700 mb-2">E-mail</label>
                            <input type="email" name="email" placeholder="joedoe@email.com"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 mb-2">Tipo de documento</label>
                            <select name="tipo_doc"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                                <option value="">Selecione uma opção</option>
                                <option value="bi">Bilhete de identidade</option>
                                <option value="cc">Carta de condução</option>
                                <option value="cr">Cartão de recencimento</option>
                                <option value="pp">Passaporte</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-700 mb-2">Número de documento </label>
                            <input type="text" name="num_doc" placeholder="123456789000M"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                        </div>
                    </div>

                    <div class="w-full grid grid-cols-1 sm:grid-cols-2">
                        <div class="mb-6">
                            <label class="block text-gray-700 mb-2">Telefone <span class="text-red-500">*</span></label>
                            <input type="tel" name="telefone" placeholder="248 8# ## ## ###"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                    </div>
                    <!-- Botões de Navegação -->
                    <div class="flex justify-between">
                        <button type="button"
                            class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition font-medium prev-step"
                            data-prev="step1">
                            <i class="fas fa-arrow-left mr-2"></i> Voltar
                        </button>
                        <button type="button"
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium next-step"
                            data-next="step3">
                            Próximo <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Etapa 3: Pagamento -->
            {{-- <div id="step3" class="step-content hidden">
                <h2 class="text-xl font-semibold mb-6 flex items-center">
                    <i class="fas fa-credit-card mr-2 text-blue-500"></i>
                    Pagamento
                </h2>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <div class="bg-gray-50 p-4 rounded-lg mb-6">
                            <h3 class="font-semibold mb-4">Método de pagamento</h3>

                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input id="credit-card" name="payment" type="radio" checked
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                    <label for="credit-card" class="ml-3 block text-sm font-medium text-gray-700">
                                        Cartão de Crédito
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="debit-card" name="payment" type="radio"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                    <label for="debit-card" class="ml-3 block text-sm font-medium text-gray-700">
                                        Cartão de Débito
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="paypal" name="payment" type="radio"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                    <label for="paypal" class="ml-3 block text-sm font-medium text-gray-700">
                                        PayPal
                                    </label>
                                </div>
                            </div>

                            <!-- Formulário de Cartão de Crédito -->
                            <div id="credit-card-form" class="mt-6">
                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Número do cartão</label>
                                    <input type="text" placeholder="1234 5678 9012 3456"
                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <div class="grid md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block text-gray-700 mb-2">Validade</label>
                                        <input type="text" placeholder="MM/AA"
                                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 mb-2">CVV</label>
                                        <input type="text" placeholder="123"
                                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 mb-2">Nome no cartão</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Botões de Navegação -->
                        <div class="flex justify-between">
                            <button type="button"
                                class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition font-medium prev-step"
                                data-prev="step2">
                                <i class="fas fa-arrow-left mr-2"></i> Voltar
                            </button>
                            <button type="button"
                                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium next-step"
                                data-next="step4">
                                Próximo <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="md:col-span-1">
                        <div class="bg-blue-50 p-4 rounded-lg sticky top-4">
                            <h3 class="font-semibold mb-4 text-lg">Resumo da reserva</h3>

                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Viagem:</span>
                                    <span class="font-medium">Lisboa → Porto</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Data:</span>
                                    <span class="font-medium">15 Jun 2023</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Horário:</span>
                                    <span class="font-medium">14:00 - 17:30</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Assento:</span>
                                    <span class="font-medium" id="selected-seat-summary">-</span>
                                </div>
                                <div class="border-t border-gray-200 pt-2 mt-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Subtotal:</span>
                                        <span class="font-medium">€25,00</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Taxas:</span>
                                        <span class="font-medium">€1,50</span>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 pt-2 mt-2">
                                    <div class="flex justify-between font-bold">
                                        <span>Total:</span>
                                        <span>€26,50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Etapa 4: Confirmação -->
            <div id="step3" class="step-content hidden">
                <div class="text-center py-8">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-check text-green-600 text-3xl"></i>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Confirme o bilhete!</h2>
                    <p class="text-gray-600 mb-6 max-w-lg mx-auto">
                        Confirme o bilhete para a viagem de {{ $rota->origem }} a {{ $rota->destino }} para amanhã.
                        Enviaremos os detalhes para o seu e-mail, caso tenha.
                    </p>

                    <div class="bg-white border border-gray-200 rounded-lg p-6 max-w-lg mx-auto mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h3 class="font-bold text-lg">Código ddo bilhete</h3>
                                <p class="text-gray-500">Apresente este código no embargue</p>
                            </div>
                            <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-lg font-bold text-xl">
                                XL9P2M
                            </div>
                        </div>

                        <div class="space-y-3 text-left">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Viagem:</span>
                                <span class="font-medium">{{ $rota->origem }} → {{ $rota->destino }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Data:</span>
                                <span class="font-medium">{{ now()->days()->tomorrow()->format("d/m/Y") }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Horário:</span>
                                <span class="font-medium">{{ $rota->partida }} - {{ $rota->chegada }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Assento:</span>
                                <span class="font-medium" id="confirmed-seat">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Passageiro:</span>
                                <span class="font-medium" id="confirmed-passenger">-</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center gap-4">
                        <a href="{{ route('viagens') }}"
                            class="px-6 py-2 bg-red-600 rounded-md hover:bg-red-700 text-white transition font-medium">
                            <i class="fas fa-close mr-2"></i> Cancelar
                    </a>
                        <button type="submit"
                            class="px-6 py-2 bg-blue-400 border border-blue-300 text-white rounded-md hover:bg-blue-500 transition font-medium">
                            <i class="fas fa-check mr-2"></i> Confirmar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variáveis globais para armazenar dados da reserva
            let selectedSeat = null;
            let passengerData = {};

            // Controle das etapas
            const steps = document.querySelectorAll('.step-content');
            const progressItems = document.querySelectorAll('ol li');


            // Navegação entre etapas
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function() {
                    const nextStepId = this.getAttribute('data-next');
                    navigateToStep(nextStepId);
                });
            });

            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function() {
                    const prevStepId = this.getAttribute('data-prev');
                    navigateToStep(prevStepId);
                });
            });

            function navigateToStep(stepId) {
                // Esconde todas as etapas
                steps.forEach(step => step.classList.add('hidden'));

                // Mostra a etapa atual
                document.getElementById(stepId).classList.remove('hidden');

                // Atualiza a barra de progresso
                const stepNumber = parseInt(stepId.replace('step', ''));
                progressItems.forEach((item, index) => {
                    if (index < stepNumber) {
                        item.querySelector('div').classList.remove('bg-gray-100');
                        item.querySelector('div').classList.add('bg-blue-600');
                        item.querySelector('span').classList.remove('text-gray-500');
                        item.querySelector('span').classList.add('text-gray-900');
                    } else if (index === stepNumber) {
                        item.querySelector('div').classList.remove('bg-gray-100');
                        item.querySelector('div').classList.add('bg-blue-600');
                        item.querySelector('span').classList.remove('text-gray-500');
                        item.querySelector('span').classList.add('text-gray-900');
                    } else {
                        item.querySelector('div').classList.remove('bg-blue-600');
                        item.querySelector('div').classList.add('bg-gray-100');
                        item.querySelector('span').classList.remove('text-gray-900');
                        item.querySelector('span').classList.add('text-gray-500');
                    }
                });

                document.getElementById("confirmed-seat").innerText = document.getElementById("acento").innerText;
                // Na última etapa, preenche os dados de confirmação
                if (stepId === 'step3') {
                    const passengerName = document.querySelector('#step2 input[type="text"]').value;
                    document.getElementById('confirmed-passenger').textContent = passengerName || '-';
                }
            }

            // Inicializa na primeira etapa
            navigateToStep('step1');
        });
    </script>

    <style>
        .step-content {
            transition: all 0.3s ease;
        }

        .seat {
            transition: all 0.2s ease;
        }
    </style>
@endsection
