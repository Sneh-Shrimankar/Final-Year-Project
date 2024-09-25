<?php 
 
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "validation"; 
 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user2 = $_POST["username"];
    $pass1 = md5($_POST["password"]);

    if (empty($user2) || empty($pass1)) {
        echo "Please fill in both username and password fields";
    } else {
        $flag = 0;
        $query = "SELECT * FROM user1";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            if ($row["user"] == $user2 && $row["pass"] == $pass1) {
                $flag = 1;
                break;
            }
        }

        if ($flag) {
            $url = "dashboard.html";
            header("Location: {$url}");
            exit();
        } else {
            echo "<h2>Login Unsuccessful</h2><br>";
        }
    }
}

?>
