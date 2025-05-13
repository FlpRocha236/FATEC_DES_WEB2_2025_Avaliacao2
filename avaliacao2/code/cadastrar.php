<?php
require_once('classes/login.php');
require_once('classes/DB.php');

$validador = new Login();
$validador->verificar_logado();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new DB();
    $db->cadastrarProduto($_POST['nome'], $_POST['preco'], $_POST['descricao'], $_POST['categoria']);
    echo "<p>Produto cadastrado com sucesso!</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto - Lojinha</title>
    <style>
        /* Estilos semelhantes aos de home.php */
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6c63ff;
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        main {
            padding: 40px;
            text-align: center;
        }

        .btn-container {
            margin-top: 30px;
        }

        a.button {
            display: inline-block;
            padding: 12px 24px;
            margin: 10px;
            background-color: #6c63ff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #4e47d4;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #777;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<header>
        <h1>Cadastro de Produto</h1>
    </header>

    <main>
        <div class="form-container">
            <h3>Cadastrar Produto</h3>

            <form method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="preco">Preço:</label>
                <input type="number" id="preco" name="preco" step="0.01" required>

                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao">

                <label for="categoria">Categoria:</label>
                <input type="text" id="categoria" name="categoria" required>

                <button type="submit">Cadastrar</button>
            </form>

           <div class="btn-container">
             <a href="home.php" class="button">Voltar à Home</a>
           </div>
        </div>
    </main>


</body>
</html>