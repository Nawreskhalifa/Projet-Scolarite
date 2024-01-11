<?php
include('header.php');
include('Connection.php');
include('HeureSup.php');
$con = new Connection();
$con = $con->getConnection();
$newHeureSup = new HeureSup($con);

if(isset($_POST['modifierhs'])){
    $session = $_POST['Session']; // Corrected here
    $matprof = $_POST['matprof'];
    $ci = $_POST['ci'];
    $tp = $_POST['tp'];
    $tot = $_POST['ci'] + $_POST['tp'];
    
    $newHeureSup->modifierHeureSup(
        $session,
        $matprof,
        $ci,
        $tp,
        $tot
    );

    exit();
}
else {
    $session = isset($_GET['session']) ? $_GET['session'] : 0;
    $matprof = isset($_GET['matprof']) ? $_GET['matprof'] : 0;
 
    $sql = "SELECT * FROM HeureSup WHERE Session = ? AND MatProf = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $session, $matprof);
    $stmt->execute();
    $stmt->bind_result($session, $matprof, $ci, $tp, $tot);
       
    $result = $stmt->get_result();
    if($result->num_rows === 1) {
        $heures = $result->fetch_assoc();
    } else {
        echo "data not found. <a href='afiiche.php'>Back to List</a>";
    }
    $stmt->close();
}

$sql = "SELECT Sem FROM session";
$result = $con->query($sql);

// Vérifiez si la requête a réussi
if ($result) {
    $all_sessions = $result;
}





// Fetch professors
$sql = "SELECT `Matricule Prof` FROM prof";
$result = $con->query($sql); // Corrected here
$all_profs = $result->fetch_all(MYSQLI_ASSOC);

?>

<div>
    <form method="post">

        <h3>Modifier Heure Sup</h3>

        <div class="form-group">
            <label for='Session'>Session</label>
            <select name="Session" required>
                <?php 
                    while ($session = mysqli_fetch_array($all_sessions, MYSQLI_ASSOC)): 
                        $selected = ($session["Sem"] == $heures["Session"]) ? 'selected' : '';
                ?>
                    <option value="<?php echo $session["Sem"]; ?>" <?php echo $selected; ?>>
                        <?php echo $session["Sem"]; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>






        <div class="form-group">
            <label for='matprof'>Matricule Prof</label>
            <select name="matprof" required>
                <?php foreach ($all_profs as $prof): ?>
                    <option value="<?php echo htmlspecialchars($prof["Matricule Prof"]); ?>" <?php echo ($prof["Matricule Prof"] == $heures["MatProf"]) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($prof["Matricule Prof"]); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        

        <label for="ci">CI</label><br>
        <input class="form-control"  type="number" step="0.05" name="ci" id="ci" value="<?php echo $heures["CI"]; ?>"  ><br>

        <label for="tp">TP</label><br>
        <input class="form-control"  type="number" step="0.05" name="tp" id="tp" value="<?php echo $heures["TP"]; ?>"   ><br>

        <br>
        <input class="btn btn-primary" type="submit" value="Modifier" name="modifierhs"><br>

        <br>
        <a href='affiche.php'>Retourner a la liste </a>
        
    </form>
</div>
