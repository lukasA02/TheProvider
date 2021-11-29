<?php
require_once "verifiera.php";

if(isset($_GET['hash'], $_GET['aid'])) {
    if(verifiera($_GET['hash'], $_GET['aid'])) {
        $aid = $_GET['aid'];
        if(isset($_GET['meddelandeid'])) {
            $mid = $_GET['meddelandeid'];
            
            $sql = "DELETE FROM meddelande WHERE MeddelandeID = ? && Anvandare = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $mid, $aid);
            $stmt->execute();

            $vs = array();
                array_push($vs, array(
                    "Result"=>true,
                ));
            echo json_encode($vs);
            mysqli_close($conn);
        }
        else
        $välj = "Välj meddelandeid";
            echo json_encode($välj);
    }
    else{
        $Error ="Kunde inte logga in";
        echo json_encode($Error);
}
else{
    $Error = "Logga in";
    echo json_encode($Error);
}
?>