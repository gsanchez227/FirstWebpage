<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Awake at 8am</title>
        <style>
            *{
                box-sizing: border-box;
            }
            table{
                border-style: solid;
                border-color: white;
                padding: 0.3%;
                margin-left:10%;
            }


            td, th  { 
                border-style: solid;
                border-color: cyan;
                color: white;
                font-family: sans-serif;
            }

            body{
                margin-top:2%;
                background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(moutain.jpg);
                max-width: 100%;
                max-height: 100%;
                align-items: center;
                justify-content: center;
                position: relative;
                font-family: sans-serif;
                margin-left:35%;
            }
            #header{
                display: block;
                color: white;
                text-transform: uppercase;
            }


            #logout{
                margin-left:18%;
                color: white;
                text-transform: uppercase;
            }

            
        </style>
    </head>
    <body>
        <div>
            <h1 id="header">  
                <!-- Welcome [username] -->
                <?php echo '<b>Welcome</b> '.$_SESSION['Admin'].'<br>'; ?>   
            <h1>
        </div>
        <table>
           <tbody>
              <tr>
                 <th>username</th>
                 <th>password</th>
              <tr><?php

    $db = mysqli_connect("localhost", "root", "", "HW2");
    if(!$db) // connection failed
    {
        //print error message then error code
        print("</tbody></table><p>Could not connect to database</p></body></html>");
        print( mysqli_connect_error() );
        die();  // kills PHP script
    }

    //get data then sort by username

    $sql = "SELECT userid, username, password FROM user ORDER BY username"; 
    $result = mysqli_query($db, $sql); // $result is the returned result set
    while ($row = mysqli_fetch_row($result))  // iterate through each row
    {
        print("<tr><td> $row[1]</td>");// $row[1] is the username
        print("<td>$row[2]</td></tr>"); // $row[2] is the password
    }                                                       
    mysqli_close($db);  // disconnect from db   
    ?>
       </tbody>
        </table>
        <br>
        <!-- logout button -->
        <div>
            <a id="logout" href="logout.php?logout"><b>Logout</b></a>
        </div>
    </body>
</html>