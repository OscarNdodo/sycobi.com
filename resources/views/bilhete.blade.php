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
    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white;
                font-size: 12pt;
            }

            .ticket {
                box-shadow: none;
                border: 1px solid #ddd;
                page-break-after: always;
            }
        }

        .ticket {
            border-left: 5px solid #3B82F6;
        }
    </style>
</head>

<body class="font-sans bg-gray-50">

    <!-- Conteúdo Principal -->
    <main class="container mx-auto px-4 py-8">
        <!-- Mensagem de Confirmação -->
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-8 text-center no-print">
            <div class="text-green-600 text-5xl mb-4">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="text-2xl font-bold text-green-800 mb-2">Reserva Confirmada!</h1>
            <p class="text-gray-700 mb-4">O seu bilhete foi reservado com sucesso. @if ($bilhete->email)
                    <br>Um e-mail de confirmação foi enviado para <span
                        class="font-semibold">{{ $bilhete->email }}</span>.
                @endif
            </p>
            <p class="text-gray-600">Código da reserva: <span
                    class="font-mono bg-blue-300 font-bold px-2 py-1 rounded">{{ $bilhete->codigo }}</span></p>
        </div>

        <!-- Bilhete Digital -->
        <div class="ticket bg-white rounded-lg shadow-md overflow-hidden max-w-2xl mx-auto mb-8">
            <!-- Cabeçalho do Bilhete -->
            <div class="bg-blue-600 text-white p-4 flex justify-between items-center">
                <div class="flex items-center">
                    <i class="fas fa-bus text-2xl mr-3"></i>
                    <span class="text-xl font-bold">SYCOBI</span>
                </div>
                <div class="text-right">
                    <div class="text-xs">Bilhete Digital</div>
                    <div class="font-mono text-sm">{{ $bilhete->codigo }}</div>
                </div>
            </div>

            <!-- Corpo do Bilhete -->
            <div class="p-6">
                <div class="flex flex-col md:flex-row justify-between mb-6">
                    <div>
                        <div class="text-xs text-gray-500">ORIGEM</div>
                        <div class="text-2xl font-bold">{{ $rota->origem }}</div>
                       
                        <div class="text-gray-600">
                            <i class="far fa-clock mr-1"></i>
                            {{ $rota->partida }}
                        </div>
                        <div class="text-gray-600 mt-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Parque de {{ $rota->origem }}
                        </div>
                    </div>

                    <div class="my-4 md:my-0 flex items-center justify-center">
                        <i class="fas fa-arrow-right text-gray-400 text-2xl mx-4"></i>
                    </div>

                    <div class="text-right">
                        <div class="text-xs text-gray-500">DESTINO</div>
                        <div class="text-2xl font-bold">{{ $rota->destino }}</div>
                       
                        <div class="text-gray-600">
                            <i class="far fa-clock mr-1"></i>
                            {{ $rota->chegada }}
                        </div>
                        <div class="text-gray-600 mt-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Parque de {{ $rota->destino }}
                        </div>
                    </div>
                </div>

                <div class="border-t border-b border-gray-200 py-4 my-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-xs text-gray-500">PASSAGEIRO</div>
                            <div class="font-semibold">{{ $bilhete->nome }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">DOCUMENTO</div>
                            <div class="font-semibold">
                                @if ($bilhete->tipo_doc)
                                    @switch($bilhete->tipo_doc)
                                        @case('bi')
                                            Bilhete de identidade
                                        @break

                                        @case('c')
                                            Cartao de recenceamento
                                        @break

                                        @case('cd')
                                            Carta de conducao
                                        @break

                                        @case('pp')
                                            Passaporte
                                        @break

                                        @default
                                            Desconhecido
                                    @endswitch
                                @else
                                    Nenhum docuemento
                                @endif
                            </div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">ASSENTO</div>
                            <div class="font-semibold">{{ $bilhete->acento > 9 ? $bilhete->acento : "0".$bilhete->acento }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">VALOR</div>
                            <div class="font-semibold">{{ number_format($rota->preco, 2, '.') }} MT</div>
                        </div>
                    </div>
                </div>

                <!-- Código QR -->
                <div class="flex flex-col items-center mt-6">
                    <div class="bg-gray-100 p-2 rounded">
                        <!-- Placeholder para QR Code - substitua por um gerador real -->
                        <div
                            class="w-32 h-32 bg-white border border-gray-300 flex items-center justify-center text-gray-400">
                            <i class="fas fa-qrcode text-4xl"></i>
                        </div>
                    </div>
                    <div class="text-xs text-gray-500 mt-2">Código de embarque</div>
                </div>
            </div>

            <!-- Rodapé do Bilhete -->
            <div class="bg-gray-50 p-4 text-center text-sm text-gray-600">
                <p>Apresente este bilhete no embarque. Chegue com 30min de antecedência.</p>
                <p class="mt-1">Válido até: {{ now()->days()->tomorrow()->format("d/m/Y") }} às {{ $rota->partida }}</p>
            </div>
        </div>

        <!-- Ações -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8 no-print">
            <a href="{{ route('viagens') }}"
                class="px-6 py-3 bg-white border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 transition text-center">
                <i class="fas fa-search mr-2"></i>Ver mais viagens
            </a>
            <button onclick="window.print()"
                class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition flex items-center justify-center">
                <i class="fas fa-print mr-2"></i>Imprimir Bilhete
            </button>
            <a href="#"
                class="px-6 py-3 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition text-center">
                <i class="fas fa-envelope mr-2"></i>Reenviar por e-mail
            </a>
        </div>
    </main>

    <script>
        // Função para gerar QR Code (exemplo simplificado)
        // Na prática, use uma biblioteca como QRCode.js
        function generateQRCode() {
            // Implementação real exigiria uma biblioteca QR Code
            console.log("Gerando QR Code...");
        }

        // Gerar QR Code quando a página carregar
        window.onload = generateQRCode;
    </script>
</body>

</html>
