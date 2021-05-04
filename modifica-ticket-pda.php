<?php
session_start();
require ('controllo-credenziali-pda.php');
require ('connessione.php');
$id_ticket = $_POST['id_ticket'];
$data_fine_stimata = $_POST['data_fine_stimata'];
$descrizione_problema = $_POST['descrizione_problema'];
$prezzo = $_POST['prezzo'];
$stato_ticket = $_POST['stato_ticket'];

if($stato_ticket == 0)
{
    $query = "UPDATE ticket_intervento SET data_fine_stimata='',descrizione_problema='$descrizione_problema',prezzo='',id_stato_intervento=$stato_ticket WHERE id='$id_ticket'";
} else {
    $query = "UPDATE ticket_intervento SET data_fine_stimata='$data_fine_stimata',descrizione_problema='$descrizione_problema',prezzo='$prezzo',id_stato_intervento=$stato_ticket WHERE id='$id_ticket'";
}

$result = mysqli_query($connessione, $query);

header("Location: dashboard-pda.php");

mysqli_close($connessione);
