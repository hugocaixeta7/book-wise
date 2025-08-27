<div class="mb-12 animate-fade-in-up">
    <div class="flex items-center space-x-4 mb-6">
        <div class="w-16 h-16 bg-gradient-to-br from-primary to-accent rounded-2xl flex items-center justify-center">
            <i data-lucide="library" class="w-8 h-8 text-white"></i>
        </div>
        <div>
            <h1 class="text-4xl font-bold gradient-text">Minha Biblioteca</h1>
            <p class="text-muted-foreground text-lg">Gerencie sua coleção pessoal de livros</p>
        </div>
    </div>
</div>

<div class="grid lg:grid-cols-4 gap-12">
    <div class="lg:col-span-3">
        <?php if (!empty($livros)): ?>
            <div class="grid gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($livros as $index => $livro): ?>
                    <div class="animate-fade-in-up" style="animation-delay: <?= $index * 0.1 ?>s;">
                        <?php require 'partials/_livro.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-24 bg-card/30 backdrop-blur-sm border border-border/50 rounded-2xl animate-scale-in">
                <div class="w-24 h-24 bg-gradient-to-br from-primary/20 to-accent/20 rounded-2xl flex items-center justify-center mx-auto mb-8 floating">
                    <i data-lucide="book-plus" class="w-12 h-12 text-primary"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Sua biblioteca está vazia</h3>
                <p class="text-muted-foreground text-lg mb-8 max-w-md mx-auto">
                    Adicione seu primeiro livro usando o formulário ao lado e comece a construir sua coleção digital
                </p>
                <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-accent text-white rounded-xl font-semibold">
                    <i data-lucide="arrow-right" class="w-5 h-5 mr-2"></i>
                    Use o formulário ao lado
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="lg:col-span-1 animate-slide-in-left" style="animation-delay: 0.3s;">
        <div class="bg-card/50 backdrop-blur-sm border border-border/50 rounded-2xl overflow-hidden sticky top-32">
            <div class="bg-gradient-to-r from-primary/10 to-accent/10 border-b border-border/50 px-8 py-6">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-accent/20 rounded-xl flex items-center justify-center">
                        <i data-lucide="plus" class="w-6 h-6 text-primary"></i>
                    </div>
                    <div>
                        <h2 class="font-bold text-xl">Adicionar Livro</h2>
                        <p class="text-sm text-muted-foreground">Expanda sua biblioteca</p>
                    </div>
                </div>
            </div>

            <form class="p-8 space-y-6" method="POST" action="livro-criar" enctype="multipart/form-data">
                <?php if ($validacoes = flash()->get('validacoes')): ?>
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
                    <label class="text-sm font-semibold text-foreground flex items-center space-x-2">
                        <i data-lucide="image" class="w-4 h-4 text-primary"></i>
                        <span>Capa do Livro</span>
                    </label>
                    <div class="relative group">
                        <input
                            type="file"
                            name="imagem"
                            accept="image/*"
                            class="w-full px-4 py-3 bg-input/50 border border-border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gradient-to-r file:from-primary file:to-accent file:text-white file:text-sm file:font-medium file:cursor-pointer" />
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="text-sm font-semibold text-foreground flex items-center space-x-2">
                        <i data-lucide="book" class="w-4 h-4 text-primary"></i>
                        <span>Título</span>
                    </label>
                    <input
                        type="text"
                        name="titulo"
                        class="w-full px-4 py-3 bg-input/50 border border-border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70"
                        placeholder="Digite o título do livro" />
                </div>

                <div class="space-y-3">
                    <label class="text-sm font-semibold text-foreground flex items-center space-x-2">
                        <i data-lucide="user" class="w-4 h-4 text-primary"></i>
                        <span>Autor</span>
                    </label>
                    <input
                        type="text"
                        name="autor"
                        class="w-full px-4 py-3 bg-input/50 border border-border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70"
                        placeholder="Nome do autor" />
                </div>

                <div class="space-y-3">
                    <label class="text-sm font-semibold text-foreground flex items-center space-x-2">
                        <i data-lucide="file-text" class="w-4 h-4 text-primary"></i>
                        <span>Descrição</span>
                    </label>
                    <textarea
                        name="descricao"
                        rows="4"
                        class="w-full px-4 py-3 bg-input/50 border border-border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70 resize-none"
                        placeholder="Descreva o livro..."></textarea>
                </div>

                <div class="space-y-3">
                    <label class="text-sm font-semibold text-foreground flex items-center space-x-2">
                        <i data-lucide="calendar" class="w-4 h-4 text-primary"></i>
                        <span>Ano de Lançamento</span>
                    </label>
                    <select
                        name="ano_de_lancamento"
                        class="w-full px-4 py-3 bg-input/50 border border-border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-300 hover:bg-input/70">
                        <option value="">Selecione o ano</option>
                        <?php foreach (array_reverse(range(1800, date('Y'))) as $ano): ?>
                            <option value="<?= $ano ?>"><?= $ano ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-primary to-accent text-white py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-primary/25 transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center space-x-2">
                    <i data-lucide="save" class="w-5 h-5"></i>
                    <span>Salvar Livro</span>
                </button>
            </form>
        </div>
    </div>
</div>
