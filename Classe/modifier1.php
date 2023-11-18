<?php

require "connexion.php";

$codeclasse = $_POST['code_classe'];

// Vérifier si la nouvelle clé primaire existe déjà
$checkQuery = "SELECT * FROM classe WHERE CodClasse = :codeclasse";
$checkStatement = $idcom->prepare($checkQuery);
$checkStatement->bindParam(':codeclasse', $codeclasse);
$checkStatement->execute();

if ($checkStatement->rowCount() > 0) {
    // La clé primaire existe déjà, générer un script JavaScript pour afficher l'alerte
    echo "<script>alert('Cette clé primaire est déjà utilisée. Veuillez choisir une autre clé.');</script>";
} else {
    // La clé primaire n'existe pas encore, procéder à la mise à jour
    $classe = $_POST['classe'];
    $depar = $_POST['department'];
    $option = $_POST['option'];
    $niveau = $_POST['niveau'];
    $classearab = $_POST['classe_arab'];
    $optionarab = $_POST['option_arab'];
    $departmentarab = $_POST['departement_arab'];
    $niveauarab = $_POST['niveau_arab'];
    $codeetape = $_POST['code_etape'];
    $codesalima = $_POST['code_Salima'];

    $req = "UPDATE `classe` SET CodClasse='$codeclasse',IntClasse='$classe',Departement='$depar',Optionn='$option',
    Niveau='$niveau',IntCalsseArabB='$classearab',OptionAaraB='$optionarab',
    DepartementAaraB='$departmentarab',NiveauAaraB='$niveauarab',CodeEtape='$codeetape',CodeSalima='$codesalima' WHERE CodClasse=$codeclasse";
    
    $idcom->exec($req);
    header('location:liste.php');
}

?>
