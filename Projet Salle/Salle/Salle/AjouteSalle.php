<?php
include_once "../connect_ddb.php";

if (isset($_POST['send'])) {
    if (
        isset($_POST['Salle']) &&
        isset($_POST['Departement']) &&
        isset($_POST['Catégorie']) &&
        isset($_POST['Responsable']) &&
        isset($_POST['Charge']) &&
        isset($_POST['NbPlaceExamen']) &&
        isset($_POST['NbLignes']) &&
        isset($_POST['NBCol']) &&
        isset($_POST['NBSurv']) &&
        isset($_POST['Type']) &&
        isset($_POST['Disponible']) &&
        $_POST['Salle'] != "" &&
        $_POST['Departement'] != "" &&
        $_POST['Catégorie'] != "" &&
        $_POST['Responsable'] != "" &&
        $_POST['Charge'] != "" &&
        $_POST['NbPlaceExamen'] != "" &&
        $_POST['NbLignes'] != "" &&
        $_POST['NBCol'] != "" &&
        $_POST['NBSurv'] != "" &&
        $_POST['Type'] != "" &&
        $_POST['Disponible'] != ""
    ) {
        extract($_POST);

        // Assuming 'Departement' is a foreign key in the 'Salle' table
        $sql = "INSERT INTO Salle (Salle, Departement, Catégorie, Responsable, Charge, NbPlaceExamen, NbLignes, NBCol, NBSurv, Type, Disponible) VALUES ('$Salle', '$Departement', '$Catégorie', '$Responsable', '$Charge', '$NbPlaceExamen', '$NbLignes', '$NBCol', '$NBSurv', '$Type', '$Disponible')";

        if (mysqli_query($conn, $sql)) {
            header("location:AffichierSalle.php");
        } else {
            header("location:AjouteSalle.php?message=AddFail");
        }
    } else {
        header("location:AjouteSalle.php?message=EmptyFields");
    }
}

$sql = "SELECT Departement FROM departements";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    $all_Departements = $result;
} else {
    echo "Error fetching records: " . $conn->error;
}


$sql = "SELECT Responsable FROM departements";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    $all_Responsables = $result;
} else {
    echo "Error fetching records: " . $conn->error;
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

<form action="AjouteSalle.php" method="post">
    <h1> Ajouter Un Salle </h1>
    <div class="form-group">
            <label for='Departement'>Departement</label>
            <select name="Departement" required>
                <?php while ($departement = mysqli_fetch_array($all_Departements, MYSQLI_ASSOC)) : ?>
                    <option value="<?php echo $departement["Departement"]; ?>">
                        <?php echo $departement["Departement"]; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

    <input type="text" name="Catégorie" placeholder="Catégorie">

    <div class="form-group">
            <label for='Responsable'>Responsable</label>
            <select name="Responsable" required>
                <?php while ($Responsable = mysqli_fetch_array($all_Responsables, MYSQLI_ASSOC)) : ?>
                    <option value="<?php echo $Responsable["Responsable"]; ?>">
                        <?php echo $Responsable["Responsable"]; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>



    
    <input type="text" name="Charge" placeholder="Charge">
    <input type="text" name="NbPlaceExamen" placeholder="Nombre Place Examen">
    <input type="text" name="NbLignes" placeholder="Nombre De Lignes">
    <input type="text" name="NBCol" placeholder="Nombre De Colonne">
    <input type="text" name="NBSurv" placeholder="Nombre De Survient">
    <input type="text" name="Type" placeholder="Type">

    <label>
        <input type="checkbox" value="Disponible" name="Disponible" <?php if (isset($Disponible) && is_array($Disponible) && in_array("Disponible", $Disponible)) echo "checked" ?>/> Disponible
    </label>
    <label>
        <input type="checkbox" value="Non Disponible" name="Disponible" <?php if (isset($Disponible) && is_array($Disponible) && in_array("Non Disponible", $Disponible)) echo "checked" ?>/> Non Disponible
    </label>

    <input type="submit" value="Ajouter" name="send">
    <a class="link back" href="AffichierSalle.php"> Annuler</a>
</form>

    

</body>

</html>
