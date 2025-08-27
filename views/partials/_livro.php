<div class="book-card bg-card/50 backdrop-blur-sm border border-border/50 rounded-2xl overflow-hidden group">
    <div class="relative">
        <div class="aspect-[3/4] overflow-hidden bg-gradient-to-br from-muted/20 to-muted/10">
            <img
                src="<?= $livro->imagem ?>"
                alt="Capa do livro <?= $livro->titulo ?>"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <div class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center backdrop-blur-sm">
            <div class="text-center space-y-4 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                <a href="livro?id=<?= $livro->id ?>" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-accent text-white rounded-xl font-semibold hover:shadow-lg hover:shadow-primary/25 transition-all duration-300 transform hover:scale-105">
                    <i data-lucide="eye" class="w-4 h-4 mr-2"></i>
                    Ver Detalhes
                </a>
                <div class="flex items-center justify-center space-x-1">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i data-lucide="star" class="w-4 h-4 <?= $i <= $livro->nota_avaliacao ? 'text-yellow-400 fill-current' : 'text-white/40' ?>"></i>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <div class="absolute top-4 right-4 bg-black/80 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium flex items-center space-x-1">
            <i data-lucide="star" class="w-3 h-3 text-yellow-400 fill-current"></i>
            <span><?= number_format($livro->nota_avaliacao, 1) ?></span>
        </div>
    </div>

    <div class="p-6 space-y-4">
        <div>
            <a href="livro?id=<?= $livro->id ?>" class="font-bold text-lg hover:text-primary transition-colors line-clamp-2 mb-2 block">
                <?= $livro->titulo ?>
            </a>
            <p class="text-muted-foreground text-sm font-medium"><?= $livro->autor ?></p>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="flex items-center">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i data-lucide="star" class="w-4 h-4 <?= $i <= $livro->nota_avaliacao ? 'text-yellow-400 fill-current' : 'text-muted-foreground/40' ?>"></i>
                    <?php endfor; ?>
                </div>
                <span class="text-sm text-muted-foreground">
                    (<?= $livro->count_avaliacoes ?>)
                </span>
            </div>
        </div>

        <p class="text-sm text-muted-foreground line-clamp-3 leading-relaxed">
            <?= $livro->descricao ?>
        </p>
    </div>
</div>