<?php

class DBConnect { 
    private $servername = "127.0.0.1"; 
    private $username = "root";
    private $password = "";
    private $dbname="vestibular";
    private $conn;
    public function __construct() { 
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            print_r($this->conn); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function __destruct() { 
        $this->fechar_conexao();
	    print "DESTRUÍDO: Objeto {$this->conn}\n"; 
	} 

    private function fechar_conexao(){
        $this->conn = null;
    }

    public function inserir_autor($CPF, $nome, $telefone, $campoescola){
        try {
            $sql = "INSERT INTO vestibular (CPF, nome, telefone, campoescola) VALUES ('". $CPF . "', '" . $nome . "''". $telefone . "', '" . $campoescola . "')";
            # print($sql);
            $this->conn->exec($sql);
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
        return True;
    }
}





    function read() {
        $sql = "SELECT * FROM candidatos";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibe os dados de cada candidato
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - RG/CPF: " . $row["rgcpf"] . " - Telefone: " . $row["telefone"] . " - Escola Pública: " . $row["escola_publica"] . "<br>";
            }
        } else {
            echo "Nenhum candidato cadastrado.";
        }
    }

    function update($id, $nome, $rgcpf, $telefone, $escola_publica) {
        $sql = "UPDATE candidatos SET nome='$nome', rgcpf='$rgcpf', telefone='$telefone', escola_publica='$escola_publica' WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            echo "Dados do candidato atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar dados do candidato: " . $this->conn->error;
        }
    }

    function delete($id) {
        $sql = "DELETE FROM candidatos WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            echo "Candidato removido com sucesso!";
        } else {
            echo "Erro ao remover candidato: " . $this->conn->error;
        }
    }
}

?>