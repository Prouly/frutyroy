<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FrutyRoy - Dificultad Dificil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/logoMacedonia.ico">
    <link href="styles/styleDificil.css" rel="stylesheet" type="text/css">
</head>
<body>


    <div id="dificultad"><h1> <a href="index.html"><img src="img/FrutyRoyLogo.png" alt="Logo FrutyRoy"></a><br>Dificultad Difícil <br>(puntuación máxima 1000)</h1></div>
    <form action="" method="post">
        <input type="text" id="pts" name="pts" readonly/>
        <br>
        <input type="submit" id="actPuntos" name="actPuntos" value="Actualizar Puntos"/>
    </form>
    <?php
        $enviar= filter_input(INPUT_POST, "actPuntos");
        if($enviar){
            include 'Conect.php';
            $nombre=$_GET['nombre'];
            $pts = filter_input(INPUT_POST, "pts");
            $consultPuntos="SELECT pts FROM users WHERE nombre='$nombre'";
            $puntuacionActual=$conect->query($consultPuntos);
            $puntuacionActual=$puntuacionActual->fetch_array();
            if($pts<0){
                $pts=0;
            }
            if($puntuacionActual[0]<=$pts){
                $sql="UPDATE users SET pts='$pts' WHERE nombre='$nombre'";
                if (!mysqli_query($conect, $sql)){
                    echo "<script>alert('Error al actualizar')</script>";
                }
            } else{
                echo "<script>alert('No se ha actualizado')</script>";
            }
            mysqli_close($conect);
            header("Location: rankings.php?fruta=general");
            exit();
        }
     ?>
    <table id="gameArea" onclick="calcularPuntos()"><!--Area donde se muestra el juego-->
        <tr><!--Fila 1-->
            <td>
                <button id="p1" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p2" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p3" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p4" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
        </tr>
        <tr><!--Fila 2-->
            <td>
                <button id="p5" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p6" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p7" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p8" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
        </tr>
        <tr><!--Fila 3-->
            <td>
                <button id="p9" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p10" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p11" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p12" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
        </tr>
        <tr><!--Fila 4-->
            <td>
                <button id="p13" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p14" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p15" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p16" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
        </tr>
        <tr><!--Fila 5-->
            <td>
                <button id="p17" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p18" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p19" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
            <td>
                <button id="p20" onclick='fotoSeleccionada(this.id)'>
                    <img src="img/0.png" height ="100" width="100" />
                </button>
            </td>
        </tr>
    </table>
    <script src="aplicacion.js"></script>
    <audio id="snd" src="src/backgroundMusic.mp3" autoplay="autoplay" playcount="9999" loop="true" volume="10"/>
</body>
</html>
