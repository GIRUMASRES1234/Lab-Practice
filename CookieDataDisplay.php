<!DOCTYPE html>
<html>

<body>

  <h2>Users List</h2>

  <?php
// 1. Connect to database
$conn = mysqli_connect("localhost", "root", "", "class");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Select data
$sql = "SELECT id, username, password FROM user";
$result = mysqli_query($conn, $sql);

// 3. Check if data exists
if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Username</th><th>Password (Hashed)</th></tr>";

    // 4. Fetch rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "No users found";
}

// 5. Close connection
mysqli_close($conn);
?>

</body>

</html>
