<!DOCTYPE html>
<html>

<body>

  <form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php
    if (isset($_POST['submit'])) {

        $conn = mysqli_connect("localhost", "root", "", "class");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p style='color:green;'>User inserted successfully</p>";
        } else {
            echo "<p style='color:red;'>Insert failed</p>";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    ?>

</body>

</html>
