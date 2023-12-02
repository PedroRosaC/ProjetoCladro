<?php
session_start();
//Se não existir a session login
if(!isset($_SESSION['login'])){
    header('location:./login.php?cod=172');
}