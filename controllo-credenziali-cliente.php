<?php
if($_SESSION['username_cliente']=='')
{
    header("Location: html/403-forbidden.html");
    die;
}
?>