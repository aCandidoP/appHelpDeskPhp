<?php 

session_start();


// Variável autenticação
$id_usuario = null;
$autenticarUsuario = false;
$perfis = array(1 => 'administrativo', 2 => 'usuario');


$usuariosApp = array(
    array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123', 'id_perfil' => 1),
    array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '123', 'id_perfil' => 1),
    array('id' => 3, 'email' => 'rogerio@teste.com.br', 'senha' => '123', 'id_perfil' => 2),
    array('id' => 4, 'email' => 'lara@teste.com.br', 'senha' => '123', 'id_perfil' => 2)
);


foreach ($usuariosApp as $user) {
   if ($user["email"] == $_POST["email"] && $user["senha"] == $_POST["senha"]) {
        $autenticarUsuario = true;
        $id_usuario = $user['id'];
        $id_perfil = $user['id_perfil'];
   }
}

if ($autenticarUsuario) {
    echo "Usuário autenticado !";
    $_SESSION['autenticado'] = "SIM";
    $_SESSION['id'] = $id_usuario;
    $_SESSION['id_perfil'] = $id_perfil;
    header("Location: home.php");
} else {
    $_SESSION['autenticado'] = "NAO";
    header("Location: index.php?login=erro");
}



?>