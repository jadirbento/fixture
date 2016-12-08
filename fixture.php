<?php
/**
 * Created by PhpStorm.
 * User: Jadir Bento
 * Date: 08/12/2016
 * Time: 17:16
 */

require_once "conexaoDB.php";

echo "##### Executando Fixture ##### \n";

$conn = conexaoDB();

echo "Removendo Tabela \n";
$conn->query("DROP TABLE IF EXISTS teste;");
echo " - ok \n";



echo "Criando Tabela \n";
$conn->query("CREATE TABLE teste (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(45) CHARACTER SET 'utf8' NULL,
    PRIMARY KEY(id));");
echo "- ok \n";



echo "Inserindo Dados \n";
for($i = 0; $i <= 9; $i++){
    $nome = "Nome Aluno " . $i;
    $stm = $conn->prepare("INSERT INTO teste (nome) VALUES (:nome)");
    $stm->bindParam(":nome", $nome);
    $stm->execute();
}
echo "##### Concluido ##### \n";