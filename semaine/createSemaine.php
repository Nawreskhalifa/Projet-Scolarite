<?php
include('HCF/header.php');
include('sqlFunctions.php');
$functions = new functions();
include('HCF/container.php');

$host = "localhost";
$username = "root";
$password = "";
$database = "scolarite";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch sessions from the database
$sql = "SELECT Sem FROM session";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    $all_sessions = $result;
}

// Handle form submission
if (isset($_POST['add'])) {
    // Retrieve form data
    $NumSem = $_POST['NumSem'];
    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];
    $Session = $_POST['session'];

    // Insert data into the database
    $insertQuery = "INSERT INTO semaine (NumSem, DateDebut, DateFin, Session) VALUES ('$NumSem', '$StartDate', '$EndDate', '$Session')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "New record added successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}
?>

<body>
    <div class='container'>
        <h3>New Product</h3>
        <div class="row">
            <div class="col-sm-4">
                <form method='POST' enctype="multipart/form-data">
                    <div class="form-group"></div>
                    <div class="form-group">
                        <label for='NumSem'>Week Number</label>
                        <input type='text' name='NumSem' placeholder='put the number of the week' class='form-control' />
                    </div>
                    <div class="form-group">
                        <label for='StartDate'>Start Date</label>
                        <input type='date' name='StartDate' class='form-control' onchange="updateEndDateMin(this.value);"/>
                    </div>
                    <div class="form-group">
                        <label for='EndDate'>End Week</label>
                        <input type='date' name='EndDate' id="EndDate" class='form-control' />
                    </div>
                    <div class="form-group">
                        <label for='Session'>Session</label>
                        <select name="session" required>
                            <?php while ($session = mysqli_fetch_array($all_sessions, MYSQLI_ASSOC)): ?>
                                <option value="<?php echo $session["Sem"]; ?>">
                                    <?php echo $session["Sem"]; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" name="add" class="btn btn-default">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="form-group"></div>
        <div class="form-group"></div>
    </div>
</body>

<?php
include('HCF/footer.php');
?>
