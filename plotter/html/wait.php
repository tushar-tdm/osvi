<?php 
    include_once '../../db.php';
/*     session_start(); */

    $uid = $_SESSION['id'];

    // take the current number and subtract first number from it.
    $sql = "SELECT token_num FROM token WHERE u_id = '$uid'";
    $result = mysqli_query($conn,$sql);
    $num1 = mysqli_fetch_assoc($result); 

    $sql = "SELECT token_num from token order by token_num ASC limit 1";
    $r = mysqli_query($conn,$sql);
    $num2 = mysqli_fetch_assoc($r);

    $num = $num1['token_num'] - $num2['token_num'];

?>
<html>
    <head>
        
        <title> NITK </title>
        <style>
            .wh1,.wh3{
                color:red;
                font-family: 'Oswald', sans-serif;
                margin-left:0px;
                padding-left: 40%;
            }   

            .wp{
                font-family: 'Raleway', sans-serif;
                padding-left: 17%;
            }  

            .wul li{
                font-family: 'Raleway', sans-serif;
                font-weight: bold;
            }

            .wul{
                padding-left: 22%;
            }
            
            .wcontent{
                margin-top: 15%;
                border:solid 2px red;
            }

            .ws{
                font-weight: bold;
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 wcontent">
                    <h1 class="wh1"> - NOTE -  </h1>
                    <p class="wp"> There are other users using the 2D plotter. </p>
                    <p class="wp"> Your number in queue is <?php echo $num; ?> </p>
                    <h3 class="wh3"> ALERT: </h3>
                    <p class="wp"> Please <span class="ws"> DO NOT </span>do the following if you want to stay in the queue:</p>
                        <ul class="wul">
                            <li> Refresh the page</li>
                            <li> Go back to previous page </li>
                            <li> Dont close the tab</li>
                        </ul>
                </div>
            </div>
        </div>
    </body>
</html>