<?php
$nombre = $_GET['txt_nombre'];
$edad= (int) $_GET['num_edad'];
$sueldo = (float) $_GET['num_sueldo'];
    echo "Este es mi primer codigo php";
    echo "<br>Bienvenido: ". $nombre;
    echo "<br>Edad: ". $edad;
    echo "<br>Sueldo: ". $sueldo;
    echo "<br>La raiz cuadrada de la edad es: ". sqrt($edad);
    echo "<br>Aleatorio entre 1 y la edad: ". rand(1,$edad);
    echo "<br>La edad al cuadrado es: ". pow($edad,2);

    if ($edad<18) {
        echo "<br>";
        echo "Es menor de edad";
        echo "<br>";
    } else {
        echo "<br>";
        echo "Es mayor de edad";
        echo "<br>";
    }
    echo "<br><br><br>";

    echo "numeros continueos desde el 1 hasta la edad: ";
    for ($i=1; $i <= $edad ; $i++) { 
        echo "<br>".$i;
    }

    echo "<br><br><br>";

    echo "numeros continueos desde el 1 hasta la edad: ";
    for ($i=$edad; $i >= 1 ; $i--) { 
        echo "<br>".$i;
    }
    

    /*
    echo "<br>";
    var_dump($nombre);
    echo "<br>";
    var_dump($edad);
    echo "<br>";
    var_dump($sueldo);
    */
?>
<br>
<a href="../index.php">Regresar</a>