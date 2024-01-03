<?php
include 'connexion.php';

if (isset($_GET['numAbs'])) {
    $numAbs = $_GET['numAbs'];

    // Fetch absence details to display in the confirmation message
    $stmt = $pdo->prepare("SELECT * FROM absensg WHERE NumAbs = ?");
    $stmt->execute([$numAbs]);
    $absence = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$absence) {
        die("Absence not found.");
    }
} else {
    die("Invalid request.");
}

if (isset($_POST['delete'])) {
    // Perform the actual deletion if the user confirms
    $stmt = $pdo->prepare("DELETE FROM absensg WHERE NumAbs = ?");
    $stmt->execute([$numAbs]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Absence</title>
</head>
<body>
    <h3>Delete Absence</h3>
    <p>Are you sure you want to delete the following Absence record?</p>
    
    <ul>
        <li><strong>NumAbs:</strong> <?php echo $absence['NumAbs']; ?></li>
        <li><strong>MatriculeProf:</strong> <?php echo $absence['MatriculeProf']; ?></li>
        <li><strong>Session:</strong> <?php echo $absence['Session']; ?></li>
        <li><strong>DateAbs:</strong> <?php echo $absence['DateAbs']; ?></li>
        <li><strong>Seance:</strong> <?php echo $absence['Seance']; ?></li>
        <li><strong>Motif:</strong> <?php echo $absence['Motif']; ?></li>
        <li><strong>TypeSeance:</strong> <?php echo $absence['TypeSeance']; ?></li>
        <li><strong>CodeClasse:</strong> <?php echo $absence['CodeClasse']; ?></li>
        <li><strong>CodeMatiere:</strong> <?php echo $absence['CodeMatiere']; ?></li>
        <li><strong>Justifier:</strong> <?php echo ($absence['Justifier'] == 1) ? 'Yes' : 'No'; ?></li>
        <!-- Add other fields as needed -->
    </ul>

    <form action="delete.php?numAbs=<?php echo $numAbs; ?>" method="POST">
        <button type="submit" name="delete">Confirm Delete</button>
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>
