<?php
require "connexion.php";

if (isset($_POST['Valider'])) {
    $np = $_POST["NumProf"];
    $nm = $_POST["NumMat"];
    $nc = $_POST["NumCell"];
    $ns = $_POST["session"];

    // Insert data into the database
    $sql = "INSERT INTO cellules (NumProf, NumMat, NumCell, NumSession) VALUES (:np, :nm, :nc, :ns)";
    $stmt = $idcon->prepare($sql);
    $stmt->bindParam(':np', $np);
    $stmt->bindParam(':nm', $nm);
    $stmt->bindParam(':nc', $nc);
    $stmt->bindParam(':ns', $ns);

    try {
        $stmt->execute();
        // Data inserted successfully
        echo '<script>alert("Data inserted successfully.");</script>';
    } catch (PDOException $e) {
        // Handle the exception
        echo "Error: " . $e->getMessage();
    }
}

// Fetch sessions
$sql = "SELECT Sem FROM session";
$result = $idcon->query($sql);
$all_sessions = $result->fetchAll(PDO::FETCH_ASSOC);

// Fetch professors
$sql = "SELECT `Matricule Prof` FROM prof";
$result = $idcon->query($sql);
$all_profs = $result->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT `Code Matière` FROM matieres";
$result = $idcon->query($sql);
$all_NumMats = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your styles go here -->
</head>
<body>
    <div class="container">
        <h1>Ajouter une Cellule</h1>
        <form method="POST">
            <!-- Your form fields go here -->
            <label for="NumCell">NumCell</label>
            <input type="text" name="NumCell" required>

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
                <label for='NumMat'>NumMat</label>
                <select name="NumMat" required>
                    <?php foreach ($all_NumMats as $NumMat): ?>
                        <option value="<?php echo $NumMat["Code Matière"]; ?>">
                            <?php echo $NumMat["Code Matière"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for='session'>Session</label>
                <select name="session" required>
                    <?php foreach ($all_sessions as $session): ?>
                        <option value="<?php echo $session["Sem"]; ?>">
                            <?php echo $session["Sem"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="reset">Annuler</button>
            <button type="submit" name="Valider">Valider</button>
            <a href="afficherCell.php">Home</a>
        </form>
    </div>
</body>
</html>
