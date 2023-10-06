<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'Conect.php';
        $pts=$_GET['pts'];
        $nombre=$_GET['nombre'];
        $query="UPDATE users SET pts='$pts' WHERE nombre=$nombre";
        if (mysqli_query($conect, $sql)){
              header("Location: rankings.php?fruta=general");
         } else{
              header("Location: main.php");
     }
        ?>

    </body>
</html>
