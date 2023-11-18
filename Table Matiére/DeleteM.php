<?php
if (isset($_GET["CodeMatiere"])) {
    $codeMatiere = $_GET["CodeMatiere"];

    try {
        include_once('connect.php');  // Include the database connection file

        // Use the $conn variable from connect.php
        $pdo = $conn;

        $sql = "DELETE FROM Matieres WHERE `Code Matière` = :codeMatiere";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':codeMatiere', $codeMatiere, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("location: SelectM.php");
        } else {
            echo "La matière n'a pas été trouvée.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Paramètre CodeMatiere non défini.";
}
?>
