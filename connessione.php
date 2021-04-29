<?php
//connessione al dbms
$connessione = mysqli_connect("localhost","root","", "centroriparazioni");
if (mysqli_connect_errno())
{
    echo "Errore di connessione a MySQL: " . mysqli_connect_error();
    exit();
}
?>
