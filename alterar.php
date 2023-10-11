<?php

    include_once("conexao.php");

    if(!isset($_POST["id"]))
        header("location: index.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $modelo = $_POST["modelo"];
    $ano_fabricacao = $_POST["ano_fabricacao"];
    $combustivel = $_POST["combustivel"];
    $preco = $_POST["preco"];

    $sql = "UPDATE carro SET nome = '$nome', modelo = '$modelo', ano_fabricacao = $ano_fabricacao, combustivel ='$combustivel', preco = '$preco' WHERE pk_carro = $id";

    mysqli_query($conn, $sql);

    if(mysqli_error($conn)=="")
        header("location: index.php");

?>