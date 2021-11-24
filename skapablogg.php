<?php
    require_once "conn.php";
    require_once 'verifiera.php';

    // $_GET['anv'] =1;
    // $_GET['hash'] = 123456;


    if(isset($_GET['aid']) && isset($_GET['hash'])){

        if(verifiera($_GET['hash'],$_GET['aid'])){

    if(isset($_GET['anvandarid'], $_GET['last'], $_GET['beskrivning'], $_GET['titel'])) {
        $anvandarid = $_GET['anvandarid'];
        $last = $_GET['last'];
        $beskrivning = $_GET['beskrivning'];
        $titel = $_GET['titel'];

        // Om skaparen av bloggen har valt en tagg
        if(isset($_GET['taggid']))
            $taggid = $_GET['taggid'];
        else
            $taggid = 'NULL';

        $sql = "INSERT INTO `blogg` (`AnvandarID`, `TaggID`, `Last`, `Beskrivning`, `Titel`)
        VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiss", $anvandarid, $taggid, $last, $beskrivning, $titel);
        $stmt->execute();

        $blogg = array();
            array_push($blogg, array(
                "Result"=>true,
                "BloggID"=>mysqli_insert_id($conn)
              ));
        echo json_encode($blogg);
        mysqli_close($conn);
    }
    else{
        echo "Fyll i alla fält";
    }

    }else{
        echo "Kan inte logga in";
    }

}   else{
    echo "Logga in";
}
?>