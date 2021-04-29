<?php
require ('connessione.php');

if(isset($_POST['tipo-account']))
{
    $tipologia = $_POST['tipo-account'];

    switch ($tipologia)
    {
        case 'pda':
            header("Location: registrazione-modulo-pda.php");
            break;
        case 'cliente':
            header("Location: registrazione-modulo-cliente.php");
            break;
    }
}
else if(isset($_POST['pda']))
{
    $nome_pda = $_POST['nome_pda'];
    $citta_pda = $_POST['citta_pda'];
    $username_pda = $_POST['username'];
    $password_pda = $_POST['password'];

    $query = "SELECT username FROM pda WHERE username='$username_pda'";
    $result = mysqli_query($connessione, $query);

    if (mysqli_num_rows($result) != 0)
    {
        echo "PDA già esistente";
    }
    else
    {
        $query = "INSERT INTO pda VALUES ('$username_pda','$password_pda','$nome_pda','$citta_pda')";
        $result = mysqli_query($connessione, $query);
        echo "Registrazione effettuata con successo! Ora verrai reindirizzato alla pagina di login per effettuare l'accesso.";
        header("refresh:3;url=login-pda.php");
    }
}
else {
    $nome_cliente = $_POST['nome_cliente'];
    $cognome_cliente = $_POST['cognome_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $username_cliente = $_POST['username'];
    $password_cliente = $_POST['password'];

    $query = "SELECT username FROM cliente WHERE username='$username_cliente'";
    $result = mysqli_query($connessione, $query);

    if (mysqli_num_rows($result) != 0)
    {
        echo "Cliente già esistente";
    }
    else
    {
        $query = "INSERT INTO cliente VALUES ('$username_cliente','$password_cliente','$nome_cliente','$cognome_cliente','$telefono_cliente','$email_cliente')";
        $result = mysqli_query($connessione, $query);
        echo "Registrazione effettuata con successo! Ora verrai reindirizzato alla pagina di login per effettuare l'accesso.";
        header("refresh:3;url=login-cliente.php");
    }
}

mysqli_close($connessione);
?>