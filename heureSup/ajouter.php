<?php
include('header.php');
include('Connection.php');
include('HeureSup.php');

// Create a new instance of Connection
$con = new Connection();
$conn = $con->getConnection(); // Use $conn as the variable for the connection

$newHeureSup = new HeureSup($conn);

// Fetch sessions
$sql = "SELECT Sem FROM session";
$result = $conn->query($sql);
$all_sessions = $result->fetch_all(MYSQLI_ASSOC);

// Fetch professors
$sql = "SELECT `Matricule Prof` FROM prof";
$result = $conn->query($sql);
$all_profs = $result->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['ajouterhs'])) {
    $total = $_POST['tp'] + $_POST['ci'];
    $newHeureSup->ajouterHeureSup(
        $_POST['session'],
        $_POST['matprof'],
        $_POST['ci'],
        $_POST['tp'],
        $total,
        $conn
    );
    exit();
}
?>

<div>
    <form method="post">
        <h3>Ajouter Heure Sup</h3>
        <div class="form-group">
            <label for='session'>Session</label>
            <select name="session" required>
                <?php foreach ($all_sessions as $session): ?>
                    <option value="<?php echo $session["Sem"]; ?>">
                        <?php echo $session["Sem"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for='matprof'>Matricule Prof</label>
            <select name="matprof" required>
                <?php foreach ($all_profs as $prof): ?>
                    <option value="<?php echo $prof["Matricule Prof"]; ?>">
                        <?php echo $prof["Matricule Prof"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <label class="form-label" for="ci">CI</label><br>
        <input type="number" class="form-control" step="0.5" name="ci" id="ci" placeholder="Entez CI" required><br>

        <label class="form-label" for="tp">TP</label><br>
        <input type="number" class="form-control" step="0.5" name="tp" id="tp" placeholder="Entez TP" required><br>

        <br>
        <input class="btn btn-primary" type="submit" value="Ajouter" name="ajouterhs"><br><br>
        <a href='affiche.php'>Retourner à la liste </a>
    </form>
</div>
