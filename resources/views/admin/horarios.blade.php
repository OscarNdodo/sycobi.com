@extends('admin.index')

@section('main')
    

        <!-- Main Content -->
        <div class="flex-1 ">
            <!-- Topbar -->
           

            <!-- Content -->
            <main class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Gestão de Horários</h1>
                    <a href="/admin/horarios/novo" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Novo Horário
                    </a>
                </div>

                <!-- Filtros -->
                <div class="bg-white rounded-lg shadow p-4 mb-6">
                    <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Rota</label>
                            <select class="w-full px-3 py-2 border rounded-md">
                                <option value="">Todas</option>
                                <option>Lisboa → Porto</option>
                                <option>Porto → Lisboa</option>
                                <option>Lisboa → Faro</option>
                                <option>Faro → Lisboa</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Dia da semana</label>
                            <select class="w-full px-3 py-2 border rounded-md">
                                <option value="">Todos</option>
                                <option>Segunda-feira</option>
                                <option>Terça-feira</option>
                                <option>Quarta-feira</option>
                                <option>Quinta-feira</option>
                                <option>Sexta-feira</option>
                                <option>Sábado</option>
                                <option>Domingo</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select class="w-full px-3 py-2 border rounded-md">
                                <option value="">Todos</option>
                                <option>Ativo</option>
                                <option>Inativo</option>
                            </select>
                        </div>
                        
                        <div class="flex items-end space-x-2">
                            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Filtrar</button>
                            <button type="reset" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">Limpar</button>
                        </div>
                    </form>
                </div>

                <!-- Lista de Horários -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h2 class="text-lg font-semibold">Todos os Horários</h2>
                        <div class="text-sm text-gray-500">12 horários encontrados</div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rota</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dia</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Partida</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chegada</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Lisboa → Porto</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Segunda a Sexta</td>
                                    <td class="px-6 py-4 whitespace-nowrap">14:00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">17:30</td>
                                    <td class="px-6 py-4 whitespace-nowrap">€25,00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativo</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="/admin/horarios/1/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="text-red-600 hover:text-red-800" title="Desativar">
                                                <i class="fas fa-toggle-on"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Porto → Lisboa</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Segunda a Sexta</td>
                                    <td class="px-6 py-4 whitespace-nowrap">09:00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">12:15</td>
                                    <td class="px-6 py-4 whitespace-nowrap">€22,00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativo</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="/admin/horarios/2/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="text-red-600 hover:text-red-800" title="Desativar">
                                                <i class="fas fa-toggle-on"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Lisboa → Faro</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Terça e Quinta</td>
                                    <td class="px-6 py-4 whitespace-nowrap">16:30</td>
                                    <td class="px-6 py-4 whitespace-nowrap">19:15</td>
                                    <td class="px-6 py-4 whitespace-nowrap">€35,00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativo</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="/admin/horarios/3/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="text-red-600 hover:text-red-800" title="Desativar">
                                                <i class="fas fa-toggle-on"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Faro → Lisboa</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Quarta e Sexta</td>
                                    <td class="px-6 py-4 whitespace-nowrap">07:00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">09:45</td>
                                    <td class="px-6 py-4 whitespace-nowrap">€35,00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativo</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="/admin/horarios/4/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="text-red-600 hover:text-red-800" title="Desativar">
                                                <i class="fas fa-toggle-on"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">Lisboa → Porto</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Sábado e Domingo</td>
                                    <td class="px-6 py-4 whitespace-nowrap">10:00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">13:30</td>
                                    <td class="px-6 py-4 whitespace-nowrap">€28,00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Inativo</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="/admin/horarios/5/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="text-green-600 hover:text-green-800" title="Ativar">
                                                <i class="fas fa-toggle-off"></i>
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
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">5</span> de <span class="font-medium">12</span> horários
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
        </div>

@endsection