<?php

class DB {
    public function livros() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "book-wise";
        $port = 3306;
        $db = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

        $query = "SELECT * FROM livros";
        $livros = $db->prepare($query);
        $livros->execute();
        return $livros->fetchAll();
    }
}