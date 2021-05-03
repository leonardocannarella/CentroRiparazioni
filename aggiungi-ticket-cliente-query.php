<?php
session_start();
require ('connessione.php');

$username_cliente = $_SESSION['username_cliente'];
$data_invio_richiesta = date("Y/m/d");
$marca = $_POST['marca'];
$modello = $_POST['modello'];
$tipologia_dispositivo = $_POST['tipologia_dispositivo'];
$centro_assistenza = $_POST['centro_assistenza'];
$descrizione_problema = $_POST['descrizione_problema'];
$stato_ticket = 0;

$query1 = "INSERT INTO dispositivo VALUES ('','$marca','$modello','$tipologia_dispositivo','$username_cliente')";
$result1 = mysqli_query($connessione, $query1);
mysqli_close($connessione);

require ('connessione.php');
$query1 = "SELECT id FROM dispositivo WHERE id_cliente='$username_cliente' ORDER BY id DESC";
$result1 = mysqli_query($connessione, $query1);
$row1 = mysqli_fetch_array($result1);
mysqli_close($connessione);

require ('connessione.php');
$query2 = "INSERT INTO ticket_intervento VALUES ('','$descrizione_problema','$data_invio_richiesta','','','$centro_assistenza','$row1[0]','0')";
$result2 = mysqli_query($connessione, $query2);
mysqli_close($connessione);

header("Location: dashboard-cliente.php");

mysqli_close($connessione);
