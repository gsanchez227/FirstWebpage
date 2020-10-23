<?php

    session_start();

    //user input
    $name=$_POST["username"];
    $pass=$_POST['password'];

    //connect to db
    $db = mysqli_connect("localhost", "root", "", 'HW');


    if(! $db) // connection failed
    {
        header("location:register.php?registrationError=Could not connect to database ".mysqli_connect_error());
        die();  // kills PHP script
    }

    //figures out if the username is already in use
    $sql = "SELECT * FROM `user` WHERE username = '$name'";
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) >= 1){ //if the username is already in the database

        //gives user a message that username is taken
        // and a button to go back to the register page
        header("location:register.php?registrationError=The chosen username is already registered.");
        print("<p>The chosen username is already registered.</p> ");
        die();  // kills PHP script
    }else{
        //otherwise, add to database
        $reg = "INSERT INTO `user` (`userid`, `username`, `password`) VALUES (NULL, '$name', '$pass')";
        mysqli_query($db, $reg);
        //show message on register.php
        echo "hello";
        //header("location:register.php?registrationSuccess=You have Successfully Registered");
    }
?>


