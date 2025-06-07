<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Reserva - ViajaFácil</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="font-sans bg-gray-50">
    <!-- Cabeçalho (não aparece na impressão) -->
    <header class="bg-white shadow-sm sticky top-0 z-50 no-print">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center">
                <i class="fas fa-bus text-blue-600 text-2xl"></i>
                <span class="ml-2 text-xl font-bold text-gray-800">ViajaFácil</span>
            </a>
            <button onclick="window.print()" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                <i class="fas fa-print mr-2"></i>Imprimir Bilhete
            </button>
        </div>
    </header>
     
    <!-- Main Content -->
<main class="p-6 container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Minhas Reservas</h1>
        <div class="flex space-x-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition flex items-center">
                <i class="fas fa-search mr-2"></i>
                Buscar Reserva
            </button>
        </div>
    </div>

    <!-- Aviso Importante -->
    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
            </div>
            <div>
                <p class="text-sm text-blue-700">
                    Chegue com pelo menos 30 minutos de antecedência no local de embarque. Apresente seu bilhete digital ou código de reserva.
                </p>
            </div>
        </div>
    </div>

    <!-- Lista de Reservas -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold">Próximas Viagens</h2>
        </div>
        
        <div class="divide-y divide-gray-200">
            <!-- Reserva 1 -->
            <div class="p-6 hover:bg-gray-50 transition">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center">
                            <span class="font-mono bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm mr-3">VF-9A2B4C</span>
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Confirmada</span>
                        </div>
                        <h3 class="text-xl font-semibold mt-2">Lisboa → Porto</h3>
                        <div class="flex items-center text-gray-600 mt-1">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>15 Junho 2023 - 14:00</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-1">
                            <i class="fas fa-chair mr-2"></i>
                            <span>Assento: B3</span>
                            <i class="fas fa-tag ml-4 mr-2"></i>
                            <span>Valor: €25,00</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:space-x-3 space-y-2 sm:space-y-0">
                        <button class="px-4 py-2 bg-white border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 transition flex items-center justify-center">
                            <i class="fas fa-eye mr-2"></i>
                            Detalhes
                        </button>
                        <button class="px-4 py-2 bg-white border border-green-600 text-green-600 rounded-md hover:bg-green-50 transition flex items-center justify-center">
                            <i class="fas fa-ticket-alt mr-2"></i>
                            Bilhete
                        </button>
                        <button class="px-4 py-2 bg-white border border-red-600 text-red-600 rounded-md hover:bg-red-50 transition flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i>
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Reserva 2 -->
            <div class="p-6 hover:bg-gray-50 transition">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center">
                            <span class="font-mono bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm mr-3">VF-7X8Y9Z</span>
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Confirmada</span>
                        </div>
                        <h3 class="text-xl font-semibold mt-2">Porto → Lisboa</h3>
                        <div class="flex items-center text-gray-600 mt-1">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>16 Junho 2023 - 09:00</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-1">
                            <i class="fas fa-chair mr-2"></i>
                            <span>Assento: A1</span>
                            <i class="fas fa-tag ml-4 mr-2"></i>
                            <span>Valor: €22,00</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:space-x-3 space-y-2 sm:space-y-0">
                        <button class="px-4 py-2 bg-white border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 transition flex items-center justify-center">
                            <i class="fas fa-eye mr-2"></i>
                            Detalhes
                        </button>
                        <button class="px-4 py-2 bg-white border border-green-600 text-green-600 rounded-md hover:bg-green-50 transition flex items-center justify-center">
                            <i class="fas fa-ticket-alt mr-2"></i>
                            Bilhete
                        </button>
                        <button class="px-4 py-2 bg-white border border-red-600 text-red-600 rounded-md hover:bg-red-50 transition flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i>
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Título Histórico -->
            <div class="p-6 border-t border-b bg-gray-50">
                <h2 class="text-lg font-semibold">Histórico de Viagens</h2>
            </div>
            
            <!-- Reserva 3 (Histórico) -->
            <div class="p-6 hover:bg-gray-50 transition">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center">
                            <span class="font-mono bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm mr-3">VF-5R6T7U</span>
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Concluída</span>
                        </div>
                        <h3 class="text-xl font-semibold mt-2">Lisboa → Faro</h3>
                        <div class="flex items-center text-gray-600 mt-1">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>10 Maio 2023 - 16:30</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-1">
                            <i class="fas fa-chair mr-2"></i>
                            <span>Assento: C2</span>
                            <i class="fas fa-tag ml-4 mr-2"></i>
                            <span>Valor: €35,00</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:space-x-3 space-y-2 sm:space-y-0">
                        <button class="px-4 py-2 bg-white border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 transition flex items-center justify-center">
                            <i class="fas fa-eye mr-2"></i>
                            Detalhes
                        </button>
                        <button class="px-4 py-2 bg-white border border-gray-600 text-gray-600 rounded-md hover:bg-gray-50 transition flex items-center justify-center">
                            <i class="fas fa-file-invoice mr-2"></i>
                            Recibo
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Reserva 4 (Histórico) -->
            <div class="p-6 hover:bg-gray-50 transition">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center">
                            <span class="font-mono bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm mr-3">VF-3V4W5X</span>
                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Cancelada</span>
                        </div>
                        <h3 class="text-xl font-semibold mt-2">Faro → Lisboa</h3>
                        <div class="flex items-center text-gray-600 mt-1">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>5 Abril 2023 - 07:00</span>
                        </div>
                        <div class="flex items-center text-gray-600 mt-1">
                            <i class="fas fa-chair mr-2"></i>
                            <span>Assento: B4</span>
                            <i class="fas fa-tag ml-4 mr-2"></i>
                            <span>Valor: €35,00</span>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <button class="px-4 py-2 bg-white border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 transition flex items-center justify-center">
                            <i class="fas fa-eye mr-2"></i>
                            Detalhes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Paginação -->
        <div class="px-6 py-4 border-t flex items-center justify-center">
            <div class="flex space-x-2">
                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-3 py-1 border rounded-md bg-blue-600 text-white">1</button>
                <button class="px-3 py-1 border rounded-md text-gray-700 hover:bg-gray-50">2</button>
                <button class="px-3 py-1 border rounded-md text-gray-500 bg-white hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</main>

<script>
    // Buscar reserva
    document.querySelector('button:has(.fa-search)').addEventListener('click', function() {
        const codigo = prompt("Digite o código da sua reserva:");
        if (codigo) {
            alert(`Buscando reserva ${codigo}...`);
            // Implementar lógica de busca real aqui
        }
    });
</script>
 
</body>
</html>