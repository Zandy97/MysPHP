<?php
    $con = mysqli_connect("localhost", "root", "opc123", "mys_user");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userID"];
    $userPWD = $_POST["userPWD"];
    $userName = $_POST["userName"];
    $userAge = $_POST["userAge"];

    $statement = mysqli_prepare($con, "INSERT INTO user (userID, userPWD, userName, userAge) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($statement, "sssi", $userID, $userPWD, $userName, $userAge);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

    echo json_encode($response);
?>