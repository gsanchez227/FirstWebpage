<?php
    session_start();


    //intializing user input
    $name=$_POST["username"];
    $pass=$_POST['password'];

    //connect to db

    $db = mysqli_connect("localhost", "root", "", 'HW');


    if(! $db) /* connection failed*/
    {
        header("location:login.php?LoginError=Could not connect to a database");
        die();  // kills PHP script
    }
    
    //checks whether the user exists 
    $sql = "SELECT * FROM `user` WHERE username = '$name'";
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) == 0){
        header("location:login.php?LoginError=Could not find your username.");
        die();  // kills PHP script
    }
    



    //if the user pressed the login button
    if(isset($_POST['Login'])){
        $query="SELECT * FROM `user` WHERE username ='$name' and password ='$pass' ";
        $result= mysqli_query($db, $query);
        
        //if username and passwords match with whats in database
        if(mysqli_fetch_assoc($result)){
            //admin user
            if($name=='Administrator'){
                $_SESSION['Admin']=$name;
                header("location:admin.php");
            }
            //everyone else
            else{
            $_SESSION['User']=$name;
            header("location:loginPage.php");
            }
        }
        else{
            // error reposonse letting users know that
            //the user name and password dont match to info in database
            header("location:login.php?LoginError=The username and password do not match.");
            die();  // kills PHP script
        }

        
    }
?>