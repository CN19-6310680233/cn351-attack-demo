<?php 
$host = 'db'; #localhost
$username = 'user';
$password = 'pwd';
$database = 'demo';
function db_connect($host, $username, $password, $database){
    try{
        $link = mysqli_connect($host, $username, $password, $database);
    }catch(mysqli_sql_exception $e) {
        die('Error: Can\'t connect to database.');
    }
        return $link;
    };
$link = db_connect($host, $username, $password, $database);
function db_close(){
    global $link;
    mysqli_close($link);
};
function get_all_data($sort){
    global $link;
    $query = "SELECT * FROM persons ORDER BY $sort";
    $result = mysqli_query($link, $query);
    $persons = array();
    while ( $row = mysqli_fetch_assoc($result) ) {
        $persons[] = $row;
    }
    return $persons;
};

function insert_data($data){
    global $link;
    extract($data);
    $name = ucfirst($name);
    $surname = ucfirst($surname);
    $query = "INSERT INTO persons (name, surname, email, phone) VALUES ('$name', '$surname', '$email', '$phone')";
    $result = mysqli_query($link, $query);
    if ($result)
        return true;
    else
        return false;
};

function delete_data($id){
    global $link;
    $query = "DELETE FROM persons WHERE persons.id=$id;";
    $result = mysqli_query($link, $query);
    if ($result)
        return true;
    else
        return false;
};

function get_data($id){
    global $link;
    $query = "SELECT * FROM persons where persons.id=$id;";
    $result = mysqli_query($link, $query);
    while ( $row = mysqli_fetch_assoc($result) ) {
        $person = $row;
    }
    return $person;
}

function update_data($data){
    global $link;
    extract($data);
    $query = "UPDATE persons SET name = '$name', surname = '$surname', email = '$email', phone = '$phone' WHERE id =$id;";
    $result = mysqli_query($link, $query);
    if ($result)
        return true;
    else
        return false;
}

function login($data){
    global $link;
    extract($data);
    $query = "SELECT * FROM login WHERE username LIKE '$username' AND password LIKE '$password';";
    $result = mysqli_query($link, $query);
    $login = null;
    while ( $row = mysqli_fetch_assoc($result) ) {
        $login = $row;
    }
    return $login;
}

function register($data) {
    global $link;
    extract($data);
    $query = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($link, $query);
    return $result;
}