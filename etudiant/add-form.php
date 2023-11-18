<?php
include 'config.php';  
 $sql = "SELECT CodClasse, CodClasse FROM Classe";
 $result = $conn->query($sql);
 if ($result) {
    $all_classes = $result;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Ajouter Etudiant</h2>
    <form method="post" action="add.php" enctype="multipart/form-data">
        <label for="Nom">Nom:</label>
        <input type="text" name="Nom" id="Nom" required><br>

        <label for="DateNais">Date de Nais:</label>
        <input type="date" name="DateNais" id="DateNais" required><br>

        <label for="NCIN">NCIN:</label>
        <input type="text" name="NCIN" id="NCIN" required><br>

        <label for="NCE">NCE</label>
        <input type="text" name="NCE" id="NCE" required><br>

        <label for="TypBac">Type du Bac:</label>
        <input type="text" name="TypBac" id="TypBac" required><br>

        <label for="Prénom">Prénom:</label>
        <input type="text" name="Prénom" id="Prénom" required><br>

        <label for="Sexe">Sexe:</label>
        <input type="int" name="Sexe" id="Sexe" required><br>

        <label for="LieuNais">LieuNais:</label>
        <input type="text" name="LieuNais" id="LieuNais" required><br>

        <label for="Adresse">Adresse:</label>
        <input type="text" name="Adresse" id="Adresse" required><br>

        <label for="Ville">Ville:</label>
        <input type="text" name="Ville" id="Ville" required><br>

        <label for="CodePostal">CodePostal:</label>
        <input type="smallint" name="CodePostal" id="CodePostal" required><br>

        <label for="N_Tel">N°Tél:</label>
        <input type="text" name="N_Tel" id="N_Tel" required><br>
        <label for="CodClasse">Select Classe:</label>
        <select name="CodClasse" required>
        <?php 
                
                while ($classe = mysqli_fetch_array(
                        $all_classes,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $classe["CodClasse"];
                ?>">
                    <?php echo $classe["CodClasse"];
                    ?>
                </option>
            <?php 
                endwhile; 
            ?>
           
        </select><br/>
        <label for="DecisionConseil">Décision du Conseil:</label>
        <input type="text" name="DecisionConseil" id="DecisionConseil" required><br>


        <label for="AnneeUniversitaire">Année Unversitaire:</label>
        <input type="date" name="AnneeUniversitaire" id="AnneeUniversitaire" required><br>


        <label for="Semestre">Semestre:</label>
        <input type="text" name="Semestre" id="Semestre" required><br>

        <label for="Dispenser">Dispenser:</label>
        <input type="text" name="Dispenser" id="Dispenser" required><br>


        <label for="Annees opt">Annees opt:</label>
        <input type="date" name="AnneesOpt" id="AnneesOpt" required><br>

        <label for="Première Inscp">Première Inscp:</label>
        <input type="date" name="DatePremiereInscp" id="DatePremiereInscp" required><br>

        <label for="Gouvernorat">Gouvernorat:</label>
        <input type="text" name="Gouvernorat" id="Gouvernorat" required><br>

        <label for="Mention du Bac">Mention du Bac:</label>
        <input type="text" name="MentionBac" id="MentionBac" required><br>

        <label for="Nationalite">Nationalité:</label>
        <input type="text" name="Nationalite" id="Nationalite" required><br>

        <label for="Code CNSS">Code CNSS:</label>
        <input type="text" name="CodeCNSS" id="CodeCNSS" required><br>

        <label for="NomArabe">Nom Arabe:</label>
        <input type="text" name="NomArabe" id="NomArabe" required><br>

        <label for="PrenomArabe">PrenomArabe:</label>
        <input type="text" name="PrenomArabe" id="PrenomArabe" required><br>

        <label for="LieuNaisArabe">LieuNais Arabe:</label>
        <input type="text" name="LieuNaisArabe" id="LieuNaisArabe" required><br>

        <label for="AdresseArabe">Adresse Arabe:</label>
        <input type="text" name="AdresseArabe" id="AdresseArabe" required><br>

        <label for="VilleArabe">Ville Arabe:</label>
        <input type="text" name="VilleArabe" id="VilleArabe" required><br>

        <label for="GouvernoratArabe">GouvernoratArabe:</label>
        <input type="text" name="GouvernoratArabe" id="GouvernoratArabe" required><br>

        <label for="TypeBacAB">TypeBacAB:</label>
        <input type="text" name="TypeBacAB" id="TypeBacAB" required><br>

        <label for="Photo">Photo:</label>
        <input type="file" name="Photo" id="Photo" accept=".pdf, .jpg, .jpeg, .png" required><br>

        <label for="Origine">Origine:</label>
        <input type="text" name="Origine" id="Origine" required><br>

        <label for="SituationDpart">SituationDpart:</label>
        <input type="text" name="SituationDpart" id="SituationDpart" required><br>

        <label for="NBAC">NBAC:</label>
        <input type="text" name="NBAC" id="NBAC" required><br>

        <label for="Redaut">Redaut:</label>
        <input type="text" name="Redaut" id="Redaut" required><br>
        <input type="submit" name="add_etudiant" value="add_etudiant">
    </form>

</body>

</html>