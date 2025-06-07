@extends('admin.index')

@section('main')
<!-- Main Content -->
<main class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Gestão de Vendas</h1>
        <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Nova Venda
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Estatísticas Rápidas -->
        <div class="lg:col-span-1 space-y-4">
            <!-- Card Total de Vendas -->
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total de Vendas</p>
                        <p class="text-2xl font-bold text-gray-800">R$ 48,245</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <i class="fas fa-shopping-cart text-blue-600"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="text-green-600 text-sm font-medium">
                        <i class="fas fa-arrow-up mr-1"></i> 12.5%
                    </span>
                    <span class="text-gray-500 text-sm ml-2">vs último mês</span>
                </div>
            </div>

            <!-- Card Vendas do Mês -->
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Vendas este mês</p>
                        <p class="text-2xl font-bold text-gray-800">R$ 12,840</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <i class="fas fa-calendar-alt text-green-600"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="text-green-600 text-sm font-medium">
                        <i class="fas fa-arrow-up mr-1"></i> 8.3%
                    </span>
                    <span class="text-gray-500 text-sm ml-2">vs mês passado</span>
                </div>
            </div>

            <!-- Card Itens Vendidos -->
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Itens vendidos</p>
                        <p class="text-2xl font-bold text-gray-800">1,248</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <i class="fas fa-boxes text-purple-600"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="text-green-600 text-sm font-medium">
                        <i class="fas fa-arrow-up mr-1"></i> 5.7%
                    </span>
                    <span class="text-gray-500 text-sm ml-2">vs semana passada</span>
                </div>
            </div>

            <!-- Filtros -->
            <div class="bg-white p-4 rounded-lg shadow mt-6">
                <h3 class="font-medium text-gray-800 mb-3">Filtrar Vendas</h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Período</label>
                        <select class="w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option>Hoje</option>
                            <option selected>Esta semana</option>
                            <option>Este mês</option>
                            <option>Este ano</option>
                            <option>Personalizado</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select class="w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option>Todos</option>
                            <option>Concluído</option>
                            <option>Processando</option>
                            <option>Cancelado</option>
                            <option>Reembolsado</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Vendedor</label>
                        <select class="w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option>Todos</option>
                            <option>João Silva</option>
                            <option>Maria Santos</option>
                            <option>Carlos Oliveira</option>
                        </select>
                    </div>
                    <button class="w-full mt-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Aplicar Filtros
                    </button>
                </div>
            </div>
        </div>

        <!-- Lista de Vendas -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-4 border-b flex justify-between items-center">
                    <h2 class="font-semibold text-gray-800">Últimas Vendas</h2>
                    <div class="flex items-center">
                        <input type="text" placeholder="Buscar venda..." class="px-3 py-1 border rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <button class="ml-2 p-2 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Venda 1 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12345</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Ana Paula</div>
                                            <div class="text-sm text-gray-500">ana@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/06/2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">R$ 1,245.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Concluído
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>

                            <!-- Venda 2 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12344</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Carlos Eduardo</div>
                                            <div class="text-sm text-gray-500">carlos@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14/06/2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">R$ 890.50</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Processando
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>

                            <!-- Venda 3 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12343</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Mariana Costa</div>
                                            <div class="text-sm text-gray-500">mariana@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">13/06/2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">R$ 2,340.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Concluído
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>

                            <!-- Venda 4 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12342</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Roberto Almeida</div>
                                            <div class="text-sm text-gray-500">roberto@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12/06/2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">R$ 1,560.75</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Cancelado
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>

                            <!-- Venda 5 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12341</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Fernanda Lima</div>
                                            <div class="text-sm text-gray-500">fernanda@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11/06/2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">R$ 3,210.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Reembolsado
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6">
                    <div class="flex flex-1 justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Anterior
                        </a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Próxima
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Mostrando
                                <span class="font-medium">1</span>
                                a
                                <span class="font-medium">5</span>
                                de
                                <span class="font-medium">24</span>
                                resultados
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Anterior</span>
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    1
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    2
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    3
                                </a>
                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                    ...
                                </span>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    8
                                </a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Próxima</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal Nova Venda (hidden por padrão) -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="newSaleModal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Nova Venda</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Cliente -->
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Cliente</label>
                                <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                    <option>Selecione um cliente</option>
                                    <option>Ana Paula</option>
                                    <option>Carlos Eduardo</option>
                                    <option>Mariana Costa</option>
                                </select>
                            </div>
                            
                            <!-- Data -->
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Data</label>
                                <input type="date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            
                            <!-- Forma de Pagamento -->
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700">Pagamento</label>
                                <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                    <option>Cartão de Crédito</option>
                                    <option>Boleto</option>
                                    <option>PIX</option>
                                    <option>Dinheiro</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Itens da Venda -->
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Itens da Venda</label>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="grid grid-cols-12 gap-2 mb-2 font-medium text-sm text-gray-500">
                                    <div class="col-span-5">Produto</div>
                                    <div class="col-span-2">Preço</div>
                                    <div class="col-span-2">Quantidade</div>
                                    <div class="col-span-2">Total</div>
                                    <div class="col-span-1"></div>
                                </div>
                                
                                <!-- Item 1 -->
                                <div class="grid grid-cols-12 gap-2 mb-3 items-center">
                                    <div class="col-span-5">
                                        <select class="w-full px-2 py-1 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                                            <option>Camiseta Branca</option>
                                            <option>Calça Jeans</option>
                                            <option>Tênis Esportivo</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <input type="text" value="R$ 89,90" class="w-full px-2 py-1 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div class="col-span-2">
                                        <input type="number" value="1" min="1" class="w-full px-2 py-1 border rounded-md text-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div class="col-span-2 text-sm font-medium">
                                        R$ 89,90
                                    </div>
                                    <div class="col-span-1 text-center">
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Botão Adicionar Item -->
                                <button class="mt-2 px-3 py-1 bg-gray-200 text-gray-700 rounded-md text-sm hover:bg-gray-300">
                                    <i class="fas fa-plus mr-1"></i> Adicionar Item
                                </button>
                            </div>
                        </div>
                        
                        <!-- Resumo -->
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="col-span-2"></div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between mb-2">
                                    <span class="text-sm text-gray-600">Subtotal:</span>
                                    <span class="text-sm font-medium">R$ 89,90</span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-sm text-gray-600">Desconto:</span>
                                    <span class="text-sm font-medium">R$ 0,00</span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-sm text-gray-600">Frete:</span>
                                    <span class="text-sm font-medium">R$ 0,00</span>
                                </div>
                                <div class="border-t border-gray-200 pt-2 mt-2">
                                    <div class="flex justify-between">
                                        <span class="text-base font-medium">Total:</span>
                                        <span class="text-base font-bold">R$ 89,90</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Finalizar Venda
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" id="cancelSale">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Abrir modal de nova venda
    document.querySelector('button[class*="bg-blue-600"]').addEventListener('click', function() {
        document.getElementById('newSaleModal').classList.remove('hidden');
    });

    // Fechar modal
    document.getElementById('cancelSale').addEventListener('click', function() {
        document.getElementById('newSaleModal').classList.add('hidden');
    });

    // Fechar modal ao clicar fora
    document.querySelector('.fixed.inset-0').addEventListener('click', function(e) {
        if (e.target === this) {
            document.getElementById('newSaleModal').classList.add('hidden');
        }
    });
</script>
@endsection