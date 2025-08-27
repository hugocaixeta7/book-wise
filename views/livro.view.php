<div class="max-w-7xl mx-auto animate-fade-in-up">
    <nav class="flex items-center space-x-3 text-sm text-muted-foreground mb-8">
        <a href="/book-wise" class="hover:text-primary transition-colors flex items-center space-x-1">
            <i data-lucide="home" class="w-4 h-4"></i>
            <span>Explorar</span>
        </a>
        <i data-lucide="chevron-right" class="w-4 h-4"></i>
        <span class="text-foreground font-medium"><?= $livro->titulo ?></span>
    </nav>

    <div class="bg-card/50 backdrop-blur-sm border border-border/50 rounded-2xl overflow-hidden mb-12 animate-scale-in">

        <div class="grid lg:grid-cols-5 gap-12 p-12">
            <div class="lg:col-span-2">
                <div class="aspect-[3/4] overflow-hidden rounded-2xl bg-gradient-to-br from-muted/20 to-muted/10 relative group">
                    <img
                        src="<?= $livro->imagem ?>"
                        alt="Capa do livro <?= $livro->titulo ?>"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                </div>
            </div>

            <div class="lg:col-span-3 space-y-8">
                <div>
                    <h1 class="text-4xl lg:text-5xl font-bold mb-4 gradient-text"><?= $livro->titulo ?></h1>
                    <p class="text-2xl text-muted-foreground mb-6 text-foreground font-semibold"> Lançado em: <?= $livro->ano_de_lancamento ?></p>
                    <p class="text-2xl text-muted-foreground mb-6">por <span class="text-foreground font-semibold"><?= $livro->autor ?></span></p>

                    <div class="flex items-center space-x-6 mb-8">
                        <div class="flex items-center space-x-2">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i data-lucide="star" class="w-6 h-6 <?= $i <= $livro->nota_avaliacao ? 'text-yellow-400 fill-current' : 'text-muted-foreground/40' ?>"></i>
                            <?php endfor; ?>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-2xl font-bold"><?= number_format($livro->nota_avaliacao, 1) ?></span>
                            <div class="bg-primary/10 text-primary px-4 py-2 rounded-full text-sm font-semibold">
                                <?= $livro->count_avaliacoes ?> <?= $livro->count_avaliacoes == 1 ? 'avaliação' : 'avaliações' ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-secondary/30 rounded-2xl ">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary/20 to-accent/20 rounded-xl flex items-center justify-center">
                            <i data-lucide="book-open" class="w-5 h-5 text-primary"></i>
                        </div>
                        <h3 class="text-xl font-bold">Sobre o livro</h3>
                    </div>
                    <p class="text-muted-foreground leading-relaxed text-lg"><?= $livro->descricao ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-4 gap-12">
        <!-- Reviews list -->
        <div class="lg:col-span-3 animate-slide-in-left">
            <div class="flex items-center space-x-4 mb-8">
                <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-accent/20 rounded-xl flex items-center justify-center">
                    <i data-lucide="message-circle" class="w-6 h-6 text-primary"></i>
                </div>
                <div>
                    <h2 class="text-3xl font-bold">Avaliações</h2>
                    <p class="text-muted-foreground">O que os leitores estão dizendo</p>
                </div>
                <div class="bg-gradient-to-r from-primary/20 to-accent/20 text-primary px-4 py-2 rounded-full text-sm font-semibold">
                    <?= count($avaliacoes) ?>
                </div>
            </div>

            <?php if (!empty($avaliacoes)): ?>
                <div class="space-y-6">
                    <?php foreach ($avaliacoes as $index => $avaliacao): ?>
                        <div class="bg-card/50 backdrop-blur-sm border border-border/50 rounded-2xl p-8 animate-fade-in-up" style="animation-delay: <?= $index * 0.1 ?>s;">
                            <div class="flex items-start justify-between mb-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-accent/20 rounded-full flex items-center justify-center">
                                        <i data-lucide="user" class="w-6 h-6 text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-lg"><?= $avaliacao->nome_usuario ?></p>
                                        <div class="flex items-center space-x-1 mt-1">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <i data-lucide="star" class="w-4 h-4 <?= $i <= $avaliacao->nota ? 'text-yellow-400 fill-current' : 'text-muted-foreground/40' ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-medium">
                                    <?= $avaliacao->nota ?>/5
                                </div>
                            </div>
                            <p class="text-muted-foreground leading-relaxed text-lg"><?= $avaliacao->avaliacao ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-16 bg-card/30 backdrop-blur-sm border border-border/50 rounded-2xl animate-scale-in">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary/20 to-accent/20 rounded-2xl flex items-center justify-center mx-auto mb-6 floating">
                        <i data-lucide="message-circle" class="w-10 h-10 text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Nenhuma avaliação ainda</h3>
                    <p class="text-muted-foreground text-lg">Seja o primeiro a compartilhar sua opinião sobre este livro!</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="lg:col-span-1 animate-fade-in-up" style="animation-delay: 0.3s;">
            <?php if (auth()): ?>
                <div class="bg-card/50 backdrop-blur-sm border border-border/50 rounded-2xl overflow-hidden sticky top-32">
                    <div class="bg-gradient-to-r from-primary/10 to-accent/10 border-b border-border/50 px-8 py-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-accent/20 rounded-xl flex items-center justify-center">
                                <i data-lucide="edit-3" class="w-6 h-6 text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Sua Avaliação</h3>
                                <p class="text-sm text-muted-foreground">Compartilhe sua opinião</p>
                            </div>
                        </div>
                    </div>

                    <form class="p-8 space-y-6" method="POST" action="avaliacao-criar">
                        <?php if ($validacoes = flash()->get('validacoes')): ?>
                            <div class="bg-gradient-to-r from-destructive/10 to-red-500/10 border border-destructive/20 text-destructive px-6 py-4 rounded-xl animate-scale-in">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="w-6 h-6 bg-destructive/20 rounded-full flex items-center justify-center">
                                        <i data-lucide="alert-circle" class="w-4 h-4"></i>
                                    </div>
                                    <span class="font-semibold">Erro na avaliação</span>
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

                        <input type="hidden" name="livro_id" value="<?= $livro->id ?>" />

                        <div class="space-y-3">
                            <label class="text-sm font-semibold text-foreground flex items-center space-x-2">
                                <i data-lucide="star" class="w-4 h-4 text-primary"></i>
                                <span>Sua nota</span>
                            </label>
                            <select
                                name="nota"
                                class="w-full px-4 py-3 bg-input/50 border border-border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70">
                                <option value="">Selecione uma nota</option>
                                <option value="1">⭐ 1 - Muito ruim</option>
                                <option value="2">⭐⭐ 2 - Ruim</option>
                                <option value="3">⭐⭐⭐ 3 - Regular</option>
                                <option value="4">⭐⭐⭐⭐ 4 - Bom</option>
                                <option value="5">⭐⭐⭐⭐⭐ 5 - Excelente</option>
                            </select>
                        </div>

                        <div class="space-y-3">
                            <label class="text-sm font-semibold text-foreground flex items-center space-x-2">
                                <i data-lucide="message-square" class="w-4 h-4 text-primary"></i>
                                <span>Seu comentário</span>
                            </label>
                            <textarea
                                name="avaliacao"
                                rows="6"
                                class="w-full px-4 py-3 bg-input/50 border border-border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70 resize-none"
                                placeholder="Compartilhe sua opinião sobre o livro..."></textarea>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-primary to-accent text-white py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-primary/25 transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center space-x-2">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            <span>Publicar Avaliação</span>
                        </button>
                    </form>
                </div>
            <?php else: ?>
                <div class="bg-card/50 backdrop-blur-sm border border-border/50 rounded-2xl p-8 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary/20 to-accent/20 rounded-2xl flex items-center justify-center mx-auto mb-6 floating">
                        <i data-lucide="lock" class="w-8 h-8 text-primary"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-4">Faça login para avaliar</h3>
                    <p class="text-sm text-muted-foreground mb-6 leading-relaxed">
                        Entre na sua conta para compartilhar sua opinião sobre este livro e ajudar outros leitores
                    </p>
                    <a href="/book-wise/login" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-accent text-white rounded-xl font-semibold hover:shadow-lg hover:shadow-primary/25 transition-all duration-300 transform hover:scale-105">
                        <i data-lucide="log-in" class="w-4 h-4 mr-2"></i>
                        Fazer Login
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>