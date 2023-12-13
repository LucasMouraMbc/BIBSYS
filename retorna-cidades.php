<?php
require('includes/conexao.php');
$uf = $_GET['id'];
$sql = "SELECT * FROM municipio WHERE Uf = '$uf'";

$result = mysqli_query($conexao, $sql);

foreach ($result as $r) {
    $id = $r['Id'];
    $cidade = $r['Nome'];
    echo "<option value='$id'>$cidade</option>";
}
