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

    $sql_query = $conn->prepare("DELETE FROM Student WHERE JMBAG = ?");
    $sql_query->bind_param('s', $_GET["jmbag"]);
    $sql_query->execute();
    $result = $sql_query->get_result();
    $sql_query->close();
    header('Location: primjer2.php');
?>