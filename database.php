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
    public function livros($pesquisa = '') {
        $prepare = $this->db->prepare("select * from livros where usuario_id = 1 and titulo like :pesquisa");
        $prepare->bindValue(':pesquisa', "%$pesquisa%");
        $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        $prepare->execute();        
        return $prepare->fetchAll();
    }

    public function livro($id) {
        $prepare = $this->db->prepare("select * from livros where id = :id");
        $prepare->bindValue('id', $id);
        $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        $prepare->execute();        
        return $prepare->fetch();
    }
}
