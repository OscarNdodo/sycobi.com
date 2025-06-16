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
                <button id="novoBilhete" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Novo Bilhete
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
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Aplicar</button>
                    <button type="reset"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">Limpar</button>
                </div>
            </form>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500">Total Bilhetes</p>
                        <p class="text-3xl font-bold mt-2">
                            {{ $bilhetes->count() > 9 ? $bilhetes->count() : '0' . $bilhetes->count() }}</p>
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
                        <p class="text-3xl font-bold mt-2">{{ $confirmados > 9 ? $confirmados : '0' . $confirmados }}</p>
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
                        <p class="text-3xl font-bold mt-2">{{ $pendentes > 9 ? $pendentes : '0' . $pendentes }}</p>
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
                        <p class="text-3xl font-bold mt-2">{{ $cancelados > 9 ? $cancelados : '0' . $cancelados }}</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full text-red-600">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
            </div>
        </div>


            <!-- Filtros -->
            <div class="bg-white rounded-lg shadow p-4 mb-6">
                <form method="GET" action="{{ route('admin.bilhete.filtrar') }}"
                    class="grid grid-cols-1 md:grid-cols-4 gap-x-10 gap-4">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Código</label>
                        <input type="text" name="codigo" class="w-full px-3 py-2 border rounded-md" placeholder="ex. SCB27424729" />
                    </div>
                    


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                        <input type="text" name="nome" class="w-full px-3 py-2 border rounded-md" placeholder="ex. Joe Doe" />
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Rota</label>
                        <select name="rota" class="w-full px-3 py-2 border rounded-md">
                            <option value="">Selecione a rota</option>
                            @foreach ($rotas as $item)
                                <option value="{{ $item->id }}">{{ $item->origem . " - " . $item->destino }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="flex items-end space-x-2">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Filtrar</button>
                        
                    </div>
                </form>
            </div>

        <!-- Lista de Reservas -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b flex justify-between items-center">
                <h2 class="text-lg font-semibold">Todas as reservas de Bilhetes</h2>
                <div class="text-sm text-gray-500">Encontrados
                    {{ $bilhetes->count() > 9 ? $bilhetes->count() : '0' . $bilhetes->count() }} resultados</div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Código</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Passageiro</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Viagem</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Data/Hora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Assento</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">


                        @forelse ($bilhetes as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-mono">{{ $item->codigo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->nome }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->rota->origem }} →
                                    {{ $item->rota->destino }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->created_at->days()->tomorrow()->format('d/m/Y') }} {{ $item->rota->partida }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->acento > 9 ? $item->acento : '0' . $item->acento }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ number_format($item->rota->preco, 2, '.') }} MT
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($item->status)
                                        @case('Pendente')
                                            <span
                                                class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">{{ $item->status }}</span>
                                        @break

                                        @case('Confirmado')
                                            <span
                                                class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">{{ $item->status }}</span>
                                        @break

                                        @default
                                            <span
                                                class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">{{ $item->status }}</span>
                                    @endswitch
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-5">
                                        @if ($item->status === 'Pendente')
                                            <a href="{{ route('admin.bilhetes.confirmar', $item->id) }}"
                                                class="text-blue-600 hover:text-blue-800" title="Confirmar">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        @endif
                                        <button class="text-gray-600 hover:text-gray-800" title="Reenviar">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="text-gray-600 hover:text-gray-800" title="Reenviar">
                                            <i class="fas fa-download"></i>
                                        </button>

                                        @if ($item->status === 'Pendente')
                                            <a href="{{ route('admin.bilhetes.cancelar', $item->id) }}"
                                                class="text-red-600 hover:text-red-800" title="Cancelar">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end text-gray-600 space-x-2">
                                        Nenhum resultado encontrado!
                                    </div>
                                </td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="px-6 py-4 border-t flex items-center justify-between">
                    {{ $bilhetes->links() }}
                </div>
            </div>


            {{-- Modal adicinar bilhete --}}
            <div id="modaBilhete" class="hidden w-dvw h-dvh bg-black/20 fixed top-0 left-0 items-center justify-center z-50 backdrop-blur-md">
                <div class=" bg-white rounded-lg shadow-lg py-14 px-8">
                    <h2 class="text-xl uppercase font-semibold mb-6 flex items-center">
                        Novo Bilhete
                    </h2>

                    <hr class="border-2 mb-5">
    
                    <form method="POST" action="{{ route('admin.bilhete.novo') }}">
                        @csrf
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
    
                        <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="mb-6">
                                <label class="block text-gray-700 mb-2">Telefone <span class="text-red-500">*</span></label>
                                <input type="tel" name="telefone" placeholder="248 8# ## ## ###"
                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 mb-2">Rota <span class="text-red-500">*</span></label>
                                <select name="id"
                                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    >
                                    <option value="">Selecione uma opção</option>
                                    @foreach ($rotas as $item)
                                        <option value="{{ $item->id }}">{{ $item->origem . " - " . $item->destino }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                        </div>
                        <!-- Botões de Navegação -->
                        <div class="flex justify-between">
                            <button type="button" id="cancelarBilhete"
                                class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition font-medium">
                                <i class="fas fa-arrow-left mr-2"></i> Voltar
                            </button>
                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium next-step"
                                data-next="step3">
                                Criar agora
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </main>

        <script>
            document.getElementById("novoBilhete").addEventListener("click", () => {
                document.getElementById("modaBilhete").style.display = "flex";
            });
            document.getElementById("cancelarBilhete").addEventListener("click", () => {
                document.getElementById("modaBilhete").style.display = "none";
            });
            // Toggle filters panel
            document.querySelector('button:has(.fa-filter)').addEventListener('click', function() {
                document.getElementById('filtersPanel').classList.toggle('hidden');
            });
        </script>
    @endsection
