<?php
include 'connexion.php';

// Fetch data from the 'absensg' table
$stmt = $pdo->prepare("SELECT * FROM absensg");
$stmt->execute();
$absences = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absence List</title>
</head>
<body>
    <h3>Absence List</h3>
    
    <table border="1">
        <thead>
            <tr>
                <th>NumAbs</th>
                <th>MatriculeProf</th>
                <th>Session</th>
                <th>DateAbs</th>
                <th>Seance</th>
                <th>Motif</th>
                <th>TypeSeance</th>
                <th>CodeClasse</th>
                <th>CodeMatiere</th>
                <th>Justifier</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($absences as $absence): ?>
                <tr>
                    <td><?= $absence['NumAbs'] ?></td>
                    <td><?= $absence['MatriculeProf'] ?></td>
                    <td><?= $absence['Session'] ?></td>
                    <td><?= $absence['DateAbs'] ?></td>
                    <td><?= $absence['Seance'] ?></td>
                    <td><?= $absence['Motif'] ?></td>
                    <td><?= $absence['TypeSeance'] ?></td>
                    <td><?= $absence['CodeClasse'] ?></td>
                    <td><?= $absence['CodeMatiere'] ?></td>
                    <td><?= $absence['Justifier'] == 1 ? 'Yes' : 'No' ?></td>
                    <td>
                        <a href="update.php?numAbs=<?= $absence['NumAbs'] ?>">
                            <button>Update</button>
                        </a>
                        <a href="delete.php?numAbs=<?= $absence['NumAbs'] ?>">
                            <button>Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>

    <a href="create.php">
        <button>Create Absence</button>
    </a>
</body>
</html>
