<?php
include("connexion.php");
$date_modification="";
$Seance="";
$Hdeb="";
$Hfin="";
$Horaire="";

 $Seance=$_GET['Seance'];
 if($_SERVER["REQUEST_METHOD"]=='GET' ){ 
  
 if(!isset($_GET['Seance']))
 {
 header("locations:listestage.php");
 exit;
 }
 $Seance=$_GET['Seance'];
 $req="SELECT * from Seances where Seance='$Seance'";
 $res=$conx->query($req);
 $row=$res->fetch_assoc();
 while(!$row)
 {
     header("locations:ListeSeance.php");
    exit;
 }
 $Seance=$row['Seance'];
 $Hdeb=$row['HDeb'];
 $Hfin=$row['HFin'];
 $Horaire=$row['Horaire'];

 }
 else {
    $Seance=$_POST['Seance'];
    $Hdeb=$_POST['HDeb'];
    $Hfin=$_POST['HFin'];
    $Horaire=$_POST['Horaire'];
    $date_modification=date("Y-m-d ");
     $req2="UPDATE Seances set   date_modification=' $date_modification' , HDeb='$Hdeb',HFin='$Hfin'";
     $res=$conx->query($req2);
    header("location:ListeSeance.php");
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	  <scripy src="stylesheet" href="bootstrap/css/bootstrap.js">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
         .input-ajout
        {
            margin:9px;
            margin-left:20px;
            max-width:420px;
            
        }
        
        .row1
        {
            max-width: 1700px;
        }
        .div-flex
        {
            margin-right:170px;
            margin-bottom:30px;
            margin-top:30px;
        }
        .btn1-ajouter
        {
        margin-right:60px;
        }
        /* drop deow */
       

    </style>
    <script>
        function checkTime() {
  var startTime = document.getElementById('start').value;
  var endTime = document.getElementById('end').value;

  if (startTime < endTime) {
    document.getElementById('output').innerHTML = '';
  } else {
    document.getElementById('output').innerHTML = 'L\'heure de fin doit être postérieure à l\'heure de début.';
  }
}
    </script>
</head>
<body>
            <div class=" ml-2  col-md-10">
         
    <form name="f" onsubmit="return checkTime()"  enctype="multipart/form-data" method="POST" style="max-width:600px;margin-left:35%;margin-top:70px;"class="card">
    <h4 style="color:blue;margin-left:15px;margin-top:20px;margin-bottom:20px;"><i class="bi bi-info-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
    <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
            </svg>Modifier Seance:</i>
        </h4>  
        <p style="margin-left:70px;color:red;"id="output"></p>

        <div style="margin-left:60px;"class="row g-3">
        <div class="col">
            <label style="margin-left:30px; color:black;font-size:18px;">Horaire :</label>
            <input type="text" class=" input-ajout form-control" value="<?=$Horaire;?>" name="Horaire" placeholder="Horaire" required>
            <label style="margin-left:30px; color:black;font-size:18px;">Heure de début:</label>   
            <input type="time" class="input-ajout form-control" name="HDeb" value="<?=$Hdeb;?>" id="start" onchange="checkTime() " placeholder="Heure de début"  required>
            <label style="margin-left:30px; color:black;font-size:18px;">Heure de fin:</label>
            <input type="time" class="input-ajout form-control" name="HFin" value="<?=$Hfin;?>" id="end"   onchange="checkTime()" placeholder="Heure de fin" required>
       </div>
    

      </div>
     <div class="div-flex d-flex justify-content-end">
       <button type="submit"  class="btn btn1-ajouter btn-primary" name="valider"><i class="bi bi-check-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
       <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
       <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
       </svg>ajouter</i></button>
       
       <button type="reset" class="btn  btn-danger" name="anuuler"><i class="bi bi-dash-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
        </svg>annuler</i></button>
     </div>
     
   </form>


           
                 </div>



             
            </div> 
        </div>    
</body>
</html>