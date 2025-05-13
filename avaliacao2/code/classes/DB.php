<?php
class DB {
    private $conn;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'artesanato_db';
        $user = 'root';
        $pass = '';

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public function cadastrarProduto($nome, $preco, $descricao, $categoria) {
        $sql = "INSERT INTO produtos_artesanais (nome_produto, preco, descricao, categoria)
                VALUES (:nome, :preco, :descricao, :categoria)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':preco' => $preco,
            ':descricao' => $descricao,
            ':categoria' => $categoria
        ]);
    }

    public function removerProduto($id) {
        $sql = "DELETE FROM produtos_artesanais WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function listarProdutos() {
        $sql = "SELECT * FROM produtos_artesanais";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __destruct() {
        $this->conn = null;
    }
}
?>
