<?php
/*
    include_once 'db.php';
    session_start();

    if($_SESSION['id']){
        
    }else{
        header("Location: ../login/login.html");
        exit(); 
    } */
?>
<html>
    <head>
            <link rel="icon" href="http://getbootstrap.com/favicon.ico">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="styles/btheme.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
            
            <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <style>
            body{
                font-family: "Source Sans Pro", Helvetica, sans-serif;
                background-image: url("../images/bg.jpg")
            }
            .heading{
                font-weight:bold;
                font-size: 30px;
                font-family: 'Raleway', sans-serif;
                margin-left: 41%;
                margin-top: 3%;
            }

            .light{
                padding-left: 200px;
            }

            .action{
                padding-left: 230px;
            }

            .sub{

            }

            #led{
                width: 200px;
                height:50px;
                padding-left: 50px;
                font-weight:bold;
                font-size: 16px;
                border-radius: 10px;
            }

            #action{
                width: 200px;
                height:50px;
                padding-left: 50px;
                font-weight:bold;
                font-size: 16px;
                border-radius: 10px;
            }

            .sub{
                border:solid 2px black;
                -webkit-transition: 1s;
                font-weight:bold;
                font-size : 20px;   
                background-color:white;
                width: 150px;
                height:60px;
                margin-left: 45%;
                margin-top: 50px;
                font-family: 'Raleway', sans-serif;
                border-radius: 20px;
                /* background-color:rgb(255, 255, 0); */
            }

            .sub:hover{
                /* border:solid 2px white; */
                font-weight:bold;
                font-size : 20px; 
                color:white;
                background-color:rgb(238, 34, 34); 
            }

        </style>
    </head>
    <body>
        <div>
            <h3 class="heading"> LED CONTROLLER</h3><br>
            <div class="container">
                <div class="row">
                    <div class="light col-lg-6">
                        <h4 style="padding-left:30px;"> LED </h4>
                        <select id="led" name="led">
                            <option name="red" value="r" style="font-weight:bold;"><span> RED</span></option>
                            <option name="green" value="g" style="font-weight:bold;">GREEN</option>
                            <option name="yellow" value="y" style="font-weight:bold;">YELLOW</option>
                        </select>
                        <input class="sub" type="submit" value="SUBMIT" onclick="send()">
                    
                    </div>
                    <div class="action col-lg-6">
                        <h4 style="padding-left:30px;"> ACTION </h4>
                    </div>                
                </div>
            </div>
            
        </div>
    </body>
    <script>
        function send(){
            var l = document.getElementById("led").value;
            //var a = document.getElementById("action").value;

            var arr = [];
            arr.push(l);
            var ar = JSON.stringify(arr);

            var x = new XMLHttpRequest();
            x.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){

                }
            };
            x.open("GET","rta.php?b"+ar,true);
            x.send();
        }
    </script>
</html>

<?php
	if(isset($_POST['submit'])){
        $l = $_POST['led'];
        $a = $_POST['action'];

		//echo $t;
		echo shell_exec("python /var/www/html/template/rta2.py $t $a 2>&1");
	}

?>