<?php

if(!auth()) {
    header('location: /book-wise');
    exit();
}

$livros = Livro::meus(auth()->id);

if (isset($_POST['delete_livro'])) {
    $livro_id = $_POST['delete_livro'];
    Livro::deletar($livro_id);
    header('Location: /book-wise/meus-livros');
    exit();
}

view('meus-livros', compact('livros'));