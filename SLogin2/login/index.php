<?php
include("conexao.php");

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email'] == 0)) {
        echo ("Preecha seu e-mail");
    } else if (strlen($_POST['senha'] == 0)) {
        echo ("Preencha sua senha");
    }

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";

    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("Location:painel.php");
    } else {
        echo ("falha ao logar! E-mail ou senha incorretos");
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<link type="text/css" rel="stylesheet" href=".assets/css/style.css">

<body>
    <header>

        <h2 class="logo">logo</h2>

        <nav class="navigation">
            <a href="#">home</a>
            <a href="#">sobre</a>
            <a href="#">serviços</a>
            <a href="#">contato</a>
            <button class="btnLogin-popup">Login</button>
        </nav>
    </header>
    
    
    
    <div class="main-login">    
    <div class="left-login">
            <img src="./assets/image/image-car-ffoating.svg" class="left-login-image"  alt="animcao do carro">
        </div>
        <form name="Login" action="" method="POST">
        <div class="right-login">
            <div class="card-login">
           
                <div class="textfield">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="email" placeholder="Usuário">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="text" name="senha" placeholder="senha">
                </div>
                <button class="btn-login"  type="submit" name="entrar" > Login </button>
                <p>Não tem uma conta? <a class="btn-register" href="./registro.php">Criar uma nova conta</a></p>
            </div>
        </div>
    </div>               
    </form>

   
    <!-- css -->

    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
       
      }
     
      header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 20px 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 99;
        
        opacity: 70%;
    }

    .logo {
        font-size: 2em;
        color: #fff;
        user-select: none;
        margin-right: 80px;


    }
.navigation a {
        position: relative;
        font-size: 1.1em;
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        margin-left: 30px;
    }

    .navigation a::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 3px;
        background: #fff;
        border-radius: 5px;
        transform-origin: right;
        transform: scaleX(0);
        transition: transform .5s;
    }

    .navigation a:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    .navigation .btnLogin-popup {
        width: 130px;
        height: 50px;
        background: transparent;
        border: 2px solid #fff;
        outline: none;
        border-radius: 6px;
        cursor: pointer;
        color: #fff;
        font-size: 1.1em;
        font-weight: 500;
        margin-left: 40px;
        transition: 0.5s;
    }

    .navigation .btnLogin-popup:hover {
        background: #fff;
        color: #ffffff;
    }
    @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200&family=Noto+Sans:wght@400;700&display=swap');

body{
    background: #2C3A40;
    margin: 0;
    font-family: 'Noto Sans', sans-serif;
}

.main-login{
    width: 100vw;
    height: 100vh;
    
    display: flex;
    justify-content: center;
    align-items: center;
}

.left-login{
    width: 50vw;
    height: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.left-login > h1{
    margin-left: 50px;
    font-size: 3vw;
    color: #F56643;
}

.left-login-image { 
 width: 35vw;
 margin-left: 150px;
}

.right-login{
    width: 50vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-login{
    width: 60%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 30px 35px;
    background:#2D5E73;
    border-radius:20px;
    box-shadow: 0px 10px 40px #0e0503 ;
}

.card-title > h1{
    color: ;
    font-weight: 800;
    margin: 0;
}

.textfield{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    margin: 10px 0px;
}

.textfield > input{
    width: 100%;
    border: none;
    border-radius: 10px;
    padding: 15px;
    background: #9DCEE3;
    color: #f0ffffde;
    font-size: 12pt;
    box-shadow: 0px 10px 40px #0e0503;
    outline: none;
    box-sizing: border-box;
}

.textfield > label{
    color: #f0ffffde;
    margin-bottom: 10px;
}

.textfield > input::placeholder{
    color: #f0ffff94;
}
.btn-login{
    width: 100%;
    padding: 16px 0px;
    margin: 35px;
    border: none;
    border-radius: 8px;
    outline: none;
    text-transform: uppercase;
    font-weight: 800;
    letter-spacing: 3px;
    color:#D94343;
    background: #57B5DE;
    cursor: pointer;
    box-shadow: 0px 10px 40px -12px #000000;
     cursor: pointer;
  transition: background-color 0.3s ease;
}
.btn-login:hover{
    background: #D94343;
    color: white;
    transition: 0.1s;
    
}
.btn-register{
    
    color: white;
    cursor: pointer;
    transition: 0.3s ease;
}
.btn-register:hover{
color: #D94343;
transition: 0.1s;
}

@media only screen and (max-width:950){

.card-login{
    width: 85%;
}


}

@media only screen and (max-width:950){






    
}
    </style>

</body>

</html>