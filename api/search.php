<?php
$conn = new mysqli("olxl65dqfuqr6s4y.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "ip469qaanzsm59el", "hs1z4zwo5k0gs5qp" , "gnq5x7yjtzi40ngj");
$input = $_GET['input'];
if(empty($input)){
    echo "empty";
}else{
    echo "input found";
}