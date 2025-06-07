@extends('admin.index')

@section('main')
    <!-- Main Content -->
<main class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Gestão de Reservas</h1>
        <div class="flex space-x-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition flex items-center">
                <i class="fas fa-file-export mr-2"></i>
                Exportar
            </button>
            <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition flex items-center">
                <i class="fas fa-filter mr-2"></i>
                Filtros
            </button>
        </div>
    </div>

    <!-- Filtros Avançados (Expandable) -->
    <div class="bg-white rounded-lg shadow p-4 mb-6 hidden" id="filtersPanel">
        <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Código</label>
                <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="VF-XXXXXX">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select class="w-full px-3 py-2 border rounded-md">
                    <option value="">Todos</option>
                    <option>Confirmada</option>
                    <option>Pendente</option>
                    <option>Cancelada</option>
                    <option>Utilizada</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Data</label>
                <input type="date" class="w-full px-3 py-2 border rounded-md">
            </div>
            
            <div class="flex items-end space-x-2">
                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Aplicar</button>
                <button type="reset" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">Limpar</button>
            </div>
        </form>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Total Reservas</p>
                    <p class="text-3xl font-bold mt-2">148</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                    <i class="fas fa-ticket-alt"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Confirmadas</p>
                    <p class="text-3xl font-bold mt-2">112</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full text-green-600">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Pendentes</p>
                    <p class="text-3xl font-bold mt-2">24</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full text-yellow-600">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Canceladas</p>
                    <p class="text-3xl font-bold mt-2">12</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full text-red-600">
                    <i class="fas fa-times-circle"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de Reservas -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold">Todas as Reservas</h2>
            <div class="text-sm text-gray-500">Mostrando 10 de 148 resultados</div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Passageiro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Viagem</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data/Hora</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assento</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-9A2B4C</td>
                        <td class="px-6 py-4 whitespace-nowrap">João Silva</td>
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
                        <td class="px-6 py-4 whitespace-nowrap">Maria Santos</td>
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
                        <td class="px-6 py-4 whitespace-nowrap">Carlos Oliveira</td>
                        <td class="px-6 py-4 whitespace-nowrap">Lisboa → Faro</td>
                        <td class="px-6 py-4 whitespace-nowrap">17/06/2023 16:30</td>
                        <td class="px-6 py-4 whitespace-nowrap">C2</td>
                        <td class="px-6 py-4 whitespace-nowrap">€35,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Pendente</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-600 hover:text-blue-800" title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-800" title="Confirmar">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800" title="Cancelar">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-3V4W5X</td>
                        <td class="px-6 py-4 whitespace-nowrap">Ana Pereira</td>
                        <td class="px-6 py-4 whitespace-nowrap">Faro → Lisboa</td>
                        <td class="px-6 py-4 whitespace-nowrap">18/06/2023 07:00</td>
                        <td class="px-6 py-4 whitespace-nowrap">B4</td>
                        <td class="px-6 py-4 whitespace-nowrap">€35,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Cancelada</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-600 hover:text-blue-800" title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-gray-600 hover:text-gray-800" title="Restaurar">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-1Z2Y3X</td>
                        <td class="px-6 py-4 whitespace-nowrap">Pedro Costa</td>
                        <td class="px-6 py-4 whitespace-nowrap">Lisboa → Porto</td>
                        <td class="px-6 py-4 whitespace-nowrap">19/06/2023 14:00</td>
                        <td class="px-6 py-4 whitespace-nowrap">A2</td>
                        <td class="px-6 py-4 whitespace-nowrap">€25,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Utilizada</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-600 hover:text-blue-800" title="Detalhes">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-gray-600 hover:text-gray-800" title="Comprovante">
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
                Mostrando <span class="font-medium">1</span> a <span class="font-medium">5</span> de <span class="font-medium">148</span> reservas
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
</main>

<script>
    // Toggle filters panel
    document.querySelector('button:has(.fa-filter)').addEventListener('click', function() {
        document.getElementById('filtersPanel').classList.toggle('hidden');
    });
</script>
@endsection