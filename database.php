<?php
class DB
{
    #region // Conexão com o banco de dados
    private $db;
    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "book-wise";
        $port = 3306;
        $this->db = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    }
    #endregion
    /**
     * Retorna todos os livros do banco de dados
     *
     * @return array[Livro]
     */
    public function livros() {
        $query = $this->db->query("select * from livros");
        $items = $query->fetchAll();
        return array_map(fn($item) => Livro::make($item), $items);
    }

    public function livro($id) {
        $sql = "SELECT * FROM livros WHERE id = " . $id;
        $query = $this->db->query($sql);
        $items = $query->fetchAll();
        return array_map(fn($item) => Livro::make($item), $items)[0];
    }
}
