<?php
    // $topic = $_POST == null ? "" : $_POST["topic"];

    if($_POST == null){
        $topic = ""; //from新增話題
      }else{
        $topic = $_POST["topic"]; // post by itself
    
        include("conn.php");
    
        $sql = "INSERT INTO topic(Content, CreateDate) VALUES (?, NOW())";
      
        $statement = $pdo->prepare($sql);
        $statement ->bindValue(1, $topic);
        $statement ->execute();
      
        //跳轉到topic.php
        header("Location: topic.php");
      
      }
    
?>
<html>
  <body>

    <!-- POST表單 -->
    <form method="POST" action="createtopic.php">


      主題：<input type="text" name="topic" /><br />
     
      <input type="submit" value="送出" />
    </form>

  </body>
</html>
