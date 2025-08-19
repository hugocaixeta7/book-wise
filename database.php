<?php

class DB {
    /**
     * Retorna todos os livros do banco de dados
     *
     * @return array[Livro]
     */
    public function livros() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "book-wise";
        $port = 3306;
        $db = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

        $query = $db->query("select * from livros");
        $items = $query->fetchAll();
        $retorno = [];

        foreach ($items as $item) {
            $livro = new Livro;
            $livro->id = $item['id'];
            $livro->titulo = $item['titulo'];
            $livro->autor = $item['autor'];
            $livro->descricao = $item['descricao'];
            $retorno [] = $livro;
        }

        return $retorno;
    }
}