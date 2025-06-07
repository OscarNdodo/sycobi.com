@extends('admin.index')

@section('main')
  <!-- Main Content -->
<main class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Reservas do Passageiro</h1>
            <div class="flex items-center mt-2">
                <img src="https://via.placeholder.com/40" alt="User" class="rounded-full mr-3">
                <div>
                    <p class="font-medium">João Silva</p>
                    <p class="text-sm text-gray-600">ID: PSG-12345 | joao@example.com</p>
                </div>
            </div>
        </div>
        <div class="flex space-x-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition flex items-center">
                <i class="fas fa-envelope mr-2"></i>
                Enviar Mensagem
            </button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Voltar
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Total de Reservas</p>
                    <p class="text-3xl font-bold mt-2">12</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                    <i class="fas fa-ticket-alt"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Viagens Concluídas</p>
                    <p class="text-3xl font-bold mt-2">8</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full text-green-600">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Próximas Viagens</p>
                    <p class="text-3xl font-bold mt-2">3</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full text-yellow-600">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Total Gasto</p>
                    <p class="text-3xl font-bold mt-2">€342</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                    <i class="fas fa-euro-sign"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de Reservas -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold">Histórico Completo de Reservas</h2>
            <div class="flex space-x-3">
                <select class="border rounded-md px-3 py-1 text-sm">
                    <option>Últimos 3 meses</option>
                    <option>Este ano</option>
                    <option>Todo o histórico</option>
                </select>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Viagem</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assento</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-9A2B4C</td>
                        <td class="px-6 py-4 whitespace-nowrap">Lisboa → Porto</td>
                        <td class="px-6 py-4 whitespace-nowrap">15/06/2023 14:00</td>
                        <td class="px-6 py-4 whitespace-nowrap">B3</td>
                        <td class="px-6 py-4 whitespace-nowrap">€25,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Confirmada</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-600 hover:text-blue-800" title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-gray-600 hover:text-gray-800" title="Reenviar">
                                    <i class="fas fa-envelope"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800" title="Cancelar">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-7X8Y9Z</td>
                        <td class="px-6 py-4 whitespace-nowrap">Porto → Lisboa</td>
                        <td class="px-6 py-4 whitespace-nowrap">16/06/2023 09:00</td>
                        <td class="px-6 py-4 whitespace-nowrap">A1</td>
                        <td class="px-6 py-4 whitespace-nowrap">€22,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Confirmada</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-600 hover:text-blue-800" title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-gray-600 hover:text-gray-800" title="Reenviar">
                                    <i class="fas fa-envelope"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800" title="Cancelar">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-5R6T7U</td>
                        <td class="px-6 py-4 whitespace-nowrap">Lisboa → Faro</td>
                        <td class="px-6 py-4 whitespace-nowrap">10/05/2023 16:30</td>
                        <td class="px-6 py-4 whitespace-nowrap">C2</td>
                        <td class="px-6 py-4 whitespace-nowrap">€35,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Concluída</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-600 hover:text-blue-800" title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-gray-600 hover:text-gray-800" title="Recibo">
                                    <i class="fas fa-file-invoice"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Paginação -->
        <div class="px-6 py-4 border-t flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Mostrando <span class="font-medium">1</span> a <span class="font-medium">3</span> de <span class="font-medium">12</span> reservas
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-3 py-1 border rounded-md bg-blue-600 text-white">1</button>
                <button class="px-3 py-1 border rounded-md text-gray-700 hover:bg-gray-50">2</button>
                <button class="px-3 py-1 border rounded-md text-gray-700 hover:bg-gray-50">3</button>
                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Informações Adicionais -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold flex items-center">
                    <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                    Informações do Passageiro
                </h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Nome Completo</p>
                        <p class="font-medium">João Miguel Silva</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Data de Nascimento</p>
                        <p class="font-medium">15/06/1985</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Documento</p>
                        <p class="font-medium">CC 12345678</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Telefone</p>
                        <p class="font-medium">+351 912 345 678</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-sm text-gray-500">Endereço</p>
                        <p class="font-medium">Rua das Flores, 123, Lisboa</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold flex items-center">
                    <i class="fas fa-chart-line text-blue-600 mr-2"></i>
                    Estatísticas de Viagem
                </h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-500">Rota Mais Frequente</p>
                        <p class="font-medium">Lisboa → Porto (5 vezes)</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Última Viagem</p>
                        <p class="font-medium">10/05/2023 - Lisboa → Faro</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Próxima Viagem</p>
                        <p class="font-medium">15/06/2023 - Lisboa → Porto</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Preferência de Assento</p>
                        <p class="font-medium">Corredor (80% das reservas)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Lógica para enviar mensagem ao passageiro
    document.querySelector('button:has(.fa-envelope)').addEventListener('click', function() {
        const message = prompt("Digite a mensagem para o passageiro:");
        if (message) {
            alert(`Mensagem enviada para João Silva:\n\n${message}`);
        }
    });
</script>
@endsection