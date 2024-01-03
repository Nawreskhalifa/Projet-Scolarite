<?php
$Salle = $_GET['id']; // Assurez-vous que 'id' est le nom correct du paramètre GET dans l'URL

include_once "../connect_ddb.php";

// Utilisez des guillemets simples pour entourer la variable $Salle dans la requête SQL
$sql = "DELETE FROM Salle WHERE Salle = '$Salle'";

// Execute the SQL query
if (mysqli_query($conn, $sql)) {
    header("location: AffichierSalle.php?message=DeleteSuccess");
} else {
    header("location: AffichierSalle.php?message=DeleteFail");
}

// Close the database connection
mysqli_close($conn);

?>

