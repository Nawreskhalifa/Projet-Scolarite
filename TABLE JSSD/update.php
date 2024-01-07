<?php
include 'connexion.php';

// Fetch data for dropdowns
$sqlSalle = "SELECT Salle FROM salle";
$resultSalle = $conn->query($sqlSalle);
$all_Salles = $resultSalle;

$sqlSeance = "SELECT Seance FROM seances";
$resultSeance = $conn->query($sqlSeance);
$all_seances = $resultSeance;

if (isset($_GET['delete'])) {
    // Your delete logic
}

if (isset($_POST['update'])) {
    // Your update logic
}

$sql = "SELECT * FROM JSSD";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- your head content -->
</head>

<body>
    <form action="update.php" method="GET">
        <!-- Your search form -->
    </form>

    <div class="container mt-4">
        <!-- Your table code -->
        <table id="myTable">
            <!-- Table header -->
            <tr>
                <th>Jour</th>
                <th>Séance</th>
                <th>Salle</th>
                <th>NDist</th>
                <th>Groupe</th>
                <th>Actions</th>
            </tr>

            <?php
            // Fetch options for dropdowns
            $all_Salles_options = $resultSalle->fetch_all(MYSQLI_ASSOC);
            $all_seances_options = $resultSeance->fetch_all(MYSQLI_ASSOC);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['Jour'] . "</td>
                            <td>" . $row['Séance'] . "</td>
                            <td>" . $row['Salle'] . "</td>
                            <td>" . $row['NDist'] . "</td>
                            <td>" . $row['Groupe'] . "</td>
                            <td>
                                <form method='post' action=''>
                                    <input type='hidden' name='jour' value='" . $row['Jour'] . "'>
                                    <div class='form-group'>
                                        <label for='seance'>Seance</label>
                                        <select name='seance' required>";
                                            // Display options for Seance
                                            foreach ($all_seances_options as $seance) {
                                                echo "<option value='" . $seance["Seance"] . "'>" . $seance["Seance"] . "</option>";
                                            }
                                        echo "</select>
                                    </div>
                                    <div class='form-group'>
                                        <label for='Salle'>Salle</label>
                                        <select name='salle' required>";
                                            // Display options for Salle
                                            foreach ($all_Salles_options as $salle) {
                                                echo "<option value='" . $salle["Salle"] . "'>" . $salle["Salle"] . "</option>";
                                            }
                                        echo "</select>
                                    </div>
                                    <input type='text' name='ndist' value='" . $row['NDist'] . "' class='form-control mb-2'>
                                    <input type='text' name='groupe' value='" . $row['Groupe'] . "' class='form-control mb-2'>
                                    <input type='submit' name='update' value='Update' class='btn btn-primary mr-2'>
                                </form>
                                <a href='?delete=" . $row['Jour'] . "' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Your scripts -->
</body>

</html>
