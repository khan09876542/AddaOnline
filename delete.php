<?php
require 'config/conn.php';
$id = $_GET['id'];

$delete = "DELETE FROM users WHERE id = $id";
$stmt = $conn->prepare($delete);
$stmt->execute();

header("Location: users_list.php?msg=deleted");

 ?>