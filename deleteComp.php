<?php
require_once('pdo.php');
include_once ('function.php');
include ('head.php');

session_start();

$id=$_GET['id'];
deleteComp($pdo,$id);
header('Location:session.php');
