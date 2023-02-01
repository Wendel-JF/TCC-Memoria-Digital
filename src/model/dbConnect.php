<?php 

$serverHost = 'localhost';
$dbUsername = 'root';
$password = '';
$database = 'cadastro';
$port = 3307;

$conexao = new mysqli($serverHost,$dbUsername,$password,$database,$port) or die("Não Conectado");

