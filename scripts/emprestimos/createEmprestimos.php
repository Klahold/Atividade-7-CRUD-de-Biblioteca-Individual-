<?php

include '../../db.php';

$livros = $conn->query("SELECT id, titulo FROM livros");
$leitores = $conn->query("SELECT id, nome FROM leitores");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_livro = $_POST['id_livro'];
    $id_leitor = $_POST['id_leitor'];
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'];

    $sql = " INSERT INTO emprestimos (id_livro,id_leitor,data_emprestimo,data_devolucao) VALUE ('$id_livro','$id_leitor','$data_emprestimo','$data_devolucao')";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>

    <form method="POST" action="createEmprestimos.php">

        <label for="id_livro">ID Livro:</label>
        <input type="number" name="id_livro" required>

        <label for="id_leitor">ID Leitor:</label>
        <input type="number" name="id_leitor" required>

        <label for="data_emprestimo">Data Emprestimo:</label>
        <input type="date" name="data_emprestimo" required>

        <label for="data_devolucao">Data Devolucao:</label>
        <input type="date" name="data_devolucao" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="readEmprestimos.php">Ver registros.</a>

</body>

</html>