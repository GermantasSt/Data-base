<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "labas";
$dbname = "duombaze";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

//
// Create database
//$sql = "CREATE DATABASE duombaze";
//if (mysqli_query($conn, $sql)) {
//    echo "Database created successfully";
//} else {
//    echo "Error creating database: " . mysqli_error($conn);
//}

//// sql to create table
//$sql = "CREATE TABLE penktadienis (
//id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//name VARCHAR(30) NOT NULL,
//lastname VARCHAR(30) NOT NULL,
//tel VARCHAR(12),
//address VARCHAR (40),
//username VARCHAR (36),
//shoe_size VARCHAR (10)
//)";
//
//if (mysqli_query($conn, $sql)) {
//    echo "Table penktadienis created successfully";
//} else {
//    echo "Error creating table: " . mysqli_error($conn);
//}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['tel']) || empty($_POST['address']) || empty($_POST['username']) || empty($_POST['shoe_size']) || strlen($_POST['name'])<6){
        $error = "Bad entry";
        if (strlen($_POST['name'])>=1){
            $error = "Names too short";
        }
    }
    else {
        $success = 'Information added';
        if (isset($_POST['submit'])){
            $sql = "INSERT INTO penktadienis (name, lastname, tel, address, username, shoe_size)
VALUES ('".$_POST["name"]."','".$_POST["lastname"]."','".$_POST["tel"]."','".$_POST["address"]."','".$_POST["username"]."','".$_POST["shoe_size"]."')";

            $result = mysqli_query($conn,$sql);
        }

    }
}
//$results = mysqli_query($conn,"SELECT * FROM penktadienis");
//foreach ($results as $result){
//    echo "<tr>";
//    echo "<td>".$result['name']."</td><br>";
//    echo "<td>".$result['lastname']."</td><br>";
//    echo "<td>".$result['tel']."</td><br>";
//    echo "<td>".$result['address']."</td><br>";
//    echo "<td>".$result['username']."</td><br>";
//    echo "<td>".$result['shoe_size']."</td><br>";
//    echo "</tr>";
//}

mysqli_close($conn);
?>

<div class="container">
    <H1> form</H1>
    <div class="row">
        <div class="col-4">
            <?php
            if(isset($error)){
                echo '<div class="alert alert-danger">'.$error.'</div>';
            }
            elseif (isset($success)){
                echo '<div class="alert alert-success">'.$success. '</div>';
            }
            ?>
            <form method="POST" action="duombaze.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input name="lastname" type="text" class="form-control" id="lastname">
                </div>
                <div class="form-group">
                    <label for="tel">Telephone</label>
                    <input name="tel" type="text" class="form-control" id="tel">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" type="text" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="shoe_size">Shoe-size</label>
                    <input name="shoe_size" type="number" class="form-control" id="shoe_size">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>




</body>
</html>