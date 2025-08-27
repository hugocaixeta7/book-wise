<?php

class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $senha;

    public static function buscarNomePorId($id)
    {
        $database = new Database(config('database'));
        return $database
            ->query("SELECT nome FROM usuarios WHERE id = :id", null, ['id' => $id])
            ->fetch();
    }
}
