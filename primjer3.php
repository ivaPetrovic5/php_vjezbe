<html>
    <head>
        <title>
            Unos podataka u bazu
        </title>
    </head>
    <body>
        <form method="post" action="primjer3.php">
            <label for="ime">Ime</label>
            <input type="text" name="ime" id="ime">
            <label for="prezime">Prezime</label>
            <input type="text" name="prezime" id="prezime">
            <label for="godine">Godine</label>
            <input type="text" name="godine" id="godine">
            <label for="jmbag">JMBAG</label>
            <input type="text" name="jmbag" id="jmbag">
            <input type="submit" name="submit" value="Spremi">
        </form>
        <a href="index.php">Povratak na glavnu stranicu</a>
    </body>
</html>

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
    
    if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['jmbag']) && isset($_POST['godine'])) {
        $sql_query = $conn->prepare("INSERT INTO Student (JMBAG, ime, prezime, godine) VALUES (?, ?, ?, ?)");
        $sql_query->bind_param('ssss', $_POST['jmbag'], $_POST['ime'], $_POST['prezime'], $_POST['godine']);
        $sql_query->execute();
        $result = $sql_query->get_result();
    }
    
    $sql_query->close();
?>