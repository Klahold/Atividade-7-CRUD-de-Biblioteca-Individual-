<?php

include '../../db.php';

$sql = "SELECT * FROM emprestimos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> ID </th>
            <th> ID Livro </th>
            <th> ID Leitor </th>
            <th> Data Emprestimo </th>
            <th> Data Devolucao </th>
            <th> Ações </th>
        </tr>
         ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td> {$row['id']} </td>
                <td> {$row['id_livro']} </td>
                <td> {$row['id_leitor']} </td>
                <td> {$row['data_emprestimo']} </td>
                <td> {$row['data_devolucao']} </td>
                <td> 
                    <a href='updateEmprestimos.php?id={$row['id']}'>Editar<a>
                    <a href='deleteEmprestimos.php?id={$row['id']}'>Excluir<a>
                
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn -> close();

echo "<a href='createEmprestimos.php'>Inserir novo Registro</a>";