<?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "test";

    // Stvaranje konekcije na bazu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Provjera uspjesnosti spajanja na bazu
    if ($conn->connect_error) {
        die("Uspostavljanje konekcije na bazu nije uspjelo: ". $conn->connect_error);
    } 

    if(isset($_GET['jmbag'])) {
        $sql_query = $conn->prepare("SELECT JMBAG, ime, prezime, godine FROM Student WHERE JMBAG = ?");
        $sql_query->bind_param('s', $_GET["jmbag"]);
        $sql_query->execute();
        $result = $sql_query->get_result();
        $student = $result->fetch_array();
        echo "<form method='post' action='edit.php'>";
        echo "Ime <input type='text' name='ime' id='ime' value='".$student['ime']."'>";
        echo "Prezime <input type='text' name='prezime' id='prezime' value='".$student['prezime']."'>";
        echo "JMBAG <input type='text' name='jmbag' id='jmbag' readonly value='".$student['JMBAG']."'>";
        echo "Godine <input type='text' name='godine' id='godine' value='".$student['godine']."'>";
        echo "<input type='submit' name='submit' value='Spremi promjene'></form>";
    }
?>