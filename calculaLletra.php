<?php

// declaració de variables:
$msg = $dniPle = $dniOK = $lletra = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["campoDNI"])) {
      $msg = "Sisplau, entri algun DNI.";
      echo $msg;
    } else {
      $dniPle = test_input($_POST["campoDNI"]);      
      if ( (!preg_match("/^[0-9]*$/",$dniPle)) || (strlen($dniPle) != 8) ) {
        $msg = "Compte! ha de tenir 8 nums, i sense espais.";
        echo $msg;
      }else{
        $dniOK = $_POST["campoDNI"];
        echo "<h2>El num. DNI complert: </h2>";
        echo $dniOK;
        echo "<br><br><br>";
        echo "<h2>La lletra corresponent: </h2>";
        echo calc_lletra($dniOK);
        echo "<br><br><br>";
        echo "<a href='.\index.php'><button type='button'>Tornar...</button></a>";
      }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function calc_lletra($num) {
    $resto = $num % 23;
    // echo strpos("TRWAGMYFPDXBNJZSQVHLCKE", "world"); // outputs 6
    $lletra = substr("TRWAGMYFPDXBNJZSQVHLCKE",$resto,1);
    return $lletra;
}

?>
