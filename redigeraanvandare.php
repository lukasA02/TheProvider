<?php

require_once "conn.php";
require_once "behorighet.php";

// echo $_GET['anvandarid'];

if(isset($_GET["Anvnamn"]) && isset($_GET["Enamn"]) && isset($_GET["Fnamn"]) && isset($_GET["Epost"]) && isset($_GET["Telefon"])){
    $anvandarid = $_GET['anvandarid'];
    $Anvnamn = $_GET['Anvnamn'];
    $Enamn = $_GET['Enamn'];
    $Fnamn = $_GET['Fnamn'];
    $Epost = $_GET['Epost'];
    $Telefon = $_GET['Telefon'];

    if(isset($_GET["Anvnamn"]) && isset($_GET["Enamn"]) && isset($_GET["Fnamn"]) && isset($_GET["Epost"]) && isset($_GET["Telefon"])){
      $sql = "UPDATE anvandare SET Anvnamn = '$Anvnamn', Enamn ='$Enamn', Fnamn='$Fnamn', Epost='$Epost', Telefon='$Telefon' WHERE  anvandarid = $anvandarid";
  }
  
  if (mysqli_query($conn, $sql)) {
      echo " Anvandare uppdaterad";
    } else {
      echo " Fel: " . $sql . "<br>" . mysqli_error($conn);
    }
  mysqli_close($conn);
}
else {
    echo "Fyll i alla fält";
    header('Refresh: 5; Location: index.php');
}




?>