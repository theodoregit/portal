<?php
    $connection = mysqli_connect("localhost", "root", "", "portal");

    //check the connectivity
    if(mysqli_connect_errno()){
        die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
    }

    //let's clear the table
    $query2 = "delete from roster";
    $result2 = mysqli_query($connection, $query2);
    if(!$result2){
        echo "Error";
    }

    $idnumber = $_POST["idnumber"];
    $password = $_POST["password"];

    //let's validate the teacher form
    // if(!isset($email) || empty($email) || !isset($password) || empty($password)){
    //     echo "Failed";
    //     //here we need a modal to notify the the user unsuccessful login and remain in the login page
    //     //and exit from the code or leave other codes below it
    // }
    //query the teacher data from the database
    $query = "select idnumber, password from students";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query failed");
    }
    //let's bring the email and password
    while($row = mysqli_fetch_assoc($result)){
        $idnumber_queried = $row["idnumber"];
        $password_queried = $row["password"];
        if($idnumber_queried == $idnumber_queried && $password == $password_queried){
            // header("Location: ../grade/view-grade.html");

            header("Location: ../grade/view-grade-logic.php");
        }
        else{
            echo "Failed";
        }
    }
    //let's validate the user against the database result
    


    //let's make the $idnumber variable global
    session_start();
    $_SESSION["idnumber"] = $idnumber;
    


    // if(isset($_POST["submit"])){
    //     header("Location: ../grade/fill-grade.html");
    // }

    

    mysqli_close($connection);

?>