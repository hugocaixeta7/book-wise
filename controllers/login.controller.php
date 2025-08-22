<?php
// 1. Receber o formulário com email e senha
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $validacao = Validacao::validar([ 
        'email' => ['required', 'email'],
        'senha' => ['required']
    ], $_POST);

    if($validacao->naoPassou('login')) {
        header('location: login');
        exit();
    }

    // 2. Fazer uma consulta no banco de dados com email e senha
    $usuario = $database->query(
        query: "select * from usuarios where email = :email",
        params: compact('email')
    )
        ->fetch();

    if ($usuario) {
        // validar a senha
        if(! password_verify($_POST['senha'], $usuario->senha)) {
            flash()->push('validacoes_login', ['Usuário ou senha estão incorretos!']);
            header('location: login');
            exit();
        }
        // 3. se existir nós vamos adicionar na sessão que o usúario está autenticado
        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', 'Seja bem vindo ' . $usuario->nome . '!');
        header('location: /book-wise');
        exit();
    }
}

view('login');
