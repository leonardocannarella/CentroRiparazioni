<?php
session_start();
require ('controllo-credenziali-cliente.php');
require ('connessione.php');
$id_ticket = $_POST['id_ticket'];
$marca = $_POST['marca'];
$modello = $_POST['modello'];
$descrizione_problema = $_POST['descrizione_problema'];

$query = "  SELECT d.id 
            FROM ticket_intervento as t, dispositivo as d 
            WHERE t.id_dispositivo = d.id
            AND t.id = '$id_ticket'";
$result = mysqli_query($connessione, $query);
$row = mysqli_fetch_array($result);

$query = "UPDATE dispositivo SET marca='$marca', modello='$modello' WHERE id = '{$row[0]}'";
$result = mysqli_query($connessione, $query);

$query1 = "UPDATE ticket_intervento SET data_fine_stimata='', descrizione_problema='$descrizione_problema',prezzo='',id_stato_intervento=0 WHERE id='$id_ticket'";

$result1 = mysqli_query($connessione, $query1);

header("Location: dashboard-cliente.php");

mysqli_close($connessione);
