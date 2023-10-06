<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styleIndex.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logoMacedonia.ico">
    <title>FrutyRoy</title>
    <script src="aplicacion.js"></script>
</head>
<body>
    <div id="dificultad">
        <a href="index.html"><h1><img src="img/FrutyRoyLogo.png" alt="Logo FrutyRoy"></h1></a>
    </div>

    <div id="botones">
      <form action="" method="post">
          <p>Nombre: <br><input type="text" id="name" name="name"/></p>
          <p>Fruta Favorita: <br>
            <select name="frutaFavorita">
              <option value="melocoton">Melocotón</option>
              <option value="platano">Plátano</option>
              <option value="manzana">Manzana</option>
              <option value="pera">Pera</option>
              <option value="fresa">Fresa</option>
            </select>
          </p>
          <p>Dificultad: <br>
            <select name="dificultadElegida">
              <option value="facil">Fácil</option>
              <option value="media">Media</option>
              <option value="dificil">Difícil</option>
            </select>
          </p>
          <br>
          <input type="submit" id="enviar" name="enviar" value="Jugar"/>
      </form>
    </div>



    <?php

        $nombre= filter_input(INPUT_POST, "name");
        $favFruit= filter_input(INPUT_POST, "frutaFavorita");
        $enviar= filter_input(INPUT_POST, "enviar");
        $dificultadElegida=filter_input(INPUT_POST, "dificultadElegida");
        if($enviar && $nombre!=""){
            include 'Conect.php';
            //tiene que comprobar si ya está creado o no
            //si ya está creado debe de sacar la puntuación que tiene para luego mandarlo al form de la dificultad
            //los puntos se inician a 0 si NO están creados y si ya lo están NO actualizarlos
            //si no estaba creado debe de pedir la fruta favorita y si no sabes como la ponemos en el form del juego y que se suba junto a los puntos

            $consultUser="SELECT * FROM users";
            $usuarios=$conect->query($consultUser);
            $numRegistros=$usuarios->num_rows;
            $userEncontrado=false;
            $todoOk=false;
            while($fila=$usuarios->fetch_array()){
                if($fila[0]==$nombre){
                    $userEncontrado=true;
                }
            }
            if($userEncontrado==false) {
                $sql="INSERT INTO users (nombre, pts, favFruit) VALUES ("
                    . "'$nombre', '0', '$favFruit')";
                if(!mysqli_query($conect, $sql)) {
                      echo '<script language="javascript">alert("Algo fue mal.");</script>';
                }else{
                  $todoOk=true;
                }
            }
            if($todoOk==true||$userEncontrado==true){
              if ($dificultadElegida == "facil") {
                  header("Location: dificultad1.php?nombre=$nombre");
              } elseif ($dificultadElegida == "media") {
                  header("Location: dificultad2.php?nombre=$nombre");
              } elseif ($dificultadElegida == "dificil") {
                  header("Location: dificultad3.php?nombre=$nombre");
              }
            }
            mysqli_close($conect);
        }elseif($enviar){
          echo '<script language="javascript">alert("Inserte un nombre, por favor.");</script>';
        }


    ?>

</body>
</html>
