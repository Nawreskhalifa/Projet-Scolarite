<?php
// Replace with your actual database credentials
$host = "localhost";
$user = "root";
$password = ""; // Replace with your actual password
$database = "scolarite";

// Create a connection
$link = mysqli_connect($host, $user, $password, $database);

// Check the connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch professors
$sql = "SELECT `Matricule Prof` FROM prof";
$result = mysqli_query($link, $sql);

// Check if the query was successful
if ($result) {
    $all_profs = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    die("ERROR: Could not execute query. " . mysqli_error($link));
}

// Close the connection
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
                <label for="MatriculeProf">Matricule Prof:</label>
                <select class="form-control" id="MatriculeProf" name="MatriculeProf" required>
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
