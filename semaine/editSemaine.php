<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css"/>
<link rel="stylesheet" href="bootstrap-icons-1.10.3/bootstrap-icons.css"/>
<?php
    include('HCF/header.php');
    include('js/controle.js');
    include('sqlFunctions.php');
    $functions = new functions();
    include('HCF/container.php');
    
    // Establish a database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "scolarite";
    
    $conn = new mysqli($host, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    if (isset($_POST['add'])){
        $StartDate = $_POST['StartDate'];
        $EndDate = $_POST['EndDate'];
        $Session = $_POST['Session'];
        $functions->editSemaine($id, $StartDate, $EndDate, $Session);
        header('location:index.php');
    }

    $sql = "SELECT Sem FROM session";
    $result = $conn->query($sql);

    // Vérifiez si la requête a réussi
    if ($result) {
        $all_sessions = $result;
    }
?>
<body>
    <div class='container'>
    <h3>New Product</h3>
    <div class="row">
        <div class="col-sm-4">
            <form method='POST'>
                <div class="form-group"></div>
                <?php
                    $semaine=$functions->selectById($id);
                ?>
                <div class="form-group">
                    <label for='NumSem'>Week Number</label>
                    <input type='text' value="<?php echo $semaine[0]['NumSem']?>" name='NumSem' placeholder='put the number of the week' class='form-control' require disabled/>
                </div>
                <div class="form-group">
                    <label for='StartDate'>Start Date</label>
                    <input type='datetime-local' value="<?php echo $semaine[0]['DateDebut']?>" name='StartDate' class='form-control' require onchange="updateEndDateMin(this.value );"/>
                </div>
                <div class="form-group">
                    <label for='EndDate'>Week Number</label>
                    <input type='datetime-local' value="<?php echo $semaine[0]['DateFin']?>" name='EndDate' class='form-control' require/>
                </div>
                <div class="form-group">
    <label for='Session'>Session</label>
    <select name="Session" required>
        <?php 
            // Supposons que $all_sessions contient les sessions récupérées de la base de données
            while ($session = mysqli_fetch_array($all_sessions, MYSQLI_ASSOC)): 
                $selected = ($session["Sem"] == $semaine[0]['Session']) ? 'selected' : '';
        ?>
            <option value="<?php echo $session["Sem"]; ?>" <?php echo $selected; ?>>
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
</body>
<?php
    include('HCF/footer.php');
?>