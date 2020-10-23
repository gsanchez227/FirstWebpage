<?php
session_start();
if(isset($_SESSION['User'])){
	echo '<b>Welcome</b> '.$_SESSION['User'].'<br>';
}   
?>


<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
	    <title>Lab2_Loggged_Page</title>
        <style type="text/css">
            body{
                margin: 0;
                padding: 0;
                background: #22f3;
            }
            .colorChanger {
                position: relative;
                padding: 10px;
                background: #ff3;
                border: none;
                outline: none;
                font-size: 18px;
                text-transform: uppercase;
            }
            #logout{
                left:50%;
                text-transform: uppercase;
                padding: 10px;
                position: relative;

            }
            

        </style>
        <script type="text/javascript">
            //color is an array of colors
            var redColorSwitch;
            var blueColorSwitch;
            var greenColorSwitch;
            window.addEventListener("load",init);
            var i=0;

            function init(){

                //initialize
                blueColorSwitch= document.getElementById("blueColorSwitcher");
                greenColorSwitch= document.getElementById("greenColorSwitcher");
                redColorSwitch = document.getElementById("redColorSwitcher");

                //click events
                redColorSwitch.addEventListener("click", changeToRed);
                greenColorSwitch.addEventListener("click", changeToGreen);
                blueColorSwitch.addEventListener("click", changeToBlue);
            }

            function changeToRed(){
                //change the color of the background
                document.querySelector("body").style.background = '#FF0000';

            }
            function changeToGreen(){
                //change the color of the background
                document.querySelector("body").style.background = '#008000';

            }

            function changeToBlue(){
                //change the color of the background
                document.querySelector("body").style.background = '#0000FF';

            }
            

        </script>
    <body>
        <span>
            <a id="logout" href="logout.php?logout"><b>Logout</b></a>
        </span>
        <br>
        <br>
        <span>
            <button class="colorChanger" id="redColorSwitcher">Red</button>
        </div>
        <span>
            <button class="colorChanger" id="blueColorSwitcher">Blue</button>
        </span>
        <span>
            <button class="colorChanger" id="greenColorSwitcher">Green</button>
        </span>
    </body>
</html>