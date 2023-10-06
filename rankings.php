<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styleIndex.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logoMacedonia.ico">
    <title>FrutyRoy - Ranking</title>
</head>
<body>
  <div id="dificultad">
      <a href="index.html"><h1><img src="img/FrutyRoyLogo.png" alt="Logo FrutyRoy"></h1></a>
  </div>

<div id="resultado">
    <?php
  $fruta=$_GET['fruta'];
  include 'Conect.php';
  if($fruta=='Melocoton'){

    echo "Mejores Jugadores Del Equipo ".$fruta."<br>";
          $consultNombres="SELECT * FROM users WHERE favFruit='melocoton'  ORDER BY pts DESC";
          $jugadores=$conect->query($consultNombres);


          while($fila=$jugadores->fetch_array()){
              echo $fila[0]." - ".$fila[1]."<br>";
          }

  }elseif($fruta=='Platano'){

    echo "Mejores Jugadores Del Equipo ".$fruta."<br>";
          $consultNombres="SELECT * FROM users WHERE favFruit='platano' ORDER BY pts DESC";
          $jugadores=$conect->query($consultNombres);


          while($fila=$jugadores->fetch_array()){
              echo $fila[0]." - ".$fila[1]."<br>";
          }
  }elseif($fruta=='Manzana'){
    echo "Mejores Jugadores Del Equipo ".$fruta."<br>";
          $consultNombres="SELECT * FROM users WHERE favFruit='manzana' ORDER BY pts DESC";
          $jugadores=$conect->query($consultNombres);


          while($fila=$jugadores->fetch_array()){
              echo $fila[0]." - ".$fila[1]."<br>";
          }
  }elseif($fruta=='Pera'){
    echo "Mejores Jugadores Del Equipo ".$fruta."<br>";
          $consultNombres="SELECT * FROM users WHERE favFruit='pera ORDER BY pts DESC";
          $jugadores=$conect->query($consultNombres);


          while($fila=$jugadores->fetch_array()){
              echo $fila[0]." - ".$fila[1]."<br>";
          }
  }elseif($fruta=='Fresa'){
    echo "Mejores Jugadores Del Equipo ".$fruta."<br>";
          $consultNombres="SELECT * FROM users WHERE favFruit='fresa' ORDER BY pts DESC";
          $jugadores=$conect->query($consultNombres);


          while($fila=$jugadores->fetch_array()){
              echo $fila[0]." - ".$fila[1]."<br>";
          }

  }elseif($fruta=='general'){
    echo "Mejores Jugadores De Todos Los Equipos"."<br>";
          $consultNombres="SELECT * FROM users ORDER BY pts DESC";
          $jugadores=$conect->query($consultNombres);


          while($fila=$jugadores->fetch_array()){
              echo $fila[0]." - ".$fila[1]."<br>";
          }
  }



  mysqli_close($conect);
    ?>
  </div>
</body>
</html>
