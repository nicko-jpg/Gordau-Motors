<?php
include("conexao.php");

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    if (empty($email)) {
        echo "Preencha seu e-mail";
    } elseif (empty($senha)) {
        echo "Preencha sua senha";
    } else {
        // Verifique se o email já está registrado
        $check_email = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $mysqli->query($check_email);
        if ($result->num_rows > 0) {
            echo "Este e-mail já está registrado. Tente outro.";
        } else {
            // Inserir novo usuário no banco de dados
            $inserir_usuario = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";
            if ($mysqli->query($inserir_usuario) === TRUE) {
                echo "Registro bem-sucedido! Você pode fazer login agora.";
            } else {
                echo "Erro ao registrar o usuário: " . $mysqli->error;
            }
            header("location:index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
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





<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Novo Usuário</title>
</head>

<body>
<div class="main-login">    
    <div class="left-login">
            <img src="./assets/image/car-accesories-animate.svg" class="left-login-image"  alt="animcao do carro">
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
                <button class="btn-login"  type="submit" name="entrar" > Registre-se </button>
                <p>Já possui uma conta?<a class="btn-register" href="./index.php"> Faça login!</a></p>
            </div>
        </div>
    </div>               
    </form>

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200&family=Noto+Sans:wght@400;700&display=swap');
      
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Noto Sans', sans-serif;
       
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
    margin: 0;
    font-family: 'Noto Sans', sans-serif;
}

.main-login{
    width: 100vw;
    height: 100vh;
    background: #250f0a;
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
    background: #F56643;
    border-radius:20px;
    box-shadow: 0px 10px 40px #0e0503 ;
}

.card-title > h1{
    color: #F56643;
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
    background: #FFA791;
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
    color: #FFA791;
    background: #F56643;
    cursor: pointer;
    box-shadow: 0px 10px 40px -12px #000000;
}
.btn-login:hover{
    background:  #FFA791;
    color: white;
    transition: 0.1s;
    
}
.btn-register{
    
    color: white;
    cursor: pointer;
    transition: 0.3s ease;
}
.btn-register:hover{
color: #FFA791;
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