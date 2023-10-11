<?php

    include_once("conexao.php");

    if(!isset($_POST["nome"]))
        header("location: index.php");

    $nome = $_POST["nome"];
    $modelo = $_POST["modelo"];
    $ano = $_POST["ano_fabricacao"];
    $combustivel = $_POST["combustivel"];
    $preco = $_POST["preco"];

    $sql = "INSERT INTO carro (nome, modelo, ano_fabricacao, combustivel, preco) VALUES('$nome', '$modelo', '$ano_fabricacao', '$combustivel', $preco)";
    mysqli_query($conn, $sql);
    if(mysqli_error($conn)=="")
        header("location: index.php");

?>