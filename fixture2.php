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
$conn->query("DROP TABLE IF EXISTS pagina;");
echo " - ok \n";


echo "Criando Tabela \n";
$conn->query("CREATE TABLE pagina (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
    slug VARCHAR(255) CHARACTER SET 'utf8' NULL,
    texto TEXT CHARACTER SET 'utf8' NULL,
    PRIMARY KEY(id));");
echo "- ok \n";


echo "Inserindo Dados \n";
$paginas = include("dados.php");
foreach($paginas as $pagina){
    $stm = $conn->prepare("INSERT INTO pagina (titulo, slug, texto) VALUES (:titulo, :slug, :texto)");
    $stm->bindParam(":titulo", $pagina['titulo']);
    $stm->bindParam(":slug", $pagina['slug']);
    $stm->bindParam(":texto", $pagina['texto']);
    $stm->execute();
}
echo "##### Concluido ##### \n";