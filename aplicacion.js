//variables
var aciertos=0;//almacena la cantidad de aciertos cometidos
var fallos=0;//almacena la cantidad de fallos cometidos
var selecciones=[];//array que almacenará el valor(lo que identifica que pareja es) que comprobará la función fotoSeleccionada
var compruebaID=[];//array que almacenará los id(el id del que se usa en la tabla del html) que comprobará la función fotoSeleccionada
var parejasAcertadas=[];//almacenará las parejas que se han acertado para que no se repitan y no sumen puntos dos veces
var dificultad=document.title;//según el titulo de la pagina detectará la dificultad
var listaImagenes=[];//lista imagenes será una especie de diccionario con dos variables valor e imagen.
var totalParejas=0;//variable que almacenará el número de parejas encontradas.


//constantes
const imagenesArray = ['img/1.png','img/2.png','img/3.png','img/4.png','img/5.png','img/6.png','img/7.png','img/8.png','img/9.png','img/10.png','img/11.png','img/12.png',
    'img/13.png','img/14.png','img/15.png','img/16.png','img/17.png','img/18.png','img/19.png','img/20.png'];
const indexArrayD1 = ['p1','p2','p3','p4','p5','p6','p7','p8','p9','p10','p11','p12'];
const indexArrayD2 = ['p1','p2','p3','p4','p5','p6','p7','p8','p9','p10','p11','p12','p13','p14','p15','p16'];
const indexArrayD3 = ['p1','p2','p3','p4','p5','p6','p7','p8','p9','p10','p11','p12','p13','p14','p15','p16','p17','p18','p19','p20'];
const cantidadDeDificultad = [12,16,20]; //almacena la cantidad de fotos que tendrá según la dificultad




function calcularPuntos() {
    var pts=document.getElementById('pts').value;
    pts=(aciertos*100)-(fallos*50);
    document.getElementById('pts').value = pts;
}

function fotoSeleccionada(foto) {
    let valorFruta=document.getElementById(foto).value;
    let imagenFruta=listaImagenes.find(listaImagenes => listaImagenes.valor == valorFruta);
    compruebaID.push(foto);//obtiene el id que equivale a la posición
    selecciones.push(valorFruta);//obtiene el valor que equivale a la fruta seleccionada

    document.getElementById(foto).innerHTML = imagenFruta.imagen;//le cambia a la foto de su fruta

    if(selecciones.length==2) {
        if(compruebaID[0]!=compruebaID[1]) {//si ya se ha acertado no entra
            if(selecciones[0]==selecciones[1] && parejasAcertadas.indexOf(selecciones[0]) == -1) {//si no es igual a la anterior seleccionada
                aciertos++;
                parejasAcertadas.push(selecciones[0]);//si la acierta que el valor se guarte en las arcetadas

            } else if(parejasAcertadas.indexOf(selecciones[0]) == -1) {
                let id1=compruebaID[0];//las variables id1 y son se declaran porque el compruebaID al declararse vacio el seTimeout da error porque piensa que puede ser vacio
                let id2=compruebaID[1];//seguro que hay otra forma de hacerlo sin declarar nuevas variables pero estoy muy cansado
                setTimeout(() => {//uso un timeout para que de tiempo a ver la fruta :D, si es correcta no entra aqui y se quedan las imagenes
                    document.getElementById(id1).innerHTML = "<img src='img/0.png' height ='100' width='100' />";
                    document.getElementById(id2).innerHTML = "<img src='img/0.png' height ='100' width='100' />";
                },750);
                fallos++;
            }
            calcularPuntos();
        }

        if(compruebaID[0]==compruebaID[1]){
            compruebaID.pop();
            selecciones.pop();
        }else{
        //reseteamos las listas
        compruebaID=[];
        selecciones=[];
        }
    }
}

imagenesArray.sort(() => 0.5 - Math.random());//randomizo las fotos
if(dificultad=="FrutyRoy - Dificultad Facil") {//asigno una foto a una posición según la dificultad
    indexArrayD1.sort(() => 0.5 - Math.random());//randomizo las posiciones
    totalParejas=cantidadDeDificultad[0]/2;
    for(let i=0,j=0; i<cantidadDeDificultad[0]/2;i++) {//hay que hacer una constante para cambiar las dificultades mas facil TODO
        document.getElementById(indexArrayD1[j]).value = "pareja"+i;//doy el mismo valor para saber que son pareja a dos posiciones distintas
        j++;
        document.getElementById(indexArrayD1[j]).value = "pareja"+i;//doy el mismo valor para saber que son pareja a dos posiciones distintas
        j++;
        listaImagenes.push({valor:"pareja"+i,imagen:"<img src="+imagenesArray[i]+" height ='100' width='100' />"});//añado dos variables al array listaImagenes
    }

} else if(dificultad=="FrutyRoy - Dificultad Media") {
    indexArrayD2.sort(() => 0.5 - Math.random());
    totalParejas=cantidadDeDificultad[1]/2;
    for(let i=0,j=0; i<cantidadDeDificultad[1]/2;i++) {
        document.getElementById(indexArrayD2[j]).value = "pareja"+i;
        j++;
        document.getElementById(indexArrayD2[j]).value = "pareja"+i;
        j++;
        listaImagenes.push({valor:"pareja"+i,imagen:"<img src="+imagenesArray[i]+" height ='100' width='100' />"});
    }

} else if(dificultad=="FrutyRoy - Dificultad Dificil") {
    indexArrayD3.sort(() => 0.5 - Math.random());
    totalParejas=cantidadDeDificultad[2]/2;
    for(let i=0,j=0; i<cantidadDeDificultad[2]/2;i++) {
        document.getElementById(indexArrayD3[j]).value = "pareja"+i;
        j++;
        document.getElementById(indexArrayD3[j]).value = "pareja"+i;
        j++;
        listaImagenes.push({valor:"pareja"+i,imagen:"<img src="+imagenesArray[i]+" height ='100' width='100' />"});
    }

}
