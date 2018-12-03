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
        echo "<table><tr><th>JMBAG</th><th>IME</th><th>Prezime</th><th>Delete</th><th>Edit</th></tr>";
        // Printanje rezultata
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["JMBAG"]. "</td>";
            echo "<td>" . $row["ime"]. "</td>";
            echo "<td>" . $row["prezime"]. "</td>";
            echo "<td><a href='primjer4.php?jmbag=".$row["JMBAG"]."'>Delete</a></td>";
            echo "<td><a href='primjer5.php?jmbag=".$row["JMBAG"]."'>Edit</a></td>";
            echo "</tr>";
        }
    } else {
        echo "Nema rezultata";
    }

    //  Zatvaranje konekcije
    $stmt->close();
?>