<?php

include '../../db.php';

$id = $_GET['id'];

$livros = $conn->query("SELECT id, nome FROM livros");
$leitores = $conn->query("SELECT id, nome FROM leitores");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_livro = $_POST['id_livro'];
    $id_leitor = $_POST['id_leitor'];
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'];

    $sql = "UPDATE emprestimos SET id_livro ='$id_livro',id_leitor ='$id_leitor',data_emprestimo ='$data_emprestimo',data_devolucao ='$data_devolucao' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='readEmprestimos.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit(); 
}

$sql = "SELECT * FROM emprestimos WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>

    <form method="POST" action="updateEmprestimos.php?id=<?php echo $row['id'];?>">

        <label for="id_livro">ID Livro:</label>
        <input type="text" name="id_livro" value="<?php echo $row['id_livro'];?>" required>

        <label for="id_leitor">ID Leitor:</label>
        <input type="text" name="id_leitor" value="<?php echo $row['id_leitor'];?>" required>

        <label for="data_emprestimo">Data Emprestimo:</label>
        <input type="text" name="data_emprestimo" value="<?php echo $row['data_emprestimo'];?>" required>

        <label for="data_devolucao">Data Devolucao:</label>
        <input type="email" name="data_devolucao" value="<?php echo $row['data_devolucao'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="readEmprestimos.php">Ver registros.</a>

</body>

</html>