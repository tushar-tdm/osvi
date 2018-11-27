<?php
    include_once '../db.php';
    session_start();
 
    if($_SESSION['id']){
        $_SESSION['rubick'] = 1;
    }
    else{
      header("Location: ../login/login.html?Login_to_continue");
        exit(); 
    } 

?>

<html>
    <head>
            <link rel="icon" href="http://getbootstrap.com/favicon.ico">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="styles/btheme.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    </head>
    <!-- <h3> </h3> -->
    <body>
    <div id="nallow" style="display:none;">
        <?php include_once 'wait.php'; ?>
    </div>
    <div id="allow" style="display:none;">
        <h2 class="heading" style="color:white;">REMOTE TRIGGERED RUBIK'S CUBE BOT </h2>
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="triangle-up" onclick="sendp('u')"><span> CUBE UP </span>  </div> <br><br>
                <span class="row">
                    <div class="triangle-left col-lg-6"onclick="sendp('l')">  <span> CUBE LEFT </span></div>
                    <div class="triangle-right col-lg-6" onclick="sendp('r')">  <span> CUBE RIGHT </span></div>
                </span>
                <br><br>
                <div class="triangle-down" onclick="sendp('d')">  <span> CUBE DOWN </span></div>  
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <img class="video" src= "http://192.168.2.2:8081/?action=stream"/>
                <br>
                <button class="sf" onclick="sendp('s')"> SHOW ALL FACES</button><br>
                <button class="scr" onclick="sendp('S')"> SCRAMBLE </button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >
                <button class="b1" id="" onclick="sendp('R')"><img src="images/R.jpg"></button>
                <button class="b1" id="" onclick="sendp(1)"><img src="images/Ri.jpg"></button>
                <button class="b1" id="" onclick="sendp('D')"><img src="images/D.jpg"></button>
                <button class="b1" id="" onclick="sendp(4)"><img src="images/Di.jpg"></button>

                <button class="b1" id="" onclick="sendp('L')"><img src="images/L.jpg"></button>
                <button class="b1" id="" onclick="sendp(2)"><img src="images/Li.jpg"></button>
                <button class="b1" id="" onclick="sendp('f')"><img src="images/F.jpg"></button>
                <button class="b1" id="" onclick="sendp(5)"><img src="images/Fi.jpg"></button>

                <button class="b1" id="" onclick="sendp('U')"><img src="images/U.jpg"></button>
                <button class="b1" id="" onclick="sendp(6)"><img src="images/Ui.jpg"></button>
                <button class="b1" id="" onclick="sendp('B')"><img src="images/B.jpg"></button>
                <button class="b1" id="" onclick="sendp(3)"><img src="images/Bi.jpg"></button>
            </div>
        </div>
    </div>
    </div>
    </body>

    <script>
        var x = new XMLHttpRequest();

        function sendp (cc){
            console.log(cc);
             var c = JSON.stringify(cc);
            x.onreadystatechange = function(){
            };
            x.open("GET","send.php?a="+c);
            x.send(); 
        }
 
        var interval;
        
    window.onload = function(){
        check();
        interval = setInterval(check,5000); 
    }

    window.onunload = function(){
        var x = new XMLHttpRequest();

        x.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //do nothing
            }
        }
        x.open("GET","trial.php");
        x.send();
        
    }

    function check(){

        var exp = 0; //experiment name to decide the table to which we refer to.
        //0 for plotter, 1 for rubicks etc..
        //run ajax code to check whether the chance has arrived or not
        var object = [];
        object.push(exp); 

        var obj = JSON.stringify(object);
        
        var x = new XMLHttpRequest();

        x.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
				var resp = JSON.parse(this.responseText);

                if(resp == 1){
                    //got the chance
                    document.getElementById("allow").style.display="block";
                    document.getElementById("nallow").style.display="none";
                    clearInterval(interval);
                }else{
                    document.getElementById("nallow").style.display="block";
                    document.getElementById("allow").style.display="none";
                }
			}
        }
        x.open("GET","check.php");
        x.send();
    }
    </script>
</html>
