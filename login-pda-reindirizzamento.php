<?php
session_start();
require ('connessione.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT username, password, nome FROM pda WHERE username='$username' AND password='$password'";
$result = mysqli_query($connessione, $query);

if (mysqli_num_rows($result) != 0)
{
    $row = mysqli_fetch_array($result);

    $_SESSION['username_pda'] = $username;
    $_SESSION['nome_pda'] = $row['nome'];
    header("Location: dashboard-pda.php");
}
else
{
    echo "Nome utente e/o password incorretti.";
    ?>
    <form action="login-pda.php">
        <button class="btn btn-primary">Torna al Login</button>
    </form>
<?php
}
mysqli_close($connessione);
?>