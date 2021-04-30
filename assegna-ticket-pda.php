<?php
session_start();
require ('connessione.php');
$id_ticket = $_POST['id_ticket'];

$query = "UPDATE ticket_intervento SET id_stato_intervento=1 WHERE id='$id_ticket'";
$result = mysqli_query($connessione, $query);

header("Location: dashboard-pda.php");

mysqli_close($connessione);
