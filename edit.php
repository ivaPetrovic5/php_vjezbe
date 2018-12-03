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

    if(isset($_POST['jmbag']) && isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['godine'])) {
        $sql_query = $conn->prepare("UPDATE Student SET Ime = ?, Prezime = ?, Godine = ? WHERE JMBAG = ?");
        $sql_query->bind_param('ssis', $_POST['ime'], $_POST['prezime'], $_POST['godine'], $_POST['jmbag']);
        $sql_query->execute();
    }
        $conn->close();
        header('Location: primjer2.php');
?>