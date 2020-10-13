<?php

//Make the database connection.
db_connect() or die('Unable to connect to database server!');

function db_connect($server = 'localhost', $username = 'root', $password = '123456', $database = 'inventory', $link = 'db_link') {
    global $$link;
    $$link = mysqli_connect($server, $username, $password);
    if ($$link) mysqli_select_db($$link,$database);
    return $$link;
}

//Function to handle database errors.
function db_error($query, $errno, $error) { 
    die('Cannot connect to database');
}

//Function to query the database.
function db_query($query, $link = 'db_link') {
    global $$link;
    $result = mysqli_query($query, $$link) or db_error($query, mysqli_errno($con), mysqli_error($con));
    return $result;
}

//Get a row from the database query
function db_fetch_array($db_query) {
    return mysqli_fetch_array($db_query);
}
?>