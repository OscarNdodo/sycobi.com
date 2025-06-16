<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sycobi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .bg-auth {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/images/bg-login.jpeg');
            background-size: cover;
            background-position: center;
        }
        .input-error {
            border-color: #f87171;
        }
        .error-message {
            color: #f87171;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="flex flex-col backdrop-blur lg:flex-row w-full max-w-6xl rounded-xl overflow-hidden shadow-2xl">
        <!-- Lado Esquerdo - Imagem -->
        <div class="bg-auth lg:w-1/2 bg-blue-500 text-white p-12 flex flex-col justify-between hidden lg:flex">
            <div>
                <a href="/" class="text-2xl font-bold flex items-center uppercase">
                    <i class="fas fa-bus mr-2"></i> Sycobi
                </a>
            </div>
            <div>
                <h2 class="text-4xl font-bold mb-4 uppercase">Bem-vindo!</h2>
                <p class="text-lg opacity-90">Gerencie suas reservas e tenha acesso a ofertas exclusivas.</p>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="text-white hover:text-gray-200">
                    <i class="fab fa-facebook-f text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-200">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-200">
                    <i class="fab fa-linkedin-in text-xl"></i>
                </a>
            </div>
        </div>
        
        <!-- Lado Direito - Formulário -->
        <div class="lg:w-1/2 bg-white p-8 sm:p-12">
            <div class="text-center lg:text-left mb-8 lg:hidden">
                <a href="/" class="text-2xl font-bold text-blue-600 flex items-center justify-center lg:justify-start">
                    <i class="fas fa-bus mr-2 uppercase"></i> Sycobi
                </a>
            </div>
            
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Faça login</h1>
            <p class="text-gray-600 mb-8">Entre com suas credenciais para acessar sua conta</p>
            @error('error')
                <div id="email-error" class="error-message">{{ $message }}</div>
            @enderror
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                <div>
                    @csrf
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" 
                               class="pl-10 w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="seu@email.com">
                              
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Esqueceu a senha?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" 
                               class="pl-10 w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="••••••••">
                        <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-gray-500" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                       
                    </div>
                </div>
                
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Lembrar de mim</label>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition flex items-center justify-center">
                    <i class="fas fa-sign-in-alt mr-2"></i> Entrar
                </button>
             
                
                
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Não tem uma conta? 
                    <a href="#" class="text-blue-600 hover:text-blue-500 font-medium">Contacte o Suporte</a>
                </p>
            </div>
        </div>
    </div>

    <script>
            // Mostrar/ocultar senha
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
          
           

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