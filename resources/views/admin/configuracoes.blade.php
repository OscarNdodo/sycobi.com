@extends('admin.index')

@section('main')
<!-- Main Content -->
<main class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Configurações</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Menu Lateral -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-4 border-b">
                    <h2 class="font-semibold text-gray-800">Menu de Configurações</h2>
                </div>
                <nav class="divide-y divide-gray-200">
                    <a href="#" class="block p-4 hover:bg-blue-50 text-blue-600 font-medium border-l-4 border-blue-600 settings-tab" data-tab="profile">
                        <i class="fas fa-user-circle mr-2"></i>
                        Perfil
                    </a>
                    <a href="#" class="block p-4 hover:bg-gray-50 text-gray-600 settings-tab" data-tab="security">
                        <i class="fas fa-lock mr-2"></i>
                        Segurança
                    </a>
                    <a href="#" class="block p-4 hover:bg-gray-50 text-gray-600 settings-tab" data-tab="notifications">
                        <i class="fas fa-bell mr-2"></i>
                        Notificações
                    </a>
                    <a href="#" class="block p-4 hover:bg-gray-50 text-gray-600 settings-tab" data-tab="payments">
                        <i class="fas fa-credit-card mr-2"></i>
                        Pagamentos
                    </a>
                    <a href="#" class="block p-4 hover:bg-gray-50 text-gray-600 settings-tab" data-tab="language">
                        <i class="fas fa-globe mr-2"></i>
                        Idioma e Região
                    </a>
                </nav>
            </div>
        </div>

        <!-- Conteúdo das Configurações -->
        <div class="lg:col-span-2">
            <!-- Seção de Perfil (Ativa por padrão) -->
            <div class="settings-content bg-white rounded-lg shadow overflow-hidden" id="profile-content">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-semibold flex items-center">
                        <i class="fas fa-user-circle mr-2 text-blue-600"></i>
                        Informações do Perfil
                    </h2>
                </div>
                
                <form class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                            <input type="text" value="João Silva" class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                            <input type="email" value="joao@example.com" class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                            <input type="tel" value="+351 912 345 678" class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Data de Nascimento</label>
                            <input type="date" value="1985-06-15" class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto de Perfil</label>
                        <div class="flex items-center">
                            <img src="https://via.placeholder.com/80" alt="Foto do perfil" class="w-16 h-16 rounded-full mr-4">
                            <div>
                                <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Alterar Foto
                                </button>
                                <button type="button" class="ml-3 px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Remover
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end">
                        <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancelar
                        </button>
                        <button type="submit" class="ml-3 px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>

            <!-- Seção de Segurança -->
            <div class="settings-content bg-white rounded-lg shadow overflow-hidden hidden" id="security-content">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-semibold flex items-center">
                        <i class="fas fa-lock mr-2 text-blue-600"></i>
                        Configurações de Segurança
                    </h2>
                </div>
                
                <form class="p-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Senha Atual</label>
                            <input type="password" class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nova Senha</label>
                            <input type="password" class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar Nova Senha</label>
                            <input type="password" class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div class="mt-6">
                            <h3 class="text-md font-medium text-gray-900">Autenticação de Dois Fatores</h3>
                            <div class="mt-2 flex items-center">
                                <input type="checkbox" id="twoFactor" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="twoFactor" class="ml-2 block text-sm text-gray-700">Ativar autenticação de dois fatores</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end">
                        <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancelar
                        </button>
                        <button type="submit" class="ml-3 px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Atualizar Segurança
                        </button>
                    </div>
                </form>
            </div>

            <!-- Seção de Notificações -->
            <div class="settings-content bg-white rounded-lg shadow overflow-hidden hidden" id="notifications-content">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-semibold flex items-center">
                        <i class="fas fa-bell mr-2 text-blue-600"></i>
                        Configurações de Notificações
                    </h2>
                </div>
                
                <form class="p-6">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-md font-medium text-gray-900">Notificações por E-mail</h3>
                            <div class="mt-4 space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="email-news" name="email-news" type="checkbox" checked class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="email-news" class="font-medium text-gray-700">Novidades e atualizações</label>
                                        <p class="text-gray-500">Receba notícias sobre novos recursos e melhorias.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="email-reminders" name="email-reminders" type="checkbox" checked class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="email-reminders" class="font-medium text-gray-700">Lembretes</label>
                                        <p class="text-gray-500">Receba lembretes sobre atividades importantes.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="pt-4">
                            <h3 class="text-md font-medium text-gray-900">Notificações no Sistema</h3>
                            <div class="mt-4 space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="system-messages" name="system-messages" type="checkbox" checked class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="system-messages" class="font-medium text-gray-700">Mensagens do sistema</label>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="system-updates" name="system-updates" type="checkbox" checked class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="system-updates" class="font-medium text-gray-700">Atualizações importantes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end">
                        <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancelar
                        </button>
                        <button type="submit" class="ml-3 px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Salvar Preferências
                        </button>
                    </div>
                </form>
            </div>

            <!-- Seção de Pagamentos -->
            <div class="settings-content bg-white rounded-lg shadow overflow-hidden hidden" id="payments-content">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-semibold flex items-center">
                        <i class="fas fa-credit-card mr-2 text-blue-600"></i>
                        Configurações de Pagamento
                    </h2>
                </div>
                
                <div class="p-6">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-md font-medium text-gray-900 mb-2">Métodos de Pagamento</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="fab fa-cc-visa text-3xl text-blue-600 mr-3"></i>
                                        <div>
                                            <p class="font-medium">Visa ending in 4242</p>
                                            <p class="text-sm text-gray-500">Expira em 12/2024</p>
                                        </div>
                                    </div>
                                    <button class="text-red-600 hover:text-red-800 text-sm font-medium">Remover</button>
                                </div>
                            </div>
                            <button class="mt-4 px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Adicionar novo método de pagamento
                            </button>
                        </div>
                        
                        <div class="pt-6">
                            <h3 class="text-md font-medium text-gray-900 mb-2">Histórico de Pagamentos</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/05/2023</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Assinatura Premium</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">R$ 99,90</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">Pago</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/04/2023</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Assinatura Premium</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">R$ 99,90</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">Pago</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção de Idioma e Região -->
            <div class="settings-content bg-white rounded-lg shadow overflow-hidden hidden" id="language-content">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-semibold flex items-center">
                        <i class="fas fa-globe mr-2 text-blue-600"></i>
                        Idioma e Região
                    </h2>
                </div>
                
                <form class="p-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Idioma</label>
                            <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option selected>Português (Brasil)</option>
                                <option>English (United States)</option>
                                <option>Español (España)</option>
                                <option>Français (France)</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Fuso Horário</label>
                            <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option selected>(UTC-03:00) Brasília</option>
                                <option>(UTC-05:00) Eastern Time (US & Canada)</option>
                                <option>(UTC+00:00) London</option>
                                <option>(UTC+01:00) Berlin</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Formato de Data</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center">
                                    <input id="date-format-1" name="date-format" type="radio" checked class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                    <label for="date-format-1" class="ml-3 block text-sm font-medium text-gray-700">DD/MM/AAAA (e.g., 15/06/2023)</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="date-format-2" name="date-format" type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                    <label for="date-format-2" class="ml-3 block text-sm font-medium text-gray-700">MM/DD/AAAA (e.g., 06/15/2023)</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="date-format-3" name="date-format" type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                    <label for="date-format-3" class="ml-3 block text-sm font-medium text-gray-700">AAAA-MM-DD (e.g., 2023-06-15)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end">
                        <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancelar
                        </button>
                        <button type="submit" class="ml-3 px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Salvar Configurações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleciona todas as abas e conteúdos
        const tabs = document.querySelectorAll('.settings-tab');
        const contents = document.querySelectorAll('.settings-content');
        
        // Adiciona evento de clique para cada aba
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove todas as classes ativas
                tabs.forEach(t => {
                    t.classList.remove('text-blue-600', 'font-medium', 'border-l-4', 'border-blue-600', 'bg-blue-50');
                    t.classList.add('text-gray-600');
                });
                
                // Adiciona classes ativas para a aba clicada
                this.classList.add('text-blue-600', 'font-medium', 'border-l-4', 'border-blue-600', 'bg-blue-50');
                this.classList.remove('text-gray-600');
                
                // Oculta todos os conteúdos
                contents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Mostra o conteúdo correspondente
                const tabId = this.getAttribute('data-tab');
                document.getElementById(`${tabId}-content`).classList.remove('hidden');
            });
        });
        
        // Ativa a primeira aba por padrão
        if (tabs.length > 0) {
            tabs[0].click();
        }
    });
</script>
@endsection