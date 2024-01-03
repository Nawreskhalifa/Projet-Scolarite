<?php  
include("Connexion.php");
if(isset($_POST['input'])){
$input=$_POST['input'];
$res=mysqli_query($conx,"SELECT * from Seances where (Seance like '{$input}%' )limit 6");
if(mysqli_num_rows($res)>0){?>
<table style="margin-top:40px;" class="table table-bordered table-striped mt-4" >
    <tr>
    <th>Seance</th>
    <th>Horaire</th>
    <th scope="">Heure de début</th>
   <th scope="">Heure de fin</th>

    </tr>
<?php 
while($row=mysqli_fetch_assoc($res))
{
    $Seance=$row['Seance'];
    $Horaire=$row['Horaire'];
    $Hdeb=$row['HDeb'];
    $HFin=$row['HFin'];
}
?>
<tr>
    <td><?=$Seance;?></td>
    <td><?=$Horaire;?></td>
    <td><?=$Hdeb;?></td> 
    <td><?=$HFin;?></td> 
</tr>
<?php
}
else{
    echo ' <div style="margin-left:50px;color:red;margin-top:40px;max-wSeanceth:400px;" ">
    not found...
  </div>';
}
}
?>