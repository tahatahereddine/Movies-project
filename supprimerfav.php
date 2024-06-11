<?php
include 'db.php';

$id = $_GET['id'];
$uid = $_GET['uid'];


$sql = "DELETE FROM AIMER WHERE ID_User = ? AND ID_Film = ?;";

$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: signup.php?error=stmtfailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "ii", $uid, $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location: moreinfo.php?id=".$id);
?>