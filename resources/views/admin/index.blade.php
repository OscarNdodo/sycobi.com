<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Sycobi</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: absolute;
            }
            .sidebar.open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="font-sans bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar bg-gray-800 text-white w-64 space-y-6 py-7 px-2 fixed inset-y-0 left-0 z-50">
            <!-- Logo -->
            <div class="flex items-center space-x-2 px-4">
                <i class="fas fa-bus text-2xl"></i>
                <span class="text-xl font-bold">SYCOBI</span>
                <button class="md:hidden ml-auto text-xl" onclick="toggleSidebar()">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Navigation -->
            <nav>
                <div class="py-2 px-4 bg-gray-700 rounded mx-2 mb-1">
                    <span class="text-xs text-gray-200">MENU PRINCIPAL</span>
                </div>
                <a href="{{ route('admin.home') }}" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2 bg-gray-700">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.rotas') }}" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-route"></i>
                    <span>Rotas</span>
                </a>
                <a href="{{ route('admin.bilhetes') }}" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Bilhetes</span>
                </a>
                {{-- <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Horários</span>
                </a> --}}
                {{-- <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-users"></i>
                    <span>Passageiros</span>
                </a> --}}
                
                {{-- <div class="py-2 px-4 bg-gray-700 rounded mx-2 mb-1 mt-4">
                    <span class="text-xs text-gray-200">RELATÓRIOS</span>
                </div>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-chart-line"></i>
                    <span>Vendas</span>
                </a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-chart-pie"></i>
                    <span>Clientes</span>
                </a> --}}
                
                <div class="py-2 px-4 bg-gray-700 rounded mx-2 mb-1 mt-4">
                    <span class="text-xs text-gray-200">CONFIGURAÇÕES</span>
                </div>

                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-user"></i>
                    <span>Usuarios</span>
                </a>
                <a href="{{ route('admin.config') }}" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-cog"></i>
                    <span>Minha conta</span>
                </a>
                <a href="{{ route('logout')}}" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 md:ml-64">
            <!-- Topbar -->
            <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center sticky top-0 z-40">
                <button class="md:hidden text-gray-600" onclick="toggleSidebar()">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-bell text-gray-500 text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                    </div>
                    <div class="flex items-center space-x-2 text-gray-500">
                        <i class="fa fa-user-circle text-base"></i>
                        <span class="font-medium text-sm uppercase">{{ auth()->user()->role == "admin" ? "Administrador" : "Vendedor" }}</span>
                    </div>
                </div>
            </header>

            <!-- Content -->
            @yield('main')



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
        </div>
    </div>

    <script>

        
        // Toggle sidebar on mobile
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('open');
        }
        
        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnMenuButton = event.target.closest('[onclick="toggleSidebar()"]');
            
            if (!isClickInsideSidebar && !isClickOnMenuButton && window.innerWidth < 768) {
                sidebar.classList.remove('open');
            }
        });

        

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