<?php
    include("conn.php");

    $id = $_GET["id"];
    $sql = "SELECT * FROM topic WHERE ID = ?";

    $statement = $pdo->prepare($sql);
    $statement ->bindValue(1, $id);
    $statement->execute();

    //抓出全部且依照順序封裝成一個二維陣列
    $data = $statement->fetchAll();


    //---------reply----------
    $sql = "SELECT * FROM reply WHERE TID = ?";

    
    $statement = $pdo->prepare($sql);
    $statement ->bindValue(1, $id);
    $statement->execute();

    //抓出全部且依照順序封裝成一個二維陣列
    $dataReply = $statement->fetchAll();


?>

<html>
<body>
<a href="createreply.php?id=<?=$id ?>">新增回覆</a>
<a href="topic.php">回首頁</a>

<table border="1">
    <tr>
        <td>主題</td>
        <td>時間</td>
    </tr>


    <?php
        foreach($data as $index => $row){
    ?>
    
    <tr>
        <td><?=$row["Content"] ?></td>
        <td><?=$row["CreateDate"] ?></td>
    </tr>

    <?php
        }
    ?>
</table>

<br/><br/>


<table border="1">
    <tr>
        <td>回覆</td>
        <td>時間</td>
    </tr>
    <?php
        foreach($dataReply as $index => $row){
    ?>
    
    <tr>
        <td><?=$row["Content"] ?></td>
        <td><?=$row["CreateDate"] ?></td>
    </tr>

    <?php
        }
    ?>
</table>

</body>
</html>