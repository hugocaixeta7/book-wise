<?php

$id = $_GET['id'] ?? null;

if (!$id) {
    abort(404);
}

$livro = Livro::get($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagem = $livro->imagem; 

    if (!empty($_FILES['imagem']['name'])) {
        $uploadDir = __DIR__ . "/../public/images/";
        $nomeArquivo = uniqid() . "-" . basename($_FILES['imagem']['name']);
        $caminhoFinal = $uploadDir . $nomeArquivo;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoFinal)) {
            if ($livro->imagem && file_exists($uploadDir . basename($livro->imagem))) {
                unlink($uploadDir . basename($livro->imagem));
            }

            $imagem = "public/images/" . $nomeArquivo;
        }
    }

    $dados = [
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'descricao' => $_POST['descricao'],
        'ano_de_lancamento' => $_POST['ano_de_lancamento'],
        'imagem' => $imagem
    ];

    Livro::update($id, $dados);

    header("Location: /book-wise/meus-livros");
    exit;
}

require $ROOT . '/views/editar_livro.view.php';
