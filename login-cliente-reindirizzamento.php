<?php
session_start();
require ('connessione.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT username, password, nome, cognome FROM cliente WHERE username='$username' AND password='$password'";
$result = mysqli_query($connessione, $query);

if (mysqli_num_rows($result) != 0)
{
    $row = mysqli_fetch_array($result);

    $_SESSION['username_cliente'] = $username;
    $_SESSION['nome_cliente'] = $row['nome'];
    $_SESSION['cognome_cliente'] = $row['cognome'];
    header("Location: dashboard-cliente.php");
}
else
{
    include 'html/login-cliente-pagina-errore.html';
}
mysqli_close($connessione);
?>