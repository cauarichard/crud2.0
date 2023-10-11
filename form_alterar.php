<?php

  include_once('conexao.php');

  if(!isset($_GET["id"]))               # Verifica se a chave 'id' existe no array GET
    header("location: index.php");      # Caso não exista, volta pro index

  if($_GET["id"]=="")
    header("location: index.php");

  $id = $_GET["id"];
  echo $id;

  $sql = "SELECT pk_carro, nome, modelo, ano_fabricacao, combustivel, preco FROM carro WHERE pk_carro=" . $id;
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($query);

  

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD - Update</title> 
</head>
<body>
    <div class="container">
        <h1>Veja os dados abaixo, e altere o que desejar</h1>

        <form action="alterar.php" method="post">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" aria-describedby="Nome" name="nome" value="<?php echo $row["nome"] ?>">
              <input type="hidden" name="id" value="<?php echo $row['pk_carro']; ?>">
            </div>
            <div class="mb-3">
              <label for="modelo" class="form-label">Modelo</label>
              <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $row["modelo"] ?>">
            </div>
            <div class="mb-3">
              <label for="ano_fabricacao" class="form-label">Ano</label>
              <input type="text" class="form-control" id="ano_fabricacao" name="ano_fabricacao" value="<?php echo $row["ano_fabricacao"] ?>">
            </div>
            <div class="mb-3">
              <label for="combustivel" class="form-label">Combustivel</label>
              <select name="combustivel" id="combustivel" class="form-select">
                <option value="gasolina" <?php echo $row["combustivel"]=="gasolina" ? "selected" : ""; ?>>Gasolina</option>
                <option value="flex" <?php echo $row["combustivel"]=="flex" ? "selected" : ""; ?>>Flex</option>
                <option value="diesel" <?php echo $row["combustivel"]=="diesel" ? "selected" : ""; ?>>Diesel</option>
                <option value="eletrico" <?php echo $row["combustivel"]=="eletrico" ? "selected" : ""; ?>>Elétrico</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="preco" class="form-label">Preço</label>
              <input type="text" class="form-control" id="preco" name="preco"  value="<?php echo $row["preco"] ?>">
            </div>

            <button type="submit" class="btn btn-primary">ENVIAR</button>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>