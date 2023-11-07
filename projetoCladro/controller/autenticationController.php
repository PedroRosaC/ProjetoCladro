<?php
session_start();
//Se não existir a session login
if(!isset($_SESSION['login'])){
    header('location:./index.php?cod=172');
}