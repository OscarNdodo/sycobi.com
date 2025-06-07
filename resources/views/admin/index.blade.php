<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sycobi</title>
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
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2 bg-gray-700">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-route"></i>
                    <span>Rotas</span>
                </a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Horários</span>
                </a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Reservas</span>
                </a>
                {{-- <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-users"></i>
                    <span>Passageiros</span>
                </a> --}}
                
                <div class="py-2 px-4 bg-gray-700 rounded mx-2 mb-1 mt-4">
                    <span class="text-xs text-gray-200">RELATÓRIOS</span>
                </div>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-chart-line"></i>
                    <span>Vendas</span>
                </a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-chart-pie"></i>
                    <span>Clientes</span>
                </a>
                
                <div class="py-2 px-4 bg-gray-700 rounded mx-2 mb-1 mt-4">
                    <span class="text-xs text-gray-200">CONFIGURAÇÕES</span>
                </div>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
                    <i class="fas fa-cog"></i>
                    <span>Configurações</span>
                </a>
                <a href="#" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition flex items-center space-x-2">
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
                    <div class="flex items-center space-x-2">
                        <img src="https://via.placeholder.com/40" alt="User" class="rounded-full">
                        <span class="font-medium">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Content -->
            @yield('main')
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
    </script>
</body>
</html>