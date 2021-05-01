<?php
session_start();
require ('connessione.php');
$id_ticket = $_POST['id_ticket'];

$query = "SELECT id_dispositivo FROM ticket_intervento WHERE id='$id_ticket'";
$result = mysqli_query($connessione, $query);
$row = mysqli_fetch_array($result);

$query = "DELETE FROM ticket_intervento WHERE id='$id_ticket'";
$result = mysqli_query($connessione, $query);

$query = "DELETE FROM dispositivo WHERE id='{$row[0]}'";
$result = mysqli_query($connessione, $query);

header("Location: dashboard-cliente.php");

mysqli_close($connessione);
