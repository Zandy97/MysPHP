<?php
    $con = mysqli_connect("localhost", "root", "opc123", "mys_user");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userID"];
    $userPWD = $_POST["userPWD"];

    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE userID = ? AND userPWD = ?");
    mysqli_stmt_bind_param($statement, "ss", $userID, $userPWD);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $userPWD, $userName, $userAge);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["userID"] = $userID;
        $response["userPWD"] = $userPWD;
        $response["userName"] = $userName;
        $response["userAge"] = $userAge;
    }
    echo json_encode($response);
?>
