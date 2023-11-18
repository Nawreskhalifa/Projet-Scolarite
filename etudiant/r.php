<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barre de Recherche</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h3>Recherche des etudiants:</h3>
    
   
    <form method="post" action="Rechercher.php">
    <label for="Nom">Nom:</label>
        <input type="text" name="Nom" id="Nom" ><br>

        <label for="DateNais">Date de Nais:</label>
        <input type="date" name="DateNais" id="DateNais" ><br>

        <label for="NCIN">NCIN:</label>
        <input type="text" name="NCIN" id="NCIN" ><br>

        <label for="NCE">NCE</label>
        <input type="text" name="NCE" id="NCE" ><br>

        <label for="TypBac">Type du Bac:</label>
        <input type="text" name="TypBac" id="TypBac" ><br>

        <label for="Prénom">Prénom:</label>
        <input type="text" name="Prénom" id="Prénom" ><br>

        <label for="Sexe">Sexe:</label>
        <input type="int" name="Sexe" id="Sexe" ><br>

        <label for="LieuNais">LieuNais:</label>
        <input type="text" name="LieuNais" id="LieuNais" ><br>

        <label for="Adresse">Adresse:</label>
        <input type="text" name="Adresse" id="Adresse"><br>

        <label for="Ville">Ville:</label>
        <input type="text" name="Ville" id="Ville" ><br>

        <label for="CodePostal">CodePostal:</label>
        <input type="smallint" name="CodePostal" id="CodePostal" ><br>

        <label for="N_Tel">N°Tél:</label>
        <input type="text" name="N_Tel" id="N_Tel" ><br>

        <label for="CodClasse">Select Classe:</label>
        <select name="CodClasse" >
       
                
    
            

        <label for="DecisionConseil">Décision du Conseil:</label>
        <input type="text" name="DecisionConseil" id="DecisionConseil" ><br>


        <label for="AnneeUniversitaire">Année Unversitaire:</label>
        <input type="date" name="AnneeUniversitaire" id="AnneeUniversitaire" ><br>


        <label for="Semestre">Semestre:</label>
        <input type="text" name="Semestre" id="Semestre" ><br>

        <label for="Dispenser">Dispenser:</label>
        <input type="text" name="Dispenser" id="Dispenser" ><br>


        <label for="Annees opt">Annees opt:</label>
        <input type="date" name="AnneesOpt" id="AnneesOpt" ><br>

        <label for="Première Inscp">Première Inscp:</label>
        <input type="date" name="DatePremiereInscp" id="DatePremiereInscp" ><br>

        <label for="Gouvernorat">Gouvernorat:</label>
        <input type="text" name="Gouvernorat" id="Gouvernorat" ><br>

        <label for="Mention du Bac">Mention du Bac:</label>
        <input type="text" name="MentionBac" id="MentionBac" ><br>

        <label for="Nationalite">Nationalité:</label>
        <input type="text" name="Nationalite" id="Nationalite" ><br>

        <label for="Code CNSS">Code CNSS:</label>
        <input type="text" name="CodeCNSS" id="CodeCNSS" ><br>

        <label for="NomArabe">Nom Arabe:</label>
        <input type="text" name="NomArabe" id="NomArabe" ><br>

        <label for="PrenomArabe">PrenomArabe:</label>
        <input type="text" name="PrenomArabe" id="PrenomArabe" ><br>

        <label for="LieuNaisArabe">LieuNais Arabe:</label>
        <input type="text" name="LieuNaisArabe" id="LieuNaisArabe" ><br>

        <label for="AdresseArabe">Adresse Arabe:</label>
        <input type="text" name="AdresseArabe" id="AdresseArabe" ><br>

        <label for="VilleArabe">Ville Arabe:</label>
        <input type="text" name="VilleArabe" id="VilleArabe" ><br>

        <label for="GouvernoratArabe">GouvernoratArabe:</label>
        <input type="text" name="GouvernoratArabe" id="GouvernoratArabe" ><br>

        <label for="TypeBacAB">TypeBacAB:</label>
        <input type="text" name="TypeBacAB" id="TypeBacAB" ><br>

        <label for="Photo">Photo:</label>
        <input type="file" name="Photo" id="Photo" accept=".pdf, .jpg, .jpeg, .png" ><br>

        <label for="Origine">Origine:</label>
        <input type="text" name="Origine" id="Origine" ><br>

        <label for="SituationDpart">SituationDpart:</label>
        <input type="text" name="SituationDpart" id="SituationDpart" ><br>

        <label for="NBAC">NBAC:</label>
        <input type="text" name="NBAC" id="NBAC" ><br>

        <label for="Redaut">Redaut:</label>
        <input type="text" name="Redaut" id="Redaut"><br>

        
        <input type="submit" value="Rechercher">
      

</body>
</html>


