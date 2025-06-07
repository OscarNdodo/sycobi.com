@extends('index')

@section('main')
<!-- Conteúdo Principal -->
<main class="container mx-auto px-4 py-8">
    <!-- Progresso das Etapas -->
    <div class="mb-8">
        <ol class="flex items-center w-full">
            <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:inline-block">
                <div class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <span class="text-white font-medium">1</span>
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 md:text-base">Seleção</span>
            </li>
            <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:inline-block">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <span class="text-gray-600 font-medium">2</span>
                </div>
                <span class="ml-3 text-sm font-medium text-gray-500 md:text-base">Passageiro</span>
            </li>
            <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:inline-block">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <span class="text-gray-600 font-medium">3</span>
                </div>
                <span class="ml-3 text-sm font-medium text-gray-500 md:text-base">Pagamento</span>
            </li>
            <li class="flex items-center">
                <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 shrink-0">
                    <span class="text-gray-600 font-medium">4</span>
                </div>
                <span class="ml-3 text-sm font-medium text-gray-500 md:text-base">Confirmação</span>
            </li>
        </ol>
    </div>

    <!-- Cabeçalho da Reserva -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Lisboa → Porto</h1>
                <div class="flex items-center mt-2 text-gray-600">
                    <i class="far fa-calendar-alt mr-2"></i>
                    <span>15 Junho 2023</span>
                    <i class="far fa-clock ml-4 mr-2"></i>
                    <span>14:00 - 17:30 (3h30m)</span>
                </div>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="text-xl font-bold text-blue-600">€25,00</span>
                <span class="block text-sm text-gray-500">por passageiro</span>
            </div>
        </div>
    </div>

    <!-- Formulário em Etapas -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Etapa 1: Seleção de Assentos (Ativa por padrão) -->
        <div id="step1" class="step-content active">
            <h2 class="text-xl font-semibold mb-6 flex items-center">
                <i class="fas fa-couch mr-2 text-blue-500"></i>
                Selecione seu assento
            </h2>
            
            <!-- Mapa de Assentos -->
            <div class="border rounded-lg p-4 mb-6">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-200 rounded-lg">
                        <i class="fas fa-steering-wheel text-gray-600"></i>
                    </div>
                </div>
                
                <div class="grid grid-cols-4 gap-4">
                    <!-- Fileira 1 -->
                    <div class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer hover:bg-blue-100" data-seat="A1">A1</div>
                    <div class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer hover:bg-blue-100" data-seat="A2">A2</div>
                    <div class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer hover:bg-blue-100" data-seat="A3">A3</div>
                    <div class="seat bg-red-400 w-12 h-12 flex items-center justify-center rounded cursor-not-allowed" data-seat="A4">A4</div>
                    
                    <!-- Fileira 2 -->
                    <div class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer hover:bg-blue-100" data-seat="B1">B1</div>
                    <div class="seat bg-red-400 w-12 h-12 flex items-center justify-center rounded cursor-not-allowed" data-seat="B2">B2</div>
                    <div class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer hover:bg-blue-100" data-seat="B3">B3</div>
                    <div class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer hover:bg-blue-100" data-seat="B4">B4</div>
                    
                    <!-- Fileira 3 -->
                    <div class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer hover:bg-blue-100" data-seat="C1">C1</div>
                    <div class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer hover:bg-blue-100" data-seat="C2">C2</div>
                    <div class="seat bg-red-400 w-12 h-12 flex items-center justify-center rounded cursor-not-allowed" data-seat="C3">C3</div>
                    <div class="seat bg-gray-100 w-12 h-12 flex items-center justify-center rounded cursor-pointer hover:bg-blue-100" data-seat="C4">C4</div>
                </div>
            </div>
            
            <!-- Legenda -->
            <div class="flex flex-wrap gap-4 text-sm mb-6">
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-gray-100 rounded mr-2"></div>
                    <span>Disponível</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-blue-500 rounded mr-2"></div>
                    <span>Selecionado</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-red-400 rounded mr-2"></div>
                    <span>Ocupado</span>
                </div>
            </div>
            
            <!-- Botões de Navegação -->
            <div class="flex justify-end">
                <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium next-step" data-next="step2">
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
            
            <form>
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Nome completo</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 mb-2">E-mail</label>
                        <input type="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Telefone</label>
                        <input type="tel" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 mb-2">Número de documento</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Observações especiais</label>
                    <textarea class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3"></textarea>
                </div>
                
                <!-- Botões de Navegação -->
                <div class="flex justify-between">
                    <button type="button" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition font-medium prev-step" data-prev="step1">
                        <i class="fas fa-arrow-left mr-2"></i> Voltar
                    </button>
                    <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium next-step" data-next="step3">
                        Próximo <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Etapa 3: Pagamento -->
        <div id="step3" class="step-content hidden">
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
                                <input id="credit-card" name="payment" type="radio" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                <label for="credit-card" class="ml-3 block text-sm font-medium text-gray-700">
                                    Cartão de Crédito
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="debit-card" name="payment" type="radio" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                <label for="debit-card" class="ml-3 block text-sm font-medium text-gray-700">
                                    Cartão de Débito
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="paypal" name="payment" type="radio" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                <label for="paypal" class="ml-3 block text-sm font-medium text-gray-700">
                                    PayPal
                                </label>
                            </div>
                        </div>
                        
                        <!-- Formulário de Cartão de Crédito -->
                        <div id="credit-card-form" class="mt-6">
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2">Número do cartão</label>
                                <input type="text" placeholder="1234 5678 9012 3456" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-gray-700 mb-2">Validade</label>
                                    <input type="text" placeholder="MM/AA" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 mb-2">CVV</label>
                                    <input type="text" placeholder="123" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-gray-700 mb-2">Nome no cartão</label>
                                <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botões de Navegação -->
                    <div class="flex justify-between">
                        <button type="button" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition font-medium prev-step" data-prev="step2">
                            <i class="fas fa-arrow-left mr-2"></i> Voltar
                        </button>
                        <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium next-step" data-next="step4">
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
        </div>

        <!-- Etapa 4: Confirmação -->
        <div id="step4" class="step-content hidden">
            <div class="text-center py-8">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check text-green-600 text-3xl"></i>
                </div>
                
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Reserva confirmada!</h2>
                <p class="text-gray-600 mb-6 max-w-lg mx-auto">
                    Sua reserva para a viagem de Lisboa ao Porto no dia 15 de Junho foi confirmada com sucesso. 
                    Enviamos os detalhes para o seu e-mail.
                </p>
                
                <div class="bg-white border border-gray-200 rounded-lg p-6 max-w-lg mx-auto mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="font-bold text-lg">Código da reserva</h3>
                            <p class="text-gray-500">Apresente este código ao motorista</p>
                        </div>
                        <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-lg font-bold text-xl">
                            XL9P2M
                        </div>
                    </div>
                    
                    <div class="space-y-3 text-left">
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
                            <span class="font-medium" id="confirmed-seat">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Passageiro:</span>
                            <span class="font-medium" id="confirmed-passenger">-</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-center gap-4">
                    <button class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium">
                        <i class="fas fa-print mr-2"></i> Imprimir
                    </button>
                    <button class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition font-medium">
                        <i class="fas fa-envelope mr-2"></i> Reenviar e-mail
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Variáveis globais para armazenar dados da reserva
    let selectedSeat = null;
    let passengerData = {};
    
    // Controle das etapas
    const steps = document.querySelectorAll('.step-content');
    const progressItems = document.querySelectorAll('ol li');
    
    // Seleção de assentos
    const seats = document.querySelectorAll('.seat:not(.bg-gray-400)');
    seats.forEach(seat => {
        seat.addEventListener('click', function() {
            // Remove seleção anterior
            seats.forEach(s => s.classList.remove('bg-blue-500', 'text-white'));
            
            // Seleciona novo assento
            this.classList.add('bg-blue-600', 'text-white');
            selectedSeat = this.getAttribute('data-seat');
            
            // Atualiza resumo
            document.getElementById('selected-seat-summary').textContent = selectedSeat;
        });
    });
    
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
        
        // Na última etapa, preenche os dados de confirmação
        if (stepId === 'step4') {
            document.getElementById('confirmed-seat').textContent = selectedSeat || '-';
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