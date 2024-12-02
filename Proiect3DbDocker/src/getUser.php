<?php
require_once 'connection.php';
$sql1="DROP PROCEDURE IF EXISTS getUser";
$sql2 = "CREATE PROCEDURE getUser(
    IN intID INT,
    OUT strNume VARCHAR(30),
    OUT strParola VARCHAR(30),
    OUT strRol VARCHAR(30)
    )
    BEGIN
    SELECT username, password, role
    INTO strNume, strParola, strRol
    FROM clienti
    WHERE id = intID;
    END";
    $stmt1 = $con->prepare($sql1);
    $stmt2 = $con->prepare($sql2);
    $stmt1->execute();
    $stmt2->execute();
    $id = '3';
    $sql1 = "CALL getUser('1', @out_nume, @out_parola, @out_rol)";
    $sql2 ="SELECT @out_nume, @out_parola, @out_rol";
    $q = $con->query($sql1);
    $q = $con->query($sql2);
    $q -> setFetchMode(PDO::FETCH_ASSOC);
    ?>
    <table>
        <tr>
            <th>Nume</th>
            <th>Parola</th>
            <th>Rol</th>
        </tr>
        <?php
        while($row = $q->fetch())
        {
            echo "<td>".$row["@out_nume"]."</td>";
            echo "<td>".$row["@out_parola"]."</td>";
            echo "<td>".$row["@out_rol"]."</td>";
            
        }
        ?>
        </table>
        <br/><a href="index.php">Back</a>