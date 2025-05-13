<?php
require_once('classes/login.php');
require_once('classes/DB.php');

$validador = new Login();
$validador->verificar_logado();

$db = new DB();
$produtos = $db->listarProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Produtos - Lojinha</title>
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

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

    <header>
        <h1>Visualizar Produtos</h1>
    </header>

    <main>
        <h2>Lista de Produtos</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?php echo $produto['id']; ?></td>
                    <td><?php echo $produto['nome_produto']; ?></td>
                    <td><?php echo $produto['preco']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo $produto['categoria']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="btn-container">
            <a href="home.php" class="button">Voltar à Home</a>
        </div>
    </main>

    <footer>
        &copy; 2025 Lojinha Artesanal - Fatec Araras
    </footer>

</body>
</html>
