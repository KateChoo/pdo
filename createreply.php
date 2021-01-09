<?php
    $reply = $_POST == null ? "" : $_POST["reply"];

      if($reply != ""){
    
        include("conn.php");
    
        $sql = "INSERT INTO reply(TID, Content, CreateDate) VALUES (?,?, NOW())";

        
        $statement = $pdo->prepare($sql);
        $statement ->bindValue(1, $topic);
        $statement ->bindValue(2, $reply);
        $statement ->execute();
      
        //跳轉到topic.php
        header("Location: topic.php");
      
      }
    
?>
<html>
  <body>

    <!-- POST表單 -->
    <form method="POST" action="createreply.php">

    <input type="hidden" name="tid" value="<?=$_GET["id"]?>">
      主題：<input type="text" name="reply" /><br />
     
      <input type="submit" value="送出" />
    </form>

  </body>
</html>