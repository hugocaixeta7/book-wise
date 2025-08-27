<div class="mb-16">
    <div class="text-center mb-12 animate-fade-in-up">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-primary to-accent rounded-2xl mb-8 floating">
            <i data-lucide="sparkles" class="w-8 h-8 text-white"></i>
        </div>
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 gradient-text leading-tight">
            Descubra seu próximo<br>livro favorito
        </h1>
        <p class="text-xl md:text-2xl text-muted-foreground max-w-3xl mx-auto leading-relaxed">
            Explore nossa coleção curada, avalie livros e compartilhe suas descobertas literárias com uma comunidade apaixonada por leitura
        </p>
    </div>

    <form class="max-w-4xl mx-auto animate-scale-in" style="animation-delay: 0.3s;">
        <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
                <i data-lucide="search" class="w-6 h-6 text-muted-foreground group-focus-within:text-primary transition-colors duration-300"></i>
            </div>
            <input
            type="text"
            name="pesquisar"
            class="w-full pl-16 pr-32 py-6 bg-card/50 backdrop-blur-sm border border-border/50 rounded-2xl text-lg placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-card/70"
            placeholder="Pesquisar por título">
            <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <div class="bg-gradient-to-r from-primary to-accent text-white px-8 py-3 rounded-xl hover:shadow-lg hover:shadow-primary/25 transition-all duration-300 transform hover:scale-105 flex items-center space-x-2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span class="font-semibold">Buscar</span>
                </div>
            </button>
        </div>
    </form>
</div>

<section class="animate-fade-in-up" style="animation-delay: 0.5s;">
    <div class="flex items-center justify-between mb-12">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-accent/20 rounded-xl flex items-center justify-center">
                <i data-lucide="library" class="w-6 h-6 text-primary"></i>
            </div>
            <div>
                <h2 class="text-3xl font-bold">Livros em Destaque</h2>
                <p class="text-muted-foreground">Descobertas selecionadas para você</p>
            </div>
        </div>
        <div class="flex items-center space-x-3 bg-card/50 backdrop-blur-sm border border-border/50 rounded-xl px-4 py-2">
            <i data-lucide="book" class="w-5 h-5 text-primary"></i>
            <span class="text-sm font-medium"><?= count($livros) ?> livros encontrados</span>
        </div>
    </div>

    <?php if (!empty($livros)): ?>
        <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php foreach ($livros as $index => $livro): ?>
                <div class="animate-fade-in-up" style="animation-delay: <?= $index * 0.1 ?>s;">
                    <?php require 'partials/_livro.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-24 animate-scale-in">
            <div class="w-24 h-24 bg-gradient-to-br from-muted/20 to-muted/10 rounded-2xl flex items-center justify-center mx-auto mb-8">
                <i data-lucide="book-x" class="w-12 h-12 text-muted-foreground"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4">Nenhum livro encontrado</h3>
            <p class="text-muted-foreground text-lg mb-8 max-w-md mx-auto">
                Não encontramos livros com esses critérios. Tente ajustar sua pesquisa ou explore nossa coleção completa.
            </p>
            <a href="/book-wise" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-accent text-white rounded-xl font-semibold hover:shadow-lg hover:shadow-primary/25 transition-all duration-300 transform hover:scale-105">
                <i data-lucide="refresh-cw" class="w-5 h-5 mr-2"></i>
                Explorar Todos os Livros
            </a>
        </div>
    <?php endif; ?>
</section>