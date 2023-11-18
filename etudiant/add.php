<?php
include 'config.php'; 

if (isset($_POST['add_etudiant'])) {
    $Nom = $_POST['Nom'];
    $DateNais = $_POST['DateNais'];
    $NCIN = $_POST['NCIN'];
    $NCE = $_POST['NCE'];
    $TypBac = $_POST['TypBac'];
    $Prénom = $_POST['Prénom'];
    $Sexe = $_POST['Sexe'];
    $LieuNais = $_POST['LieuNais'];
    $Adresse = $_POST['Adresse'];
    $Ville = $_POST['Ville'];
    $CodePostal = $_POST['CodePostal'];
    $N_Tel = $_POST['N_Tel'];
    $CodClasse = $_POST['CodClasse'];
    $DecisionConseil = $_POST['DecisionConseil'];
    $AnneeUniversitaire = $_POST['AnneeUniversitaire'];
    $Semestre = $_POST['Semestre'];
    $Dispenser = $_POST['Dispenser'];
    $AnneesOpt = $_POST['AnneesOpt'];
    $DatePremiereInscp = $_POST['DatePremiereInscp'];
    $Gouvernorat = $_POST['Gouvernorat'];
    $MentionBac = $_POST['MentionBac'];
    $Nationalite = $_POST['Nationalite'];
    $CodeCNSS = $_POST['CodeCNSS'];
    $NomArabe = $_POST['NomArabe'];
    $PrenomArabe = $_POST['PrenomArabe'];
    $LieuNaisArabe = $_POST['LieuNaisArabe'];
    $AdresseArabe = $_POST['AdresseArabe'];
    $VilleArabe = $_POST['VilleArabe'];
    $GouvernoratArabe = $_POST['GouvernoratArabe'];
    $TypeBacAB = $_POST['TypeBacAB'];
    $Origine = $_POST["Origine"];
    $SituationDepart = $_POST["SituationDpart"];
    $NBAC = $_POST["NBAC"];
    $Redaut = $_POST["Redaut"];
    // Handle file upload separately and move the file to the desired location

    // Assuming you have a folder named "uploads" for storing uploaded files
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["Photo"]["name"]);

    // Check if the file was uploaded successfully
    if (move_uploaded_file($_FILES["Photo"]["tmp_name"], $targetFile)) {
        // File upload was successful, continue with database insertion
        // You may want to perform further validation on the file before storing its path in the database

        // SQL query to insert data into the "etudiant" table
        $sql = "INSERT INTO etudiant (Nom, DateNais, NCIN, NCE, TypBac, Prénom, Sexe, LieuNais, Adresse, Ville, CodePostal, N_Tel, CodClasse, DecisionConseil, AnneeUniversitaire, Semestre, Dispenser, AnneesOpt, DatePremiereInscp, Gouvernorat, MentionBac, Nationalite, CodeCNSS, NomArabe, PrenomArabe, LieuNaisArabe, AdresseArabe, VilleArabe, GouvernoratArabe, TypeBacAB, Photo, Origine, SituationDpart, NBAC, Redaut) 
                VALUES ('$Nom', '$DateNais', '$NCIN', '$NCE', '$TypBac', '$Prénom', '$Sexe', '$LieuNais', '$Adresse', '$Ville', '$CodePostal', '$N_Tel', '$CodClasse', '$DecisionConseil', '$AnneeUniversitaire', '$Semestre', '$Dispenser', '$AnneesOpt', '$DatePremiereInscp', '$Gouvernorat', '$MentionBac', '$Nationalite', '$CodeCNSS', '$NomArabe', '$PrenomArabe', '$LieuNaisArabe', '$AdresseArabe', '$VilleArabe', '$GouvernoratArabe', '$TypeBacAB', '$targetFile', '$Origine', '$SituationDepart', '$NBAC', '$Redaut')";

        if ($conn->query($sql) === TRUE) {
            // Data insertion was successful
            header("location: select.php");
        } else {
            // Error occurred while inserting data
            echo "Error: " . $conn->error;
        }
    } else {
        // File upload failed
        echo "File upload failed.";
    }
}
?>
