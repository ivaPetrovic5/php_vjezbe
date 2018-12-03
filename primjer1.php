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

    $sql = "SELECT JMBAG, ime, prezime FROM Student";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    //  Provjera ima li rezultata
    if ($result->num_rows > 0) {
        // Printanje rezultata
        while($row = $result->fetch_assoc()) {
            echo "JMBAG: " . $row["JMBAG"]. " - Ime: " . $row["ime"]. " " . $row["prezime"]. "<br>";
        }
    } else {
        echo "Nema rezultata";
    }

    //  Zatvaranje konekcije
    $stmt->close();
?>