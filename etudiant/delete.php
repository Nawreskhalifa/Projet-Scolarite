<?php
include 'config.php'; 
$sql = "SELECT CodClasse, CodClasse FROM Classe";
$result = $conn->query($sql);
if(isset($_GET["NCE"])){
    $NCE = $_GET["NCE"];
    
    $sql = "DELETE FROM etudiant WHERE NCE = '$NCE'";

    if ($conn->query($sql) === TRUE) {
        header("location: select.php");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Error";
}
?>
