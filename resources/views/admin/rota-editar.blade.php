@extends('admin.index')

@section('main')
    <!-- Main Content -->
    <div class="flex-1  ">


        <!-- Content -->
        <main class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Gestão de Rotas</h1>
                <button id="addRoute"
                    class="px-10 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Nova Rota
                </button>
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
                        <button type="submit"
                            class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Filtrar</button>
                        <button type="reset"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">Limpar</button>
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
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Origem</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Destino</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Partida</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Chegada</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Preço</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @forelse ($rotas as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->origem }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->destino }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->partida }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->chegada }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($item->preco, 2, '.') }} MT
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Ativa</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="/admin/rotas/1/editar"
                                                class="text-lg text-blue-600 hover:text-blue-800" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if ($item->status)
                                                <a href="{{ route('admin.rotas.status', $item->id) }}"
                                                    class="text-red-600 hover:text-red-800 text-xl" title="Desativar">
                                                    <i class="fas fa-toggle-off"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.rotas.status', $item->id) }}"
                                                    class="text-blue-600 hover:text-blue-800 text-xl" title="Activar">
                                                    <i class="fas fa-toggle-on"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <div>
                                        <span>Nenhuma rota disponivel!</span>
                                    </div>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>



            </div>
        </main>
    </div>


    {{-- Modal --}}
    <div id="modal"
        class="w-screen h-screen fixed top-0 left-0 flex flex-col items-center justify-center bg-black/10 backdrop-blur z-50">
        <div class="bg-white py-2 pt-8 px-5 w-2/6 rounded-lg shadow-lg">
            <h2 class="uppercase text-xl font-black">Editar rota</h2>

            <hr class="text-blue-500 mt-3">

            <form action="{{ route('admin.rotas.editar', $rota->id) }}" method="POST" class="flex flex-col py-6">
                @csrf

                <div class="w-full grid grid-cols-2 gap-5">

                    <div class="w-full flex flex-col my-2">
                        <label for="origem" class="text-sm">Origem</label>
                        <input type="text" name="origem" required value="{{ $rota->origem }}"
                            class="bg-white border w-full p-2 active:border-blue-500 rounded" placeholder="ex. Nampula">
                    </div>

                    <div class="w-full flex flex-col my-2">
                        <label for="destino" class="text-sm">Destino</label>
                        <input type="text" name="destino" required value="{{ $rota->destino }}"
                            class="bg-white border w-full p-2 active:border-blue-500 rounded" placeholder="ex. Pemba">
                    </div>

                </div>

                <div class="w-full grid grid-cols-2 gap-5">


                    <div class="w-full flex flex-col my-2">
                        <label for="partida" class="text-sm">Partida</label>
                        <input type="time" name="partida" required value="{{ $rota->partida }}"
                            class="bg-white border w-full p-2 active:border-blue-500 rounded" placeholder="ex. Nampula">
                    </div>

                    <div class="w-full flex flex-col my-2">
                        <label for="chegada" class="text-sm">Chegada</label>
                        <input type="time" name="chegada" required value="{{ $rota->chegada }}"
                            class="bg-white border w-full p-2 active:border-blue-500 rounded" placeholder="ex. Nampula">
                    </div>
                </div>

                <div class="w-full flex flex-col my-2">
                    <label for="acentos" class="text-sm">Acentos</label>
                    <input type="number" name="acentos" required value="{{ $rota->acentos }}"
                        class="bg-white border w-full p-2 active:border-blue-500 rounded" placeholder="ex. 60">
                </div>

                <div class="w-full flex flex-col my-2">
                    <label for="preco" class="text-sm">Preço</label>
                    <input type="text" name="preco" required value="{{ $rota->preco }}"
                        class="bg-white border w-full p-2 active:border-blue-500 rounded" placeholder="ex. 1800">
                </div>

                <div class="w-full mt-10 flex items-center justify-between">
                    <a href="{{ route('admin.rotas') }}"
                        class="bg-red-600 text-white py-2 w-full text-center mr-2 rounded shadow hover:opacity-80 active:scale-95">Cancelar</a>
                    <button type="submit"
                        class="bg-blue-600 text-white py-2 w-full text-center ml-2 rounded shadow hover:opacity-80 active:scale-95">Concluido</button>
                </div>
            </form>
        </div>
    </div>
@endsection
