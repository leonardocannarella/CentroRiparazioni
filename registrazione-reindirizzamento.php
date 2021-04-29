<?php
$tipologia = $_POST['tipo-account'];

switch ($tipologia)
{
    case "pda":
        header("Location: registrazione-modulo-pda.php");
        break;
    case "cliente":
        header("Location: registrazione-modulo-cliente.php");
        break;
}
?>