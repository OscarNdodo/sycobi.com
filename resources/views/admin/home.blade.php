
@extends('admin.index')

@section('main')
<main class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Bilhetes Hoje</p>
                    <p class="text-3xl font-bold mt-2">{{ count($bilhetes_hoje) > 9 ? count($bilhetes_hoje) : "0" . count($bilhetes_hoje) }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                    <i class="fas fa-ticket-alt"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> {{ number_format((100 * count($bilhetes_hoje)) / count($bilhetes), 2, ".") }}% que ontem</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Receita Hoje</p>
                    <p class="text-3xl font-bold mt-2">{{ number_format($receita_hoje, 1, ",", ".") }} MT</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full text-green-600">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i> {{ number_format((100 * $receita_hoje) / $receita, 2, ".") }}% que ontem</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500">Total de Rotas</p>
                    <p class="text-3xl font-bold mt-2">{{ count($rotas) > 9 ? count($rotas) : "0" . count($rotas) }}</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full text-orange-600">
                    <i class="fas fa-route"></i>
                </div>
            </div>
            <p class="text-sm text-green-500 mt-2"><i class="fas fa-plus mr-1"></i> {{ count($rotas_hoje) > 9 ? $rotas_hoje : "0" . count($rotas_hoje) }} Viagens hoje</p>
        </div>
        
    </div>
    
    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-4 lg:col-span-2">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font- px-6">Reservas de bilhetes</h2>
            </div>
            <!-- Placeholder for Chart -->
            <div class="w-full bg-white rounded flex items-center justify-center text-gray-400">
                <div id="chart" class="w-full"></div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Viagens hoje</h2>
            <div class="space-y-4">

                @forelse ($bilhetes_hoje as $item)
                    @switch($item->status)
                        @case("Confirmado")
                            
                <div class="flex items-start">
                    <div class="bg-green-100 p-2 rounded mr-3">
                        <i class="fas fa-bus text-green-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">{{ $item->rota->origem }} → {{ $item->rota->destino }}</p>
                        <p class="text-sm text-gray-500">{{ $item->rota->partida }} - {{ $item->rota->chegada }} <span class="bg-green-200 text-green-600 rounded-full px-3 text-xs ">{{ $item->status }}</span></p>
                    </div>
                </div>
                            @break
                        @case("Pendente")
                                 
                <div class="flex items-start">
                    <div class="bg-blue-100 p-2 rounded mr-3">
                        <i class="fas fa-bus text-blue-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">{{ $item->rota->origem }} → {{ $item->rota->destino }}</p>
                        <p class="text-sm text-gray-500">{{ $item->rota->partida }} - {{ $item->rota->chegada }} <span class="bg-blue-200 text-blue-600 rounded-full px-3 text-xs ">{{ $item->status }}</span></p>
                    </div>
                </div>
                            @break
                        @default
                             
                <div class="flex items-start">
                    <div class="bg-red-100 p-2 rounded mr-3">
                        <i class="fas fa-bus text-red-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">{{ $item->rota->origem }} → {{ $item->rota->destino }}</p>
                        <p class="text-sm text-gray-500">{{ $item->rota->partida }} - {{ $item->rota->chegada }} <span class="bg-red-200 text-red-600 rounded-full px-3 text-xs ">{{ $item->status }}</span></p>
                    </div>
                </div>
                            
                    @endswitch
                @empty
                    
                @endforelse

            </div>
        </div>
    </div>
    
</main>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
  chart: {
    type: 'bar',
    toolbar: false,
    height: 420,
    zoom: false,

    brush: {
        enabled: false,
        target: undefined,
        autoScaleYaxis: false
      }
  },
  series: [{
    name: 'Bilhetes',
    data: @json($chartData["data"])
  }],
  xaxis: {
    categories: @json($chartData["labels"])
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>
    
@endsection