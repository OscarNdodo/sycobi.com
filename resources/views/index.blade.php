<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sycobi | Sistema de Bilhetes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('./assets/images/img.jpeg');
            background-size: cover;
            background-position: center;
        }
        .seat:hover {
            transform: scale(1.1);
            transition: all 0.2s ease;
        }
        .seat.selected {
            background-color: #3B82F6;
            color: white;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Cabeçalho -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
              <a href="/" class="flex items-center uppercase">
                <i class="fas fa-bus text-blue-600 text-2xl"></i>
                <span class="ml-2 text-xl font-bold text-gray-800">Sycobi</span>
            </a>
            </div>

            <nav class="hidden md:flex space-x-8">
                <a href="#viagens" class="text-gray-600 hover:text-blue-600">Viagens</a>
                <a href="#como-funciona" class="text-gray-600 hover:text-blue-600">Como Funciona</a>
                <a href="#contactos" class="text-gray-600 hover:text-blue-600">Contactos</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Sobre</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Ajuda</a>
            </nav>

            {{-- <a href="/admin" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Área Admin</a> --}}
        </div>
    </header>    
    
    
    
    @yield('main')
    
    
    <!-- Rodapé -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center">
                      <a href="/" class="flex items-center uppercase">
                        <i class="fas fa-bus text-blue-600 text-2xl"></i>
                        <span class="ml-2 text-xl font-bold text-gray-50">Sycobi</span>
                    </a>
                    </div>
                    <p class="mt-2 text-gray-400">Sistema de compra de bilhetes</p>
                </div>
                
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white">Termos</a>
                    <a href="#" class="text-gray-400 hover:text-white">Privacidade</a>
                    <a href="#" class="text-gray-400 hover:text-white">FAQ</a>
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                <p>&copy;2025 Sycobi. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>






    @error('success')
    <div role="alert" class="alert rounded-md border border-gray-300 bg-white p-4 shadow fixed top-10 right-10 z-50">
        <div class="flex items-start gap-4">
          <i class="fas fa-check font-bold text-green-600 text-xl border-2 border-green-600 rounded-full px-1.5"></i>
      
          <div class="flex-1">
            <strong class="font-medium text-gray-900"> Alerta de erro! </strong>
      
            <p class="mt-0.5 text-sm text-gray-700">{{ $message }}</p>
          </div>
      
          <button
            class="-m-3 rounded-full p-1.5 text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700"
            type="button"
            aria-label="Dismiss alert"
          >
            <span class="sr-only">Dismiss popup</span>
      
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
      
    @enderror


    @error('error')
    <div role="alert" class="alert rounded-md border border-gray-300 bg-white p-4 shadow fixed top-10 right-10 z-50">
        <div class="flex items-start gap-4">
          <i class="fas fa-close font-bold text-red-600 text-xl border-2 border-red-600 rounded-full px-1.5"></i>
      
          <div class="flex-1">
            <strong class="font-medium text-gray-900"> Alerta de erro! </strong>
      
            <p class="mt-0.5 text-sm text-gray-700">{{ $message }}</p>
          </div>
      
          <button
            class="-m-3 rounded-full p-1.5 text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700"
            type="button"
            aria-label="Dismiss alert"
          >
            <span class="sr-only">Dismiss popup</span>
      
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-5"
            >
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
      
    @enderror


    <script>
        const alerts = [...document.querySelectorAll(".alert")];
        alerts.map((element) => {
            setTimeout(() => {
                element.style.display = "none";
            }, 5000);
        })
        //Loading feature
        const buttons = [...document.querySelectorAll("button[type=submit]")];
            buttons.map((element) => {
                element.addEventListener("click", (event) => {
                    element.innerText = "Carregando...";
                    element.disabled = true;
                })
            })
    </script>
</body>
</html>