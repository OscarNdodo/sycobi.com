@extends('index')


@section('main')
    

    <!-- Hero Section -->
    <section class="hero-bg text-white py-20 md:py-32">
        <div class="container mx-auto px-4 text-center flex flex-col items-center justify-center">
            <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold mb-6 uppercase md:max-w-4xl">Bilhete para sua viagem em minutos</h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Sistema simples e rápido para compra de bilhetes sem sair de casa</p>
            <a href="#viagens" class="px-8 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium text-lg">Viagens Disponíveis</a>
        </div>
    </section>

    <!-- Como Funciona -->
    <section id="como-funciona" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Como Funciona</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6 rounded-lg">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <span class="text-blue-600 text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Escolha sua viagem</h3>
                    <p class="text-gray-600">Selecione origem, destino e data da sua viagem</p>
                </div>
                
                <div class="text-center p-6 rounded-lg">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <span class="text-blue-600 text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Preencha seus dados</h3>
                    <p class="text-gray-600">Informe apenas dados identidade necessarios</p>
                </div>
                
                <div class="text-center p-6 rounded-lg">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <span class="text-blue-600 text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Receba seu bilhete</h3>
                    <p class="text-gray-600">Bilhete enviado por e-mail com código de confirmação</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Viagens Disponíveis -->
    <section id="viagens" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Viagens Disponíveis</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Exemplo de card de viagem -->
               
                @forelse ($rotas as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold">{{ $item->origem }} → {{ $item->destino }}</h3>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">{{ $item->acentos - $item->bilhetes()->count() }}
                                lugares</span>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>{{ $item->partida }} - {{ $item->chegada }} </span>
                            </div>

                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Partida: {{ $item->origem }}</span>
                            </div>

                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>{{ now()->days()->tomorrow()->format("d/m/Y") }}</span>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-between items-center">
                            <span class="text-2xl font-bold">{{ number_format($item->preco, 2, '.') }} MT</span>
                            <a href="{{ route('bilhete.criar', $item->id) }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Comprar
                                Bilhete</a>
                        </div>
                    </div>
                </div>


            @empty
                <div class="flex justify-center items-center w-full text-gray-600 py-5 bg-blue-50">
                    Nenhuma viagem encontrada!
                </div>
            @endforelse
                <!-- Mais cards de viagem... -->
            </div>

            <div class="md:px-20" >
                <a href="/viagens" class="w-full flex items-center justify-center p-4 bg-blue-600 text-white my-10 rounded hover:opacity-80 active:scale-95 ease-in-out duration-300 transition-shadow ">Ver todas viagens <i class="fa fa-arrow-right ml-6 text-opacity-70"></i></a>
            </div>
        </div>
    </section>

    <!-- Contactos -->
    <section id="contactos" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Contactos-nos</h2>
            
            <div class="max-w-2xl mx-auto">
                <form class="space-y-4">
                    <div>
                        <label for="nome" class="block text-gray-700 mb-1">Nome</label>
                        <input type="text" id="nome" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-gray-700 mb-1">Telefone</label>
                        <input type="phone" id="phone" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="mensagem" class="block text-gray-700 mb-1">Mensagem</label>
                        <textarea id="mensagem" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    </section>


@endsection