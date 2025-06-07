
@extends('admin.index')

@section('main')
<main class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Reservas Hoje</p>
                    <p class="text-3xl font-bold mt-2">24</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                    <i class="fas fa-ticket-alt"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 12% desde ontem</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Receita Hoje</p>
                    <p class="text-3xl font-bold mt-2">€620</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full text-green-600">
                    <i class="fas fa-euro-sign"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> 8% desde ontem</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Viagens Hoje</p>
                    <p class="text-3xl font-bold mt-2">5</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full text-orange-600">
                    <i class="fas fa-bus"></i>
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-2"><i class="fas fa-equals mr-1"></i> Igual a ontem</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Ocupação Média</p>
                    <p class="text-3xl font-bold mt-2">78%</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                    <i class="fas fa-percentage"></i>
                </div>
            </div>
            <p class="text-sm text-red-500 mt-2"><i class="fas fa-arrow-down mr-1"></i> 5% desde ontem</p>
        </div>
    </div>
    
    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Reservas nos últimos 7 dias</h2>
                <select class="border rounded px-3 py-1 text-sm">
                    <option>Últimos 7 dias</option>
                    <option>Últimos 30 dias</option>
                    <option>Este mês</option>
                </select>
            </div>
            <!-- Placeholder for Chart -->
            <div class="bg-gray-100 h-64 rounded flex items-center justify-center text-gray-400">
                <i class="fas fa-chart-bar text-4xl"></i>
                <span class="ml-2">Gráfico de Reservas</span>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Viagens em destaque</h2>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="bg-blue-100 p-2 rounded mr-3">
                        <i class="fas fa-bus text-blue-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">Lisboa → Porto</p>
                        <p class="text-sm text-gray-500">14:00 - 17:30 (92% ocupado)</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="bg-green-100 p-2 rounded mr-3">
                        <i class="fas fa-bus text-green-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">Porto → Lisboa</p>
                        <p class="text-sm text-gray-500">09:00 - 12:15 (85% ocupado)</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="bg-yellow-100 p-2 rounded mr-3">
                        <i class="fas fa-bus text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">Lisboa → Faro</p>
                        <p class="text-sm text-gray-500">16:30 - 20:45 (76% ocupado)</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="bg-red-100 p-2 rounded mr-3">
                        <i class="fas fa-bus text-red-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">Faro → Lisboa</p>
                        <p class="text-sm text-gray-500">07:00 - 11:15 (65% ocupado)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Bookings -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold">Últimas Reservas</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Passageiro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Viagem</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-9A2B4C</td>
                        <td class="px-6 py-4 whitespace-nowrap">João Silva</td>
                        <td class="px-6 py-4 whitespace-nowrap">Lisboa → Porto</td>
                        <td class="px-6 py-4 whitespace-nowrap">15/06/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap">€25,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Confirmado</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-7X8Y9Z</td>
                        <td class="px-6 py-4 whitespace-nowrap">Maria Santos</td>
                        <td class="px-6 py-4 whitespace-nowrap">Porto → Lisboa</td>
                        <td class="px-6 py-4 whitespace-nowrap">16/06/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap">€22,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Confirmado</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-5R6T7U</td>
                        <td class="px-6 py-4 whitespace-nowrap">Carlos Oliveira</td>
                        <td class="px-6 py-4 whitespace-nowrap">Lisboa → Faro</td>
                        <td class="px-6 py-4 whitespace-nowrap">17/06/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap">€35,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Pendente</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-mono">VF-3V4W5X</td>
                        <td class="px-6 py-4 whitespace-nowrap">Ana Pereira</td>
                        <td class="px-6 py-4 whitespace-nowrap">Faro → Lisboa</td>
                        <td class="px-6 py-4 whitespace-nowrap">18/06/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap">€35,00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Cancelado</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t text-right">
            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Ver todas as reservas →</a>
        </div>
    </div>
</main>


    
@endsection