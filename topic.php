<!DOCTYPE html>
<?php
    include("conn.php");

    $sql = "SELECT * FROM topic";

    $statement = $pdo->prepare($sql);
    $statement->execute();

    //抓出全部且依照順序封裝成一個二維陣列
    $data = $statement->fetchAll();

?>

<html>
<body>
<a href="createtopic.php">新增話題</a>

<table border="1">
    <tr>
        <td>編號</td>
        <td>主題</td>
        <td>時間</td>
    </tr>

    <?php
        foreach($data as $index => $row){
    ?>
    
    <tr>
        <td><?=$row["ID"] ?></td>
        <td> <a href="reply.php?id=<?=$row["ID"]?>"><?=$row["Content"] ?></a> </td>
        <td><?=$row["CreateDate"] ?></td>
    </tr>

    <?php
        }
    ?>

</table>

</body>
</html>
