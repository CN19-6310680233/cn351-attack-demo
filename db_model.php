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

function get_all_login($sort){
    global $link;
    $query = "SELECT * FROM login ORDER BY $sort";
    $result = mysqli_query($link, $query);
    $logins = array();
    while ( $row = mysqli_fetch_assoc($result) ) {
        $logins[] = $row;
    }
    return $logins;
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
    $query = "DELETE FROM persons WHERE id='$id';";
    $result = mysqli_query($link, $query);
    if ($result)
        return true;
    else
        return false;
};

function get_data($id){
    global $link;
    $query = "SELECT * FROM persons where id='$id';";
    $result = mysqli_query($link, $query);
    while ( $row = mysqli_fetch_assoc($result) ) {
        $person = $row;
    }
    return $person;
}

function update_data($data){
    global $link;
    extract($data);
    // !! (XSS) Vulnerable code
    // ** TODO: Escape input
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
    // !! (SQL Injection) Vulnerable code
    // ** TODO: Escape input
    $hashed = md5($password);
    $query = "SELECT * FROM login WHERE username LIKE '$username' AND password LIKE '$hashed';";
    $result = mysqli_query($link, $query);
    $login = null;
    while ( $row = mysqli_fetch_assoc($result) ) {
        $login = $row;
    }
    return $login;
}

// ** Check if username is already exist
function is_username_exist($username) {
    global $link;
    $query = "SELECT * FROM login WHERE username LIKE '$username';";
    $result = mysqli_query($link, $query);
    while ( $row = mysqli_fetch_assoc($result) ) $login = $row;
    if(isset($login) && $login) return true;
    return false;
}

function register($data) {
    global $link;
    extract($data);

    // !! (SQL Injection) Vulnerable code
    $hashed = md5($password);
    $query = "INSERT INTO login (username, password) VALUES ('$username', '$hashed')";
    $result = mysqli_query($link, $query);
    return $result;
}

function get_username($id){
    global $link;
    $query = "SELECT * FROM login WHERE id = $id";
    $result = mysqli_query($link, $query);
    $login = null;
    while ( $row = mysqli_fetch_assoc($result) ) {
        $login = $row;
    }
    return $login;
}