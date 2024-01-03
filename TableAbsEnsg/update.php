<?php
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numAbs = $_GET['numAbs']; // Assuming the primary key is 'NumAbs'
    $matProf = $_POST['matProf'];
    $session = $_POST['session'];
    $dateAbs = $_POST['dateAbs'];
    $seance = $_POST['seance'];
    $motif = $_POST['motif'];
    $typeSeance = $_POST['typeSeance'];
    $codeClasse = $_POST['codeClasse'];
    $codeMatiere = $_POST['codeMatiere'];
    $justifier = isset($_POST['justifier']) ? 1 : 0;

    // Update the record in the 'absensg' table
    $stmt = $pdo->prepare("UPDATE absensg SET MatriculeProf = ?, Session = ?, DateAbs = ?, Seance = ?, Motif = ?, TypeSeance = ?, CodeClasse = ?, CodeMatiere = ?, Justifier = ? WHERE NumAbs = ?");
    $stmt->execute([$matProf, $session, $dateAbs, $seance, $motif, $typeSeance, $codeClasse, $codeMatiere, $justifier, $numAbs]);

    header('Location: index.php');
} elseif (isset($_GET['numAbs'])) {
    $numAbs = $_GET['numAbs'];

    // Fetch the record to be updated
    $stmt = $pdo->prepare("SELECT * FROM absensg WHERE NumAbs = ?");
    $stmt->execute([$numAbs]);
    $absence = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$absence) {
        die("Absence not found.");
    }
} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Absence</title>
</head>
<body>
    <h3>Update Absence</h3>
    <form action="update.php?numAbs=<?php echo $absence['NumAbs']; ?>" method="POST">
        <label for="matProf">MatriculeProf:</label>
        <select name="matProf">
        <?php
            $seanceStmt = $pdo->prepare("SELECT * FROM prof");
            $seanceStmt->execute();
            $seances = $seanceStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($seances as $seanceItem) {
                $selected = ($seanceItem['Matricule_Prof'] == $absence['MatriculeProf']) ? 'selected' : '';
                echo "<option value='{$seanceItem['Matricule_Prof']}' $selected>{$seanceItem['Matricule_Prof']}</option>";
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
                $selected = ($seanceItem['Numero'] == $absence['Session']) ? 'selected' : '';
                echo "<option value='{$seanceItem['Numero']}' $selected>{$seanceItem['Numero']}</option>";
            }
            ?>
        </select><br>

        <label for="dateAbs">DateAbs:</label>
        <input type="datetime-local" name="dateAbs" value="<?php echo date('Y-m-d\TH:i:s', strtotime($absence['DateAbs'])); ?>" required><br>

        <label for="seance">Seance:</label>
        <select name="seance">
            <?php
            $seanceStmt = $pdo->prepare("SELECT * FROM seances");
            $seanceStmt->execute();
            $seances = $seanceStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($seances as $seanceItem) {
                $selected = ($seanceItem['SEANCE'] == $absence['Seance']) ? 'selected' : '';
                echo "<option value='{$seanceItem['SEANCE']}' $selected>{$seanceItem['SEANCE']}</option>";
            }
            ?>
        </select><br>

        <label for="motif">Motif:</label>
        <input type="text" name="motif" value="<?php echo $absence['Motif']; ?>"><br>

        <label for="typeSeance">TypeSeance:</label>
        <input type="text" name="typeSeance" value="<?php echo $absence['TypeSeance']; ?>"><br>

        <label for="codeClasse">CodeClasse:</label>
        <select name="codeClasse">
            <?php
            $classeStmt = $pdo->prepare("SELECT * FROM classe");
            $classeStmt->execute();
            $classes = $classeStmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($classes as $classe) {
                $selected = ($classe['CodClasse'] == $absence['CodeClasse']) ? 'selected' : '';
                echo "<option value='{$classe['CodClasse']}' $selected>{$classe['IntClasse']}</option>";
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
                $selected = ($matiere['CodeMatiere'] == $absence['CodeMatiere']) ? 'selected' : '';
                echo "<option value='{$matiere['CodeMatiere']}' $selected>{$matiere['CodeMatiere']}</option>";
            }
            ?>
        </select><br>

        <label for="justifier">Justifier:</label>
        <input type="checkbox" name="justifier" <?php echo $absence['Justifier'] == 1 ? 'checked' : ''; ?>><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
