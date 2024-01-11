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
    <title>Update Conge</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Conge</h2>
        <?php
        require_once "db.php";
        
        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            $sql = "SELECT * FROM conges WHERE NumConge = ?";
            
            if ($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "i", $param_id);
                
                $param_id = trim($_GET["id"]);
                
                if (mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if (mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result);
                        $MatriculeProf = $row["MatriculeProf"];
                        $DateDeb = $row["DateDeb"];
                        $DateFin = $row["DateFin"];
                    } else {
                        echo "No records found.";
                        exit();
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close the statement
            mysqli_stmt_close($stmt);
            
            // Close connection
            mysqli_close($link);
        } else {
            echo "Invalid request.";
            exit();
        }
        ?>
        <form action="update-process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $param_id; ?>">
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
                <input type="date" class="form-control" id="DateDeb" name="DateDeb" value="<?php echo $DateDeb; ?>">
            </div>
            <div class="form-group">
                <label for="DateFin">DateFin:</label>
                <input type="date" class="form-control" id="DateFin" name="DateFin" value="<?php echo $DateFin; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
