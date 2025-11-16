<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile.";
    }

    mysqli_stmt_close($stmt);
}
?>
