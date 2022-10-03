<?php
function roomName($roomID)
{
    include "inc/connection.php";

    $sql_room = "SELECT * FROM rooms WHERE id ='$roomID'";
    $result_room = mysqli_query($conn, $sql_room);
    $row_room = mysqli_fetch_assoc($result_room);

    $roomID = $row_room["Room_type"];

    return $roomID;
}

function roomPrice($roomID, $roomCount)
{
    include "inc/connection.php";

    $sql_room = "SELECT * FROM rooms WHERE id ='$roomID'";
    $result_room = mysqli_query($conn, $sql_room);
    $row_room = mysqli_fetch_assoc($result_room);

    $roomPrice = $row_room["price"];
    $totRoomPrice = $roomCount * $roomPrice;

    return $totRoomPrice;
}

function mealName($mealID)
{
    include "inc/connection.php";

    $sql_room = "SELECT * FROM meals WHERE id ='$mealID'";
    $result_room = mysqli_query($conn, $sql_room);
    $row_room = mysqli_fetch_assoc($result_room);

    $mealName = $row_room["Meals_type"];

    return $mealName;
}

function mealPrice($mealID)
{
    include "inc/connection.php";

    $sql_room = "SELECT * FROM meals WHERE id ='$mealID'";
    $result_room = mysqli_query($conn, $sql_room);
    $row_room = mysqli_fetch_assoc($result_room);

    $mealPrice = $row_room["price"];
    $totMealPrice =  $mealPrice * 10;

    return $totMealPrice;
}


function tentName($tentID)
{
    include "inc/connection.php";

    $sql_room = "SELECT * FROM tent WHERE id ='$tentID'";
    $result_room = mysqli_query($conn, $sql_room);
    $row_room = mysqli_fetch_assoc($result_room);

    $roomID = $row_room["Tent_type"];

    return $roomID;
}

function tentPrice($tentID, $tentCount)
{
    include "inc/connection.php";

    $sql_room = "SELECT * FROM tent WHERE id ='$tentID'";
    $result_room = mysqli_query($conn, $sql_room);
    $row_room = mysqli_fetch_assoc($result_room);

    $roomPrice = $row_room["price"];
    $totTentPrice = $tentCount * $roomPrice;

    return $totTentPrice;
}