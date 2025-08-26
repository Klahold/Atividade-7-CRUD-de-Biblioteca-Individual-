<?php

include '../../db.php';

$id = $_GET['id'];

$sql = " DELETE FROM emprestimos WHERE id=$id ";

if ($conn->query($sql) === true) {
    echo "Registro excluído com sucesso.
        <a href='readEmprestimos.php'>Ver registros.</a>
        ";
} else {
    echo "Erro " . $sql . '<br>' . $conn->error;
}
$conn -> close();
exit();