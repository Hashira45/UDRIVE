<?php
//starting the session
session_start();
//including the database connection
require_once 'conn.php';

if (isset($_POST['login'])) {
    // Setting variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Select Query for counting the row that has the same value of the given username and password. This query is for checking if the access is valid or not.
    $query = "SELECT COUNT(*) as count FROM `users` WHERE `username` = :username AND `password` = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $row = $stmt->fetch();

    $count = $row['count'];
    if ($count > 0) {
        header('location:user/index.php');
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header('location:./index.php');
    }
}
?>