<?php 

session_start();


// Variável autenticação
$autenticarUsuario = false;


$usuariosApp = array(
    array('email' => 'adm@teste.com.br', 'senha' => '123456'),
    array('email' => 'user@teste.com.br', 'senha' => 'abcdef')
);


foreach ($usuariosApp as $user) {
   if ($user["email"] == $_POST["email"] && $user["senha"] == $_POST["senha"]) {
        $autenticarUsuario = true;
   }
}

if ($autenticarUsuario) {
    echo "Usuário autenticado !";
    $_SESSION['autenticado'] = "SIM";
    header("Location: home.php");
} else {
    $_SESSION['autenticado'] = "NAO";
    header("Location: index.php?login=erro");
}



?>