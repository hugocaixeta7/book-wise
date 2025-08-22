<?php
$mensagem = $_REQUEST['mensagem'] ?? '';

// 1. Receber o formulário com email e senha
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $validacao = Validacao::validar([ 
        'email' => ['required', 'email'],
        'senha' => ['required']
    ], $_POST);

    if($validacao->naoPassou()) {
        header('location: login');
        exit();
    }

    // 2. Fazer uma consulta no banco de dados com email e senha
    $usuario = $database->query(
        query: "select * from usuarios where email = :email and senha = :senha",
        params: compact('email', 'senha')
    )
        ->fetch();

    if ($usuario) {
        // 3. se existir nós vamos adicionar na sessão que o usúario está autenticado
        $_SESSION['auth'] = $usuario;
        $_SESSION['mensagem'] = 'Seja bem vindo ' . $usuario->nome . '!';
        header('location: /book-wise');
        exit();
    }
    // 4. Mudar a informação no nosso navbar pra mostrar o nome do usuário (no app.php)
}

view('login', compact('mensagem'));
