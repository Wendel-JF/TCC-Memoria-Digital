<?php 
session_start();
//print_r($_REQUEST);
if(isset($_POST['botao']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
    //Acessa
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //print_r('EMAIL: ' . $email);
    //print_r('<br>');
    //print_r('Senha: ' . $senha);

    $sql = "SELECT * FROM contas WHERE email = '$email' and senha = '$senha' ";
    $result = $conexao->query($sql);

   // print_r($sql);
   // print_r($result);

   if(mysqli_num_rows($result)<1) {
       unset($_SESSION['email']);
       unset($_SESSION['senha']);
    header('Location: formulario.php');
   } else {
       $_SESSION['email'] = $email;
       $_SESSION['senha'] = $senha;
       header('Location: home.php');
   }
} else {
    // Não acessa site
    print_r("Essa conta não foi encontrada");
}
