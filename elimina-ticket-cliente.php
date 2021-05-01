<?php
session_start();
require ('connessione.php');
$id_ticket = $_POST['id_ticket'];

$query = "DELETE FROM ticket_intervento WHERE id='$id_ticket'";
$result = mysqli_query($connessione, $query);

header("Location: dashboard-cliente.php");

mysqli_close($connessione);
