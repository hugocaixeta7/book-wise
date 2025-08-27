<!DOCTYPE html>
<html lang="pt-br" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Wise</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="stylesheet" href="/book-wise/app/globals.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-background text-foreground min-h-screen">
    <header class="sticky top-0 z-50 glass-effect border-b border-border/50">
        <nav class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center space-x-4 animate-slide-in-left">
                    <div class="relative">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary to-accent rounded-xl flex items-center justify-center shadow-lg animate-glow">
                            <i data-lucide="book-open" class="w-6 h-6 text-white"></i>
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-accent rounded-full animate-pulse"></div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold gradient-text">Book Wise</h1>
                        <p class="text-xs text-muted-foreground">Sua biblioteca digital</p>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="/book-wise" class="group flex items-center space-x-2 text-primary font-medium hover:text-primary/80 transition-all duration-300 relative">
                        <i data-lucide="compass" class="w-5 h-5 group-hover:rotate-12 transition-transform"></i>
                        <span>Explorar</span>
                        <div class="absolute -bottom-2 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300"></div>
                    </a>
                    <?php if (auth()): ?>
                        <a href="/book-wise/meus-livros" class="group flex items-center space-x-2 text-muted-foreground hover:text-foreground transition-all duration-300 relative">
                            <i data-lucide="library" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                            <span>Minha Biblioteca</span>
                            <div class="absolute -bottom-2 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></div>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="flex items-center space-x-4">
                    <?php if (auth()): ?>
                        <div class="flex items-center space-x-4 animate-fade-in-up">
                            <div class="relative group">
                                <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-accent/20 rounded-full flex items-center justify-center border border-primary/20 group-hover:border-primary/40 transition-all duration-300">
                                    <i data-lucide="user" class="w-5 h-5 text-primary group-hover:scale-110 transition-transform"></i>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-background"></div>
                            </div>
                            <div class="hidden sm:block">
                                <p class="text-sm font-semibold">Olá, <?= auth()->nome ?></p>
                                <a href="/book-wise/logout" class="text-xs text-muted-foreground hover:text-destructive transition-colors flex items-center space-x-1">
                                    <i data-lucide="log-out" class="w-3 h-3"></i>
                                    <span>Sair</span>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="/book-wise/login" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-accent text-white rounded-xl font-medium hover:shadow-lg hover:shadow-primary/25 transition-all duration-300 transform hover:scale-105">
                            <i data-lucide="log-in" class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform"></i>
                            Fazer Login
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-6 lg:px-8 py-12">
        <?php if ($mensagem = flash()->get('mensagem')): ?>
            <div class="mb-8 animate-scale-in">
                <div class="bg-gradient-to-r from-green-500/10 to-emerald-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-xl flex items-center space-x-4 backdrop-blur-sm">
                    <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                        <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                    </div>
                    <span class="font-medium"><?= $mensagem ?></span>
                </div>
            </div>
        <?php endif; ?>

        <div class="animate-fade-in-up">
            <?php require "views/{$view}.view.php" ?>
        </div>
    </main>

    <footer class="mt-20 border-t border-border/50 bg-card/30 backdrop-blur-sm">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 py-12">
            <div class="text-center">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary to-accent rounded-lg flex items-center justify-center">
                        <i data-lucide="book-open" class="w-4 h-4 text-white"></i>
                    </div>
                    <span class="text-lg font-bold gradient-text">Book Wise</span>
                </div>
                <p class="text-muted-foreground text-sm">
                    Descubra, avalie e compartilhe suas leituras favoritas
                </p>
                <div class="mt-6 flex items-center justify-center space-x-6 text-xs text-muted-foreground">
                    <span>© 2025 Book Wise</span>
                    <span>•</span>
                    <span>Feito com ❤️ para leitores</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
        
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.book-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>
