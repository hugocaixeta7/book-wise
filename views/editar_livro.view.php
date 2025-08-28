<?php

if (!isset($_GET['id'])) {
  die("Livro não encontrado.");
}

$livro = Livro::get($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $dados = [
    'titulo' => $_POST['titulo'],
    'autor' => $_POST['autor'],
    'descricao' => $_POST['descricao'],
    'ano_de_lancamento' => $_POST['ano_de_lancamento'],
    'imagem' => $_POST['imagem'] ?? $livro->imagem
  ];

  Livro::update($_GET['id'], $dados);
  header("Location: /book-wise/meus-livros");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Livro</title>
  <script src="https://kit.fontawesome.com/4e5f53d7d4.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-neutral-950 text-white flex items-center justify-center min-h-screen">

  <div class="w-full max-w-lg bg-neutral-900 p-8 rounded-2xl shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Editar Livro</h1>

    <form method="POST" enctype="multipart/form-data" class="space-y-6">
    <div>
        <label class="block text-sm font-medium mb-1">Título</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($livro->titulo) ?>" 
            class="w-full px-3 py-2 rounded-md bg-neutral-900 border border-neutral-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Autor</label>
        <input type="text" name="autor" value="<?= htmlspecialchars($livro->autor) ?>" 
            class="w-full px-3 py-2 rounded-md bg-neutral-900 border border-neutral-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Descrição</label>
        <textarea name="descricao" rows="4" 
            class="w-full px-3 py-2 rounded-md bg-neutral-900 border border-neutral-700 focus:outline-none focus:ring-2 focus:ring-violet-500"><?= htmlspecialchars($livro->descricao) ?></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Ano de Lançamento</label>
        <input type="number" name="ano_de_lancamento" value="<?= htmlspecialchars($livro->ano_de_lancamento) ?>" 
            class="w-full px-3 py-2 rounded-md bg-neutral-900 border border-neutral-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Capa (opcional)</label>
        <input type="file" name="imagem" accept="image/*" id="inputImagem"
            class="w-full text-sm text-neutral-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 
                   file:text-sm file:font-semibold file:bg-violet-600 file:text-white hover:file:bg-violet-700">
    </div>

    <div class="flex justify-center">
        <img id="previewImagem" 
             src="/book-wise/<?= htmlspecialchars($livro->imagem) ?>" 
             alt="Capa do livro" 
             class="max-h-64 rounded-md shadow">
    </div>

    <div class="flex justify-between">
        <a href="/book-wise/meus-livros" 
           class="bg-neutral-800 text-white px-4 py-2 rounded-md shadow hover:bg-neutral-700 transition">
           Cancelar
        </a>
        <button type="submit" 
                class="bg-violet-600 text-white px-4 py-2 rounded-md shadow hover:bg-violet-700 transition">
            Salvar Alterações
        </button>
    </div>
</form>

<script>
    const inputImagem = document.getElementById('inputImagem');
    const previewImagem = document.getElementById('previewImagem');

    inputImagem.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            previewImagem.src = URL.createObjectURL(file);
        }
    });
</script>
