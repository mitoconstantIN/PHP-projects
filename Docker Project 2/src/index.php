<?php
require_once 'connection.php';

$sql1 = "DROP PROCEDURE IF EXISTS GetFlori";
$sql2 = "CREATE PROCEDURE GetFlori()
BEGIN
    SELECT * FROM flori;
END";
$stmt1 = $con->prepare($sql1);
$stmt2 = $con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$sql = 'CALL GetFlori()';
$q = $con->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
?>
<table>
    <tr>
        <th>Nume</th>
        <th>Culoare</th>
        <th>Marime</th>
        <th>Pret</th>
    </tr>
    <?php
    while($res=$q->fetch()): ?>
    <tr>
        <td><?php echo $res['nume']; ?></td>
        <td><?php echo $res['culoare']; ?></td>
        <td><?php echo $res['marime']; ?></td>
        <td><?php echo $res['pret']; ?></td>
    </tr>
<?php endwhile; ?>
</table>
<br/><a href="insert.php">Insert flower</a>
<br/><a href="update.php">Update flower with price 75</a>
<br/><a href="delete.php">Delete flower with name trandafiri</a>
<br/><a href="getFlower.php">Get flower with id=1</a>