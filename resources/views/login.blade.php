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
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://source.unsplash.com/random/1600x900/?travel,transport');
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
    <div class="flex flex-col lg:flex-row w-full max-w-6xl rounded-xl overflow-hidden shadow-2xl">
        <!-- Lado Esquerdo - Imagem -->
        <div class="lg:w-1/2 bg-blue-500 text-white p-12 flex flex-col justify-between hidden lg:flex">
            <div>
                <a href="/" class="text-2xl font-bold flex items-center uppercase">
                    <i class="fas fa-bus mr-2"></i> Sycobi
                </a>
            </div>
            <div>
                <h2 class="text-4xl font-bold mb-4">Bem-vindo <br> de volta!</h2>
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
            
            <form id="loginForm" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" 
                               class="pl-10 w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="seu@email.com">
                        <div id="email-error" class="error-message hidden">Por favor, insira um e-mail válido</div>
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
                        <div id="password-error" class="error-message hidden">A senha deve ter pelo menos 6 caracteres</div>
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
                
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Ou continue com</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <button type="button" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition flex items-center justify-center">
                        <i class="fab fa-google text-red-500 mr-2"></i> Google
                    </button>
                    <button type="button" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition flex items-center justify-center">
                        <i class="fab fa-facebook-f text-blue-600 mr-2"></i> Facebook
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Não tem uma conta? 
                    <a href="#" class="text-blue-600 hover:text-blue-500 font-medium">Contacte o Suporte</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mostrar/ocultar senha
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
            
            // Validação do formulário
            const loginForm = document.getElementById('loginForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');
            
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;
                
                // Validação de e-mail
                if (!emailInput.value || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                    emailInput.classList.add('input-error');
                    emailError.classList.remove('hidden');
                    isValid = false;
                } else {
                    emailInput.classList.remove('input-error');
                    emailError.classList.add('hidden');
                }
                
                // Validação de senha
                if (!passwordInput.value || passwordInput.value.length < 6) {
                    passwordInput.classList.add('input-error');
                    passwordError.classList.remove('hidden');
                    isValid = false;
                } else {
                    passwordInput.classList.remove('input-error');
                    passwordError.classList.add('hidden');
                }
                
                // Se o formulário for válido, pode enviar
                if (isValid) {
                    // Simulação de envio - substituir por AJAX/axios/fetch
                    const submitButton = loginForm.querySelector('button[type="submit"]');
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Entrando...';
                    submitButton.disabled = true;
                    
                    setTimeout(() => {
                        alert('Login realizado com sucesso! Redirecionando...');
                        submitButton.innerHTML = '<i class="fas fa-sign-in-alt mr-2"></i> Entrar';
                        submitButton.disabled = false;
                        // window.location.href = 'dashboard.html';
                    }, 1500);
                }
            });
            
            // Limpar erros ao digitar
            emailInput.addEventListener('input', function() {
                if (this.classList.contains('input-error')) {
                    this.classList.remove('input-error');
                    emailError.classList.add('hidden');
                }
            });
            
            passwordInput.addEventListener('input', function() {
                if (this.classList.contains('input-error')) {
                    this.classList.remove('input-error');
                    passwordError.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>