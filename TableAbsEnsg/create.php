<?php
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matriculeProf = $_POST['matriculeProf'];
    $session = $_POST['session'];
    $dateAbs = $_POST['dateAbs'];
    $seance = $_POST['seance'];
    $motif = $_POST['motif'];
    $typeSeance = $_POST['typeSeance'];
    $codeClasse = $_POST['codeClasse'];
    $codeMatiere = $_POST['codeMatiere'];
    $justifier = isset($_POST['justifier']) ? 1 : 0;

    // Check if the provided matriculeProf exists in the 'prof' table
    $checkProfStmt = $pdo->prepare("SELECT * FROM prof WHERE Matricule_Prof = ?");
    $checkProfStmt->execute([$matriculeProf]);
    $profExists = $checkProfStmt->rowCount() > 0;

    if (!$profExists) {
        die("Error: The provided MatriculeProf does not exist in the 'prof' table.");
    }

    // Check if the provided CodeClasse exists in the 'classe' table
    $checkClasseStmt = $pdo->prepare("SELECT * FROM classe WHERE CodClasse = ?");
    $checkClasseStmt->execute([$codeClasse]);
    $classeExists = $checkClasseStmt->rowCount() > 0;

    if (!$classeExists) {
        die("Error: The provided CodeClasse does not exist in the 'classe' table.");
    }

    // Check if the provided CodeMatiere exists in the 'Matieres' table
    $checkMatiereStmt = $pdo->prepare("SELECT * FROM matieres WHERE CodeMatiere = ?");
    $checkMatiereStmt->execute([$codeMatiere]);
    $matiereExists = $checkMatiereStmt->rowCount() > 0;

    if (!$matiereExists) {
        die("Error: The provided CodeMatiere does not exist in the 'matieres' table.");
    }

    $stmt = $pdo->prepare("INSERT INTO absensg (MatriculeProf, Session, DateAbs, Seance, Motif, TypeSeance, CodeClasse, CodeMatiere, Justifier) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$matriculeProf, $session, $dateAbs, $seance, $motif, $typeSeance, $codeClasse, $codeMatiere, $justifier]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Absence</title>
</head>
<body>
    <h3>Create Absence</h3>
    <form action="create.php" method="POST">
        <label for="matriculeProf">MatriculeProf:</label>
        <select name="matriculeProf">
        <?php
            $seanceStmt = $pdo->prepare("SELECT * FROM prof");
            $seanceStmt->execute();
            $seances = $seanceStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($seances as $seanceItem) {
                echo "<option value='{$seanceItem['Matricule Prof']}'>{$seanceItem['Matricule Prof']}</option>";
            }
            ?>
        </select><br>

        <label for="session">Session:</label>
        <select name="session">
            <?php
            $seanceStmt = $pdo->prepare("SELECT * FROM session");
            $seanceStmt->execute();
            $seances = $seanceStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($seances as $seanceItem) {
                echo "<option value='{$seanceItem['Numero']}'>{$seanceItem['Numero']}</option>";
            }
            ?>
        </select><br>

        <label for="dateAbs">DateAbs:</label>
        <input type="datetime-local" name="dateAbs" required><br>

        <label for="seance">Seance:</label>
        <select name="seance">
            <?php
            $seanceStmt = $pdo->prepare("SELECT * FROM seances");
            $seanceStmt->execute();
            $seances = $seanceStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($seances as $seanceItem) {
                echo "<option value='{$seanceItem['Seance']}'>{$seanceItem['Seance']}</option>";
            }
            ?>
        </select><br>

        <label for="motif">Motif:</label>
        <input type="text" name="motif"><br>

        <label for="typeSeance">TypeSeance:</label>
        <input type="text" name="typeSeance"><br>

        <label for="codeClasse">CodeClasse:</label>
        <select name="codeClasse">
            <?php
            $classeStmt = $pdo->prepare("SELECT * FROM classe");
            $classeStmt->execute();
            $classes = $classeStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($classes as $classe) {
                echo "<option value='{$classe['CodClasse']}'>{$classe['IntClasse']}</option>";
            }
            ?>
        </select><br>

        <label for="codeMatiere">CodeMatiere:</label>
        <select name="codeMatiere">
            <?php
            $matiereStmt = $pdo->prepare("SELECT * FROM matieres");
            $matiereStmt->execute();
            $matieres = $matiereStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($matieres as $matiere) {
                echo "<option value='{$matiere['CodeMatiere']}'>{$matiere['CodeMatiere']}</option>";
            }
            ?>
        </select><br>

        <label for="justifier">Justifier:</label>
        <input type="checkbox" name="justifier"><br>

        <button type="submit">Create</button>
    </form>
</body>
</html>
