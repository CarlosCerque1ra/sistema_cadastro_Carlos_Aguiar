<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $usuario = $_POST['usuario'];
    $senha = md5 ($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } else{
        $error = "Usuario ou senha invalidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="container" style="width: 400px">
        <h2>Login</h2>
        <form method="post" action="">
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" require>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" require>
            <button type="submit" style="margin_bottom: 30px;">Entrar</button>
            <?php if (isset($error)) echo "<p class='message error'>$error</p>"; ?>
        </form>

    </div>
</body>
</html>