@extends('admin.index')

@section('main')
     <!-- Main Content -->
     <div class="flex-1  ">
         

        <!-- Content -->
        <main class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Gestão de Rotas</h1>
                <a href="/admin/rotas/nova" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Nova Rota
                </a>
            </div>

            <!-- Filtros -->
            <div class="bg-white rounded-lg shadow p-4 mb-6">
                <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Origem</label>
                        <select class="w-full px-3 py-2 border rounded-md">
                            <option value="">Todas</option>
                            <option>Lisboa</option>
                            <option>Porto</option>
                            <option>Faro</option>
                            <option>Coimbra</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Destino</label>
                        <select class="w-full px-3 py-2 border rounded-md">
                            <option value="">Todas</option>
                            <option>Lisboa</option>
                            <option>Porto</option>
                            <option>Faro</option>
                            <option>Coimbra</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select class="w-full px-3 py-2 border rounded-md">
                            <option value="">Todos</option>
                            <option>Ativa</option>
                            <option>Inativa</option>
                        </select>
                    </div>
                    
                    <div class="flex items-end space-x-2">
                        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Filtrar</button>
                        <button type="reset" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">Limpar</button>
                    </div>
                </form>
            </div>

            <!-- Lista de Rotas -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6 border-b flex justify-between items-center">
                    <h2 class="text-lg font-semibold">Todas as Rotas</h2>
                    <div class="text-sm text-gray-500">15 rotas encontradas</div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Origem</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destino</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Distância</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duração</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço Base</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Lisboa</td>
                                <td class="px-6 py-4 whitespace-nowrap">Porto</td>
                                <td class="px-6 py-4 whitespace-nowrap">313 km</td>
                                <td class="px-6 py-4 whitespace-nowrap">3h 30m</td>
                                <td class="px-6 py-4 whitespace-nowrap">€25,00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativa</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <a href="/admin/rotas/1/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/admin/rotas/1/horarios" class="text-purple-600 hover:text-purple-800" title="Horários">
                                            <i class="fas fa-clock"></i>
                                        </a>
                                        <button class="text-red-600 hover:text-red-800" title="Desativar">
                                            <i class="fas fa-toggle-on"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Porto</td>
                                <td class="px-6 py-4 whitespace-nowrap">Lisboa</td>
                                <td class="px-6 py-4 whitespace-nowrap">313 km</td>
                                <td class="px-6 py-4 whitespace-nowrap">3h 15m</td>
                                <td class="px-6 py-4 whitespace-nowrap">€22,00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativa</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <a href="/admin/rotas/2/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/admin/rotas/2/horarios" class="text-purple-600 hover:text-purple-800" title="Horários">
                                            <i class="fas fa-clock"></i>
                                        </a>
                                        <button class="text-red-600 hover:text-red-800" title="Desativar">
                                            <i class="fas fa-toggle-on"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Lisboa</td>
                                <td class="px-6 py-4 whitespace-nowrap">Faro</td>
                                <td class="px-6 py-4 whitespace-nowrap">278 km</td>
                                <td class="px-6 py-4 whitespace-nowrap">2h 45m</td>
                                <td class="px-6 py-4 whitespace-nowrap">€35,00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativa</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <a href="/admin/rotas/3/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/admin/rotas/3/horarios" class="text-purple-600 hover:text-purple-800" title="Horários">
                                            <i class="fas fa-clock"></i>
                                        </a>
                                        <button class="text-red-600 hover:text-red-800" title="Desativar">
                                            <i class="fas fa-toggle-on"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Faro</td>
                                <td class="px-6 py-4 whitespace-nowrap">Lisboa</td>
                                <td class="px-6 py-4 whitespace-nowrap">278 km</td>
                                <td class="px-6 py-4 whitespace-nowrap">2h 50m</td>
                                <td class="px-6 py-4 whitespace-nowrap">€35,00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativa</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <a href="/admin/rotas/4/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/admin/rotas/4/horarios" class="text-purple-600 hover:text-purple-800" title="Horários">
                                            <i class="fas fa-clock"></i>
                                        </a>
                                        <button class="text-red-600 hover:text-red-800" title="Desativar">
                                            <i class="fas fa-toggle-on"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Coimbra</td>
                                <td class="px-6 py-4 whitespace-nowrap">Porto</td>
                                <td class="px-6 py-4 whitespace-nowrap">120 km</td>
                                <td class="px-6 py-4 whitespace-nowrap">1h 15m</td>
                                <td class="px-6 py-4 whitespace-nowrap">€15,00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Inativa</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2">
                                        <a href="/admin/rotas/5/editar" class="text-blue-600 hover:text-blue-800" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="/admin/rotas/5/horarios" class="text-purple-600 hover:text-purple-800" title="Horários">
                                            <i class="fas fa-clock"></i>
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
                        Mostrando <span class="font-medium">1</span> a <span class="font-medium">5</span> de <span class="font-medium">15</span> rotas
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