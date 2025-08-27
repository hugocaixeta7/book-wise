<?php

$livro = Livro::get($_GET['id']);

$avaliacoes = $database
    ->query("
        SELECT a.*, u.nome AS nome_usuario
        FROM avaliacoes a
        JOIN usuarios u ON u.id = a.usuario_id
        WHERE a.livro_id = :id
    ", Avaliacao::class, ['id' => $_GET['id']])
    ->fetchAll();

view('livro', compact('livro', 'avaliacoes'));

