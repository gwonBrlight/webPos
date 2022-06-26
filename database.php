<?php

//Make the database connection.
db_connect() or die('Unable to connect to database server!');

function db_connect($server = 'capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com', $username = 'Capstone', $password = '&ZOQtmxhs12&', $database = 'inventory') {
    global $$link;
    $$link = mysqli_connect($server, $username, $password,$database,3306);
    if ($$link) mysqli_select_db($$link,$database);
    return $$link;
}

//Function to handle database errors.
function db_error($query, $errno, $error) { 
    die('Cannot connect to database');
}

//Function to query the database.
function db_query($query) {
    global $$link;
    $result = mysqli_query($$link,$query) or db_error($query, mysqli_errno($con), mysqli_error($con));
    return $result;
}

//Get a row from the database query
function db_fetch_array($db_query) {
    return mysqli_fetch_array($db_query);
}
?>