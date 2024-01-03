<?php
include("connexion.php");
if(isset($_GET['Seance']))
{
    $code=$_GET['Seance'];
    $req1="DELETE from seances where Seance='$code'";
    $res = $conx->query($req1);
}
header('location:ListeSeance.php');
exit;
?>