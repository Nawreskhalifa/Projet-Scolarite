<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

include('header.php');
include('Connection.php');
include('HeureSup.php');

$con = new Connection();
$conn = $con->getConnection();

$newHeureSup = new HeureSup($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['modifierhs'])) {
        $session = $_POST['session'];
        $matprof = $_POST['matprof'];
        $ci = $_POST['ci'];
        $tp = $_POST['tp'];
        $tot = $ci + $tp;

        $result = $newHeureSup->modifierHeureSup($session, $matprof, $ci, $tp, $tot);

        if ($result) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        exit();
    }
} else {
    $session = isset($_GET['session']) ? $_GET['session'] : 0;
    $matprof = isset($_GET['matprof']) ? $_GET['matprof'] : 0;

    $sql = "SELECT * FROM HeureSup WHERE Session = ? AND MatProf = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $session, $matprof);
    $stmt->execute();
    $stmt->bind_result($session, $matprof, $ci, $tp, $tot);

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $heures = $result->fetch_assoc();
    } else {
        echo "Data not found. <a href='affiche.php'>Back to List</a>";
        exit();
    }
    $stmt->close();
}

// Fetch sessions
$sql = "SELECT Sem FROM session";
$result = $conn->query($sql);
$all_sessions = $result->fetch_all(MYSQLI_ASSOC);

// Fetch professors
$sql = "SELECT `Matricule Prof` FROM prof";
$result = $conn->query($sql);
$all_profs = $result->fetch_all(MYSQLI_ASSOC);
?>

<div>
    <form method="post">

        <h3>Modifier Heure Sup</h3>

        <div class="form-group">
            <label for='session'>Session</label>
            <select name="session" required>
                <?php foreach ($all_sessions as $sessionItem): ?>
                    <option value="<?php echo htmlspecialchars($sessionItem["Sem"]); ?>" <?php echo ($sessionItem["Sem"] == $heures["Session"]) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($sessionItem["Sem"]); ?>
                    </option>
                <?php endforeach; ?>
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
        <input class="form-control" type="number" step="0.05" name="ci" id="ci" value="<?php echo htmlspecialchars($heures["CI"]); ?>" required><br>

        <label for="tp">TP</label><br>
        <input class="form-control" type="number" step="0.05" name="tp" id="tp" value="<?php echo htmlspecialchars($heures["TP"]); ?>" required><br>

        <br>
        <input class="btn btn-primary" type="submit" value="Modifier" name="modifierhs"><br>

        <br>
        <a href='affiche.php'>Retourner a la liste </a>

    </form>
</div>
