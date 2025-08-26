<?php

include '../../db.php';

$sql = "SELECT * FROM autores";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Nacionalidade </th>
            <th> Ano Nascimento </th>
            <th> Ações </th>
        </tr>
         ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td> {$row['id']} </td>
                <td> {$row['nome']} </td>
                <td> {$row['nacionalidade']} </td>
                <td> {$row['ano_nascimento']} </td>
                <td> 
                    <a href='updateAutores.php?id={$row['id']}'>Editar<a>
                    <a href='deleteAutores.php?id={$row['id']}'>Excluir<a>
                
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn -> close();

echo "<a href='createAutores.php'>Inserir novo Registro</a>";