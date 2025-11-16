<?php
include "db.php";

$id = $_GET["id"]; // user ID to edit

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>

<h2>Edit User Profile</h2>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
