<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <div class="header-container">
            <div class="link-container">
                <a class="link" href="AjouteSalle.php">Ajouter un Salle</a>
            </div>
            <div class="search-container">
                <!-- Search form -->
                <form action="AffichierSalle.php" method="GET">
                    <input type="text" name="query" placeholder="Rechercher...">
                    <select name="search_field" style="margin-bottom: 10px;">
                        <option value="Salle">Salle</option>
                        <option value="Departement">Departement</option>
                        <option value="Catégorie">Catégorie</option>
                        <option value="Responsable">Responsable</option>
                        <option value="Charge">Charge</option>
                        <option value="NbPlaceExamen">NbPlaceExamen</option>
                        <option value="NbLignes">NbLignes</option>
                        <option value="NBCol">NBCol</option>
                        <option value="NBSurv">NBSurv</option>
                        <option value="Type">Type</option>
                        <option value="Disponible">Disponible</option>
                    </select>
                    <button type="submit" name="valider" value="Rechercher">Rechercher</button>
                </form>
               <a href="AffichierSalle.php" ><img src='../images/tab.png' alt=''style="margin-top: 15px;"></a>
            </div>
        </div>

        <?php
        include_once "../connect_ddb.php";

        if (isset($_GET["query"], $_GET["search_field"])) {
            $query = mysqli_real_escape_string($conn, $_GET["query"]); // Sanitize input to prevent SQL injection
            $searchField = mysqli_real_escape_string($conn, $_GET["search_field"]);

            $sql = "SELECT * FROM Salle WHERE $searchField LIKE '%$query%'"; // Use the selected search field
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $searchResults = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Afficher le tableau uniquement si des résultats sont disponibles
                if (!empty($searchResults)) {
                    echo "<div class='search-results-container'>";
                    echo "<table>";
                    // En-têtes du tableau
                    echo "<tr>";
                    foreach ($searchResults[0] as $key => $value) {
                        echo "<th>$key</th>";
                    }
                    echo "</tr>";

                    // Données du tableau
                    foreach ($searchResults as $result) {
                        echo "<tr>";
                        foreach ($result as $value) {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }

                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<p style='margin: 20px;'>Aucun résultat trouvé.</p>";
                }
            } else {
                // Handle query execution error
                die("Error executing the search query: " . mysqli_error($conn));
            }
        } else {
            // Si aucune recherche n'est effectuée, afficher le tableau complet
            $sql = "SELECT * FROM Salle";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Salle</th>";
                echo "<th>Departement</th>";
                echo "<th>Catégorie</th>";
                echo "<th>Responsable</th>";
                echo "<th>Charge</th>";
                echo "<th>NbPlaceExamen</th>";
                echo "<th>NbLignes</th>";
                echo "<th>NBCol</th>";
                echo "<th>NBSurv</th>";
                echo "<th>Type</th>";
                echo "<th>Disponible</th>";
                echo "<th>MOD</th>";
                echo "<th>SUPP</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    // Afficher les données du tableau complet
                    echo "<tr>";
                    echo "<td>{$row['Salle']}</td>";
                    echo "<td>{$row['Departement']}</td>";
                    echo "<td>{$row['Catégorie']}</td>";
                    echo "<td>{$row['Responsable']}</td>";
                    echo "<td>{$row['Charge']}</td>";
                    echo "<td>{$row['NbPlaceExamen']}</td>";
                    echo "<td>{$row['NbLignes']}</td>";
                    echo "<td>{$row['NBCol']}</td>";
                    echo "<td>{$row['NBSurv']}</td>";
                    echo "<td>{$row['Type']}</td>";
                    echo "<td>{$row['Disponible']}</td>";



                    // ... (Ajoutez les autres colonnes)
                    echo "<td class='image'><a href='ModifieSalle.php?id={$row['Salle']}'><img src='../images/write.png' alt=''></a></td>";
                    echo "<td class='image'><a href='SupprimerSalle.php?id={$row['Salle']}'><img src='../images/remove.png' alt=''></a></td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p style='margin: 20px;'>Aucun enregistrement trouvé.</p>";
            }
        }
        ?>

    </main>
   
</body>
</html>
