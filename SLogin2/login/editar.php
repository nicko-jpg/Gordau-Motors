<?php
include("conexao.php");

$id     =   $_POST['id'];
$buscaCadastro  =   "SELECT * FROM tbclientes WHERE id='$id'";
$queryCadastro  =   mysqli_query($mysqli, $buscaCadastro);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Editar Cientes</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>Email</th>
                    <th>Celular</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Obter uma linha da tabela do banco de dados
                while ($linha = mysqli_fetch_array(($queryCadastro))) {
                    $id         =   $linha['id'];
                    $nome       =   $linha['nome'];
                    $email      =   $linha['email'];
                    $celular    =   $linha['celular'];
                }
                ?>


                <form name="sedicao" action="Sedicao.php" method="POST">
                    <td><input type="text" class="form-control" name="id" maxlength="10" value="<?php echo $id; ?>"></td>
                    <td><input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>"></td>
                    <td><input type="text" class="form-control" name="email" value="<?php echo $email; ?>"></td>
                    <td><input type="text" class="form-control" name="celular" value="<?php echo $celular; ?>"></td>
                    <td>
                        <button type="submit" class="btn btn-success">Atualizar</button>
                    </td>

                </form>
                

        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>