<?php
$conn = new mysqli("mysql://ip469qaanzsm59el:hs1z4zwo5k0gs5qp@olxl65dqfuqr6s4y.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/gnq5x7yjtzi40ngj");
$input = $_GET['input'];
if(empty(input)){
    echo "empty";
}else{
    echo "input found";
}