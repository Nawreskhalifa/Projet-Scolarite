


<?php
require "connexion.php";

// Fetch sessions
$sql = "SELECT Sem FROM session";
$result = $idcon->query($sql);
$all_sessions = $result->fetchAll(PDO::FETCH_ASSOC);

// Fetch professors
$sql = "SELECT `Matricule Prof` FROM prof";
$result = $idcon->query($sql);
$all_profs = $result->fetchAll(PDO::FETCH_ASSOC);

// Fetch matieres
$sql = "SELECT `Code Matière` FROM matieres";
$result = $idcon->query($sql);
$all_NumMats = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
        }
        form {
            text-align: left;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        button[type="submit"] {
            background-color: #008080;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }
        button[type="reset"] {
            background-color: #ccc;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }
        a {
            text-decoration: none; 
            padding: 10px 20px; 
            background-color: #008080; 
            color: #fff; 
            border-radius: 5px; 
            margin: 5px; 
        }
        a:hover {
            background-color: #0056b3; 
        }
        </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter une Cellule</h1>
        <form method="POST">
            <label for="NumCell">NumCell</label>
            <input type="text" name="NumCell" required><br><br>

            <label for='NumProf'>Matricule Prof</label>
            <select name="NumProf" required>
                <?php foreach ($all_profs as $prof): ?>
                    <option value="<?php echo $prof["Matricule Prof"]; ?>">
                        <?php echo $prof["Matricule Prof"]; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label for='NumMat'>NumMat</label>
            <select name="NumMat" required>
                <?php foreach ($all_NumMats as $NumMat): ?>
                    <option value="<?php echo $NumMat["Code Matière"]; ?>">
                        <?php echo $NumMat["Code Matière"]; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label for='session'>Session</label>
            <select name="session" required>
                <?php foreach ($all_sessions as $session): ?>
                    <option value="<?php echo $session["Sem"]; ?>">
                        <?php echo $session["Sem"]; ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <button type="reset">Annuler</button>
            <button type="submit" name="Valider">Valider</button>
            <a href="afficherCell.php">Home</a>
        </form>
    </div>
</body>
</html>
