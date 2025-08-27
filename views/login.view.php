<div class="min-h-[80vh] flex items-center justify-center">
    <div class="max-w-6xl mx-auto w-full">
        <div class="text-center mb-16 animate-fade-in-up">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-primary to-accent rounded-2xl mb-6 floating">
                <i data-lucide="book-heart" class="w-10 h-10 text-white"></i>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-6 gradient-text">Bem-vindo ao Book Wise</h1>
            <p class="text-xl text-muted-foreground max-w-2xl mx-auto leading-relaxed">
                Entre na sua conta ou crie uma nova para começar sua jornada literária e descobrir mundos incríveis
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <div class="bg-card/50 backdrop-blur-sm border border-border/50 rounded-2xl p-8 lg:p-10 animate-slide-in-left">
                <div class="flex items-center space-x-4 mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-primary/10 rounded-xl flex items-center justify-center">
                        <i data-lucide="log-in" class="w-6 h-6 text-primary"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Fazer Login</h2>
                        <p class="text-sm text-muted-foreground">Acesse sua conta</p>
                    </div>
                </div>

                <form method="POST" class="space-y-6">
                    <?php if ($validacoes = flash()->get('validacoes_login')): ?>
                        <div class="bg-gradient-to-r from-destructive/10 to-red-500/10 border border-destructive/20 text-destructive px-6 py-4 rounded-xl animate-scale-in">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-6 h-6 bg-destructive/20 rounded-full flex items-center justify-center">
                                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                                </div>
                                <span class="font-semibold">Erro no login</span>
                            </div>
                            <ul class="text-sm space-y-2 ml-9">
                                <?php foreach ($validacoes as $validacao): ?>
                                    <li class="flex items-center space-x-2">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                        <span><?= $validacao ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="space-y-3">
                        <label class="text-sm font-semibold text-foreground">Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="mail" class="w-5 h-5 text-muted-foreground group-focus-within:text-primary transition-colors"></i>
                            </div>
                            <input
                                type="email"
                                name="email"
                                class="w-full pl-12 pr-4 py-4 bg-input/50 border border-border rounded-xl text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70"
                                placeholder="seu@email.com" />
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-sm font-semibold text-foreground">Senha</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="lock" class="w-5 h-5 text-muted-foreground group-focus-within:text-primary transition-colors"></i>
                            </div>
                            <input
                                type="password"
                                name="senha"
                                class="w-full pl-12 pr-4 py-4 bg-input/50 border border-border rounded-xl text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70"
                                placeholder="••••••••" />
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-primary to-accent text-white py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-primary/25 transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center space-x-2">
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        <span>Entrar na Conta</span>
                    </button>
                </form>
            </div>

            <div class="bg-card/50 backdrop-blur-sm border border-border/50 rounded-2xl p-8 lg:p-10 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="flex items-center space-x-4 mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-accent/20 to-accent/10 rounded-xl flex items-center justify-center">
                        <i data-lucide="user-plus" class="w-6 h-6 text-accent"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Criar Conta</h2>
                        <p class="text-sm text-muted-foreground">Junte-se à comunidade</p>
                    </div>
                </div>

                <form method="POST" action="registrar" class="space-y-6">
                    <?php if ($validacoes = flash()->get('validacoes_registrar')): ?>
                        <div class="bg-gradient-to-r from-destructive/10 to-red-500/10 border border-destructive/20 text-destructive px-6 py-4 rounded-xl animate-scale-in">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-6 h-6 bg-destructive/20 rounded-full flex items-center justify-center">
                                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                                </div>
                                <span class="font-semibold">Erro no cadastro</span>
                            </div>
                            <ul class="text-sm space-y-2 ml-9">
                                <?php foreach ($validacoes as $validacao): ?>
                                    <li class="flex items-center space-x-2">
                                        <i data-lucide="x" class="w-3 h-3"></i>
                                        <span><?= $validacao ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="space-y-3">
                        <label class="text-sm font-semibold text-foreground">Nome Completo</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="user" class="w-5 h-5 text-muted-foreground group-focus-within:text-primary transition-colors"></i>
                            </div>
                            <input
                                type="text"
                                name="nome"
                                class="w-full pl-12 pr-4 py-4 bg-input/50 border border-border rounded-xl text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70"
                                placeholder="Seu nome completo" />
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-3">
                            <label class="text-sm font-semibold text-foreground">Email</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="mail" class="w-5 h-5 text-muted-foreground group-focus-within:text-primary transition-colors"></i>
                                </div>
                                <input
                                    type="email"
                                    name="email"
                                    class="w-full pl-12 pr-4 py-4 bg-input/50 border border-border rounded-xl text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70"
                                    placeholder="seu@email.com" />
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-sm font-semibold text-foreground">Confirmar Email</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="mail-check" class="w-5 h-5 text-muted-foreground group-focus-within:text-primary transition-colors"></i>
                                </div>
                                <input
                                    type="email"
                                    name="email_confirmacao"
                                    class="w-full pl-12 pr-4 py-4 bg-input/50 border border-border rounded-xl text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70"
                                    placeholder="Confirme seu email" />
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-sm font-semibold text-foreground">Senha</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="lock" class="w-5 h-5 text-muted-foreground group-focus-within:text-primary transition-colors"></i>
                            </div>
                            <input
                                type="password"
                                name="senha"
                                class="w-full pl-12 pr-4 py-4 bg-input/50 border border-border rounded-xl text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70"
                                placeholder="••••••••" />
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-accent to-primary text-white py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-accent/25 transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center space-x-2">
                            <i data-lucide="user-plus" class="w-5 h-5"></i>
                            <span>Criar Conta</span>
                        </button>
                        <button type="reset" class="px-6 py-4 bg-secondary/50 text-secondary-foreground rounded-xl font-semibold hover:bg-secondary/70 transition-all duration-300 flex items-center justify-center">
                            <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
