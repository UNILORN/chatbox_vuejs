<?php

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>JSON GO</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  </head>
  <body>
    <form class="" action="index.php" method="post">
      <input type="text" name="name">
      <input type="text" name="data" value="">
      <input type="submit" value="送信">
    </form>


    <script type="text/javascript">
    $(function(){

    });
    $("form").submit(function(){
        return $.ajax({
          type: 'POST',
          url: './monitor.php'
        })
      }
    });
    test().done(function(result) {

    }).fail(function(result) {

    });
    </script>


    <?php
    if(empty($list)){ $list = array(); }
    if(!empty($_POST["name"]) && !empty($_POST["data"])){
      $name = $_POST["name"];
      $data = $_POST["data"];
      array_push($list,$name,$data);
      $fp = fopen('./data.json','a');
      fwrite($fp, sprintf(json_encode($list)));
      echo "<p>{ $name : $data }を送信しました";
    }
     ?>
  </body>
</html>
