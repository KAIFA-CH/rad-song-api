<?php
$conn = new mysqli("olxl65dqfuqr6s4y.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "ip469qaanzsm59el", "hs1z4zwo5k0gs5qp" , "gnq5x7yjtzi40ngj");
$input = $_GET['input'];
if(empty($input)){
    echo "empty";
    $sql = "SELECT * FROM radios";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "img url: " . $row["img"] . " - Name: " . $row["name"] . " - Desc: " . $row["desc"] . "<br>";
        }
    }
}else{
    echo "input found";
    $sql = "SELECT * FROM radios WHERE name=".$input;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "img url: " . $row["img"] . " - Name: " . $row["name"] . " - Desc: " . $row["desc"] . "<br>";
        }
    }
}