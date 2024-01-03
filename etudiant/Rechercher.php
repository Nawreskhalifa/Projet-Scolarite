<?php
$pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Utilisation de la méthode du méta-critère pour rechercher dans tous les champs
    $searchTerms = array(
        'Nom', 'DateNais', 'NCIN', 'NCE', 'TypBac', 'Prénom', 'Sexe', 'LieuNais', 'Adresse', 'Ville',
        'CodePostal', 'N_Tel', 'CodClasse', 'DecisionConseil', 'AnneeUniversitaire', 'Semestre', 'Dispenser',
        'AnneesOpt', 'DatePremiereInscp', 'Gouvernorat', 'MentionBac', 'Nationalite', 'CodeCNSS', 'NomArabe',
        'PrenomArabe', 'LieuNaisArabe', 'AdresseArabe', 'VilleArabe', 'GouvernoratArabe', 'TypeBacAB', 'Origine',
        'SituationDpart', 'NBAC', 'Redaut'
    );
    $conditions = array();
    $parameters = array();
    foreach ($searchTerms as $term) {
        if (isset($_POST[$term])) {
            // Vérifier si le champ n'est pas vide avant d'ajouter la condition
            if (!empty($_POST[$term])) {
                $conditions[] = "$term LIKE :$term";
                $parameters[":$term"] = '%' . $_POST[$term] . '%';
            }
        }
    }

    $query = "SELECT * FROM etudiant";

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $pdo->prepare($query);

    foreach ($parameters as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<h3>Résultats de la Recherche :</h3>";
        echo "<a href='add-form.php'>Ajouter</a>";
        echo "<table border='1'>
        <tr>
        <!-- Liste des colonnes de la table etudiant -->
        <th>Nom</th>
        <th>DateNais</th>
        <th>NCIN</th>
        <th>NCE</th>
        <th>TypBac</th>
        <th>Prénom</th>
        <th>Sexe</th>
        <th>LieuNais</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>CodePostal</th>
        <th>N°Tél</th>
        <th>CodClasse</th>
        <th>Décision du Conseil</th>
        <th>Année Unversitaire</th>
        <th>Semestre</th>
        <th>Dispenser</th>
        <th>Annees opt</th>
        <th>Première Inscp</th>
        <th>Gouvernorat</th>
        <th>Mention du Bac</th>
        <th>Nationalite</th>
        <th>Code CNSS</th>
        <th>NomArabe</th>
        <th>PrenomArabe</th>
        <th>LieuNaisArabe</th>
        <th>AdresseArabe</th>
        <th>VilleArabe</th>
        <th>GouvernoratArabe</th>
        <th>TypeBacAB</th>
        <th>Photo</th>
        <th>Origine</th>
        <th>SituationDpart</th>
        <th>NBAC</th>
        <th>Redaut</th>
    </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["Nom"] . "</td>";
            echo "<td>" . $row["DateNais"] . "</td>";
            echo "<td>" . $row["NCIN"] . "</td>";
            echo "<td>" . $row["NCE"] . "</td>";
            echo "<td>" . $row["TypBac"] . "</td>";
            echo "<td>" . $row["Prénom"] . "</td>";
            echo "<td>" . $row["Sexe"] . "</td>";
            echo "<td>" . $row["LieuNais"] . "</td>";
            echo "<td>" . $row["Adresse"] . "</td>";
            echo "<td>" . $row["Ville"] . "</td>";
            echo "<td>" . $row["CodePostal"] . "</td>";
            echo "<td>" . $row["N_Tel"] . "</td>";
            echo "<td>" . $row["CodClasse"] . "</td>";
            echo "<td>" . $row["DecisionConseil"] . "</td>";
            echo "<td>" . $row["AnneeUniversitaire"] . "</td>";
            echo "<td>" . $row["Semestre"] . "</td>";
            echo "<td>" . $row["Dispenser"] . "</td>";
            echo "<td>" . $row["AnneesOpt"] . "</td>";
            echo "<td>" . $row["DatePremiereInscp"] . "</td>";
            echo "<td>" . $row["Gouvernorat"] . "</td>";
            echo "<td>" . $row["MentionBac"] . "</td>";
            echo "<td>" . $row["Nationalite"] . "</td>";
            echo "<td>" . $row["CodeCNSS"] . "</td>";
            echo "<td>" . $row["NomArabe"] . "</td>";
            echo "<td>" . $row["PrenomArabe"] . "</td>";
            echo "<td>" . $row["LieuNaisArabe"] . "</td>";
            echo "<td>" . $row["AdresseArabe"] . "</td>";
            echo "<td>" . $row["VilleArabe"] . "</td>";
            echo "<td>" . $row["GouvernoratArabe"] . "</td>";
            echo "<td>" . $row["TypeBacAB"] . "</td>";
            echo "<td>" . $row["Photo"] . "</td>";
            echo "<td>" . $row["Origine"] . "</td>";
            echo "<td>" . $row
            ["SituationDpart"] . "</td>";
            echo "<td>" . $row["NBAC"] . "</td>";
            echo "<td>" . $row["Redaut"] . "</td>";
            echo "<td>Actions</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Aucune étudiant trouvée.";
    }
} else {
    echo "Veuillez utiliser le formulaire de recherche pour rechercher un étudiant.";
}

$pdo = null;
?>
