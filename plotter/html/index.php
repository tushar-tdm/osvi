<?php
    include_once '../../db.php';
    session_start();
    
    if($_SESSION['id']){
        $uid = $_SESSION['id'];
        $_SESSION['2d'] = 1;

        $sql = "SELECT token_num FROM token WHERE u_id = '$uid'";
        $result = mysqli_query($conn,$sql);
        $num1 = mysqli_fetch_assoc($result);    

        $sql = "SELECT token_num from token order by token_num ASC limit 1";
        $r = mysqli_query($conn,$sql);
        $num2 = mysqli_fetch_assoc($r);

        $n = (int)$num1['token_num'] - (int)$num2['token_num'];

    }
    else{
        header("Location: ../../login/login.html?Login_to_continue");
        exit(); 
    }
    
?>
<head>
    <title> NITK </title>
    <link rel="icon" type="image/gif" href="../../uploads/nitk.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/btheme.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
            
        
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <style>
    input.MyButton {
    width: 300px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    font-size: 150%;
    background: #3366cc;
    color: #fff;
    border: 1px solid #3366cc;
    border-radius: 10px;
    }
    input.MyButton:hover {
    color: #ffff00;
    background: #000;
    border: 1px solid #fff;
    }
    </style>
</head>

<body style="width:400px; margin:30 auto;background-image:url(img/2.png);">
    
    <script>
    
    </script>
    <!-- If he is not allowed to access the webpage -->
    <div id="nallow" style="display:none;">
        <?php  include_once 'wait.php'; ?>
        <script>
            //location.reload();
        </script>
    </div>
    <div id="allow" style="display:none;">
        <h1>Web based 2D Sketcher</h1>
        <div>
            <div style="width:300px; margin:10 auto;">
                <form>
                    <input class="MyButton" type="button" value="Upload Image" onclick="window.location.href='bin_upload.html'" />
                </form>
            </div>
            <div style="width:300px; margin:10 auto;">
                <form>
                    <input class="MyButton" type="button" value="Draw your Image" onclick="window.location.href='c.php'" />
                </form>
            </div>
        </div>
    </div>
    
</body>

<script>
    var interval;
    window.onload = function show_alert(){
        //check immediately when the page loads
        check();
        var interval = setInterval(check,5000);
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
    /* The error Unexpected token < in JSON at position 0 due to line 
        resp = JSON.parse(this.responseText) is due to an error in the php script to which it refers to.

        To detect the error use console.log(JSON.parse(this.responseText)) or
        console.log(this.responseText) (not sure which one.);
    */
</script>

