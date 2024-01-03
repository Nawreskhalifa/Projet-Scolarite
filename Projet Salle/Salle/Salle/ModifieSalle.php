<?php
//$Salle = $_GET['id'];
$Salle = isset($_GET['id']) ? $_GET['id'] : ''; // Set $Salle to an empty string if 'id' is not set

if(isset($_POST['send']))
{
    if(isset($_POST['Salle'])
    && isset($_POST['Departement'])
    && isset($_POST['Catégorie'])
    && isset($_POST['Responsable'])
    && isset($_POST['Charge'])
    && isset($_POST['NbPlaceExamen'])
    && isset($_POST['NbLignes'])
    && isset($_POST['NBCol'])
    && isset($_POST['NBSurv'])
    && isset($_POST['Type'])
    && isset($_POST['Disponible'])
    && $_POST['Salle'] != ""
    && $_POST['Departement'] != ""
    && $_POST['Catégorie'] != ""
    && $_POST['Responsable'] != ""
    && $_POST['Charge'] != ""
    && $_POST['NbPlaceExamen'] != ""
    && $_POST['NbLignes'] != ""
    && $_POST['NBCol'] != ""
    && $_POST['NBSurv'] != ""
    && $_POST['Type'] != ""
    && $_POST['Disponible'] != ""
    ) 
    {
        include_once "../connect_ddb.php";
        extract($_POST) ;
        $sql ="UPDATE Salle SET Salle = '$Salle', Departement = '$Departement', Catégorie = '$Catégorie',  Responsable = '$Responsable', Charge = '$Charge', NbPlaceExamen = '$NbPlaceExamen', NbLignes = '$NbLignes', NBCol = '$NBCol', NBSurv = '$NBSurv', Type = '$Type', Disponible = '$Disponible' WHERE Salle = '$Salle'";
    
        if (mysqli_query($conn, $sql)) 
        {
        header("location:AffichierSalle.php");
        } 
        else 
        {
        header("location:AffichierSalle.php?message=ModiFail");
        }
    
    
    } 
    else
    {
        header("location:AffichierSalle.php?message=EmptyFields");

    }

    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Un Salle</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
    include_once "../connect_ddb.php";
    $sql = "SELECT * FROM Salle WHERE Salle = '$Salle'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
    ?>
    <form action="ModifieSalle.php" method="post">
        <h1>Modifier Un Salle</h1>
    <input type="text" , name="Salle"        value="<?=$row['Salle']?>" placeholder="Identifient De Salle">
    <input type="text" , name="Departement"  value="<?=$row['Departement']?>" placeholder="Departement" >
    <input type="text" , name="Catégorie"    value="<?=$row['Catégorie']?>" placeholder="Catégorie" >
    <input type="text" , name="Responsable"  value="<?=$row['Responsable']?>" placeholder="Responsable" >
    <input type="text" , name="Charge"       value="<?=$row['Charge']?>" placeholder="Charge" >
    <input type="text" , name="NbPlaceExamen"value="<?=$row['NbPlaceExamen']?>" placeholder="Nombre Place Examen" >
    <input type="text" , name="NbLignes"     value="<?=$row['NbLignes']?>" placeholder="Nombre De Lignes" >
    <input type="text" , name="NBCol"        value="<?=$row['NBCol']?>" placeholder="Nombre De Colonne" >
    <input type="text" , name="NBSurv"       value="<?=$row['NBSurv']?>" placeholder="Nombre De Survient" >
    <input type="text" , name="Type"         value="<?=$row['Type']?>" placeholder="Type" >
    
<label>
    <input type="checkbox" value="Disponible" name="Disponible" <?php if (isset($Disponible) && is_array($Disponible) && in_array("Disponible", $Disponible)) echo "checked"?>/> Disponible
</label>
<label>
    <input type="checkbox" value="Non Disponible" name="Disponible" <?php if (isset($Disponible) && is_array($Disponible) && in_array("Non Disponible", $Disponible)) echo "checked"?>/> Non Disponible
</label>


        <input type="submit" value="Modifier" name="send">
        <a class="link back" href="AffichierSalle.php">Annuler</a>
    </form>
    <?php
    }
    ?>
</body>
</html>



