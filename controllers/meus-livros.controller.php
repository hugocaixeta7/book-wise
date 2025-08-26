<?php

if(!auth()) {
    header('location: /book-wise');
    exit();
}

$livros = Livro::meus(auth()->id);

view('meus-livros', compact('livros'));