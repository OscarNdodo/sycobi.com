@extends('index')

@section('main')
    
<!-- Filtros -->
<section class="bg-white py-14 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="bg-blue-50 p-4 rounded-lg">
                <h2 class="text-xl font-semibold mb-4">Filtrar Viagens</h2>
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
                        <label class="block text-sm font-medium text-gray-700 mb-1">Data</label>
                        <input type="date" class="w-full px-3 py-2 border rounded-md">
                    </div>
                    
                    <div class="flex items-end">
                        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Lista de Viagens -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Viagens Disponíveis</h1>
            <div class="text-gray-600">12 viagens encontradas</div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card de Viagem 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold">Lisboa → Porto</h3>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">8 lugares</span>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>14:00 - 17:30 (3h30m)</span>
                        </div>
                        
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Partida: Campo Grande</span>
                        </div>
                        
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>15 Jun 2023</span>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-between items-center">
                        <span class="text-2xl font-bold">€25</span>
                        <a href="/reservar/1" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Reservar</a>
                    </div>
                </div>
            </div>

            <!-- Card de Viagem 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold">Porto → Lisboa</h3>
                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">3 lugares</span>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>09:00 - 12:15 (3h15m)</span>
                        </div>
                        
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Partida: Campanhã</span>
                        </div>
                        
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>16 Jun 2023</span>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-between items-center">
                        <span class="text-2xl font-bold">€22</span>
                        <a href="/viagens/12/reservar" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Reservar</a>
                    </div>
                </div>
            </div>

            <!-- Mais cards de viagem... -->
        </div>

        <!-- Paginação -->
        <div class="mt-8 flex justify-center">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-3 py-1 rounded-md border border-gray-300 text-gray-500 hover:bg-gray-50">&laquo;</a>
                <a href="#" class="px-3 py-1 rounded-md bg-blue-600 text-white">1</a>
                <a href="#" class="px-3 py-1 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">2</a>
                <a href="#" class="px-3 py-1 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">3</a>
                <a href="#" class="px-3 py-1 rounded-md border border-gray-300 text-gray-500 hover:bg-gray-50">&raquo;</a>
            </nav>
        </div>
    </main>
    
    @endsection 