<?php
// Établir la connexion à la base de données

define('DB_SERVER', 'localhost');
define('DB_USERMatriculeProf', 'root');
define('DB_PASSWORD', '');
define('DB_MatriculeProf', 'scolarite');
 
$link = mysqli_connect(DB_SERVER, DB_USERMatriculeProf, DB_PASSWORD, DB_MatriculeProf);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch professors
$sql = "SELECT `Matricule Prof` FROM prof";
$result = mysqli_query($link, $sql);

// Vérifier si la requête a réussi
if ($result) {
    $all_profs = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    die("ERROR: Could not execute query. " . mysqli_error($link));
}

// Fermer la connexion
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Conge</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Create Conge</h2>
        <form action="insert.php" method="POST">
            <div class="form-group">
                <label for='NumProf'>Matricule Prof</label>
                <select name="NumProf" required>
                    <?php foreach ($all_profs as $prof): ?>
                        <option value="<?php echo $prof["Matricule Prof"]; ?>">
                            <?php echo $prof["Matricule Prof"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="DateDeb">DateDeb:</label>
                <input type="date" class="form-control" id="DateDeb" name="DateDeb">
            </div>
            <div class="form-group">
                <label for="DateFin">DateFin:</label>
                <input type="date" class="form-control" id="DateFin" name="DateFin">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
