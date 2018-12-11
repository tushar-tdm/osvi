<?php
    include_once '../../db.php';
    session_start();
 
    if($_SESSION['id']){
    }
    else{
      header("Location: ../../login/login.html?Login_to_continue");
        exit(); 
    } 

?>

<!DOCTYPE html>
<html lang="en">
<title> NITK </title>
<link rel="icon" type="image/gif" href="../../uploads/nitk.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/btheme.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

<!-- FONTS -->
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<head>
    <meta charset="utf-8">
    <title>
       	Web Paint!
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .bdy{
            background-size: cover;
            background-repeat: no-repeat;
            font-family: "Source Sans Pro", Helvetica, sans-serif;
        }

        .icons-row,input{
            border-radius: 10px;
            border-color:transparent;
            margin-bottom: 20px;
        }
        #draw{
            margin-bottom:20px;
        }

        .include{
            border-color:transparent;
            width:100px;
            height: 35px;
            margin-left:20px;
            border-radius: 9px;
            background-color:rgb(94, 55, 235);
            color:snow;
            font-weight:bold;
            font-family: "Source Sans Pro", Helvetica, sans-serif;
        }

        .ur{
            margin-left: 35%;
            margin-bottom: 30px;
        }

        .inst{
            padding-left:80px;
            margin-bottom: 50px;
            padding-bottom: 30px;
            padding-top:30px;
            background-color: rgb(211, 208, 208);
            border-color: white;
            padding-left: 20px;
            font-family: 'Raleway', sans-serif;
        }

        .dime span{
            padding-left:80px;
            margin-bottom: 50px;
            padding-bottom: 30px;
            padding-top:30px;
            border-color: white;
            font-weight:bold;
            padding-left: 20px;
            font-family: 'Raleway', sans-serif;
        }

        .inst p{
            padding-left:50px;
        }

        .inst span{
            background-color:white;
            font-weight:bold;
        }
        .inst input{
            background-color:white;
        }

        .iii{
            font-weight:bold;
        }

        h2{
            color:red;
            font-family: 'Oswald', sans-serif;
        }

        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            font-family: "Source Sans Pro", Helvetica, sans-serif;
            font-weight:bold;
        }

        .active, .collapsible:hover {
            background-color: #555;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
            font-family: "Source Sans Pro", Helvetica, sans-serif;
        }

        .input_fields{
            padding-left:10px;
            border: solid 2px grey;
            /* font-family:"Raleway, Helvetica, sans-serif"; */
        }

        .input_fields:hover{
            border:solid 2px rgb(120, 120, 236);
        }
        
        .MyB {
            width: auto;
            padding: 17px;
            cursor: pointer;
            font-weight: bold;
            font-size: 150%;
            border-radius: 10px;
            background-color: #f13c20;
            border:solid 3px white;
            font-size:25px;
            color:white;
            margin-top:20px;
            -webkit-transition: 1s;
            font-family: 'Raleway', sans-serif;
        }

        #save , .save {
            width: 120px;
            height: 45px;
            margin: 20px 20px 20px 20px;
            padding: 10px 10px 10px 10px;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            border: solid 2px #0000b3;
            background-color:#1a1aff;
            cursor:pointer;
        }

        #submit{
            background-color:#55ff00;
            color: white;
            border:solid 2px #3bb300;
            cursor:pointer;
        }

        #simulate{
            background-color:#ff5c33;
            color: white;
            border:solid 2px #e62e00;
            cursor:pointer;
        }

    </style>
</head>
<body class="bdy" style="background-color:white;">
    
<div id="allow" style="display:none;">
    <h2 style="padding-left:43%;margin-bottom:30px;" ><b>INSTRUCTIONS </b></h2>
    <div class="inst">
        <div class="iii">
            <p> The origin of the canvas is located at the top left corner </p>
            <p> The dimension of the canvas is 1000px X 500px</p>
            <p style="color:red"><strong> DO NOT RE-SIZE THE BROWSER WINDOW WHILE OR AFTER DRAWING</strong></p>
            <p> You can undo and redo the shapes that include on the canvas, 
                however you cannot undo and redo the free hand drawing on the canvas</p>
            <p> The origin of the canvas is the top left corner.</p>
            <p> Set your paper dimension below before you start drawing </p>
            <p> You will loose your current drawing if you refresh the page </p>
        </div><br>
            <h4 class=""><b>PARAMETERS OF CIRCLE</b></h4>
                <p> <b>x-coordinate:</b> This is the x-coordinate of the center of the circle.</p>
                <p> <b>y-coordinate:</b> This is the y-coordinate of the center of the circle.</p>
                <p> <b>radius:</b> This is the radius of the circle.</p>
                <p> <b>perimeter:</b> This is the perimeter of the center of the circle.
                        For value 'p' it is p*pi*radius; (p=2 -> full circle, in clockwise direction from positive x-axis). 

                </p>
                <br>
            <h4 class=""><b>PARAMETERS OF RECTANGLE </b></h4>
            
                <p> <b>x-coordinate:</b> This is the x-coordinate of the top-left corner of the rectangle.</p>
                <p> <b>y-coordinate:</b> This is the y-coordinate of the top-left corner of the rectangle.</p>
                <p> <b>width</b> This is the width of the rectangle.</p>
                <p> <b>height</b> This is the height of the rectangle.</p>
                <br>
            <h4 class=""><b>PARAMETERS OF ELLIPSE </b> </h4>
                <p> <b>x-coordinate:</b> The x-axis coordinate for the ellipse's center.</p>
                <p> <b>y-coordinate:</b> The y-axis coordinate for the ellipse's center.</p>
                <p> <b>radius-x: </b> The ellipse's major-axis radius</p>
                <p> <b>radius-y: </b> The ellipse's minor-axis radius.</p>
                <p> <b>rotation: </b> The rotation for this ellipse, expressed in degree. (in clock-wise direction.
                     Use negative sign for anti-clockwise direction)</p>
                <p> <b> Strart-angle: </b> The starting angle, measured clockwise from the positive x-axis and expressed in degrees.</p>
                <p> <b> End-angle: </b> The ending angle, measured clockwise from the positive x-axis and expressed in degrees.</p>
            <br>
                <h4 class=""><b>PARAMETERS OF LINE </b> </h4>
                <p><b>x1: </b> The x co-cordinate of point 1</p>
                <p><b>y1: </b> The y co-cordinate of point 1</p>
                <p><b>x2: </b> The x co-cordinate of point 2</p>
                <p><b>y2: </b> The y co-cordinate of point 2</p>

    </div>
<br><br>

        <!-- <div class="dime">
         <p> SET YOUR PAPER DIMENSIONS </p>
            <span style="margin-left:25%;">Length (in cms):<span>
                 <input id="length" type="number" class="input_fields" placeholder="Length in cms" min="0" max="100">
            <span>Breadth (in cms):</span> 
                <input id="breadth" type="number" class="input_fields" placeholder="Breadth in cms" min="0" max="100">
        <br>
        <button style="margin-left:48%;" name="submit" onclick="set_dime()">SET </button>
        </div> -->
    <br>
    <h1 align="center" style="color:black;font-weight:bold;font-family:Raleway, Helvetica, sans-serif;">
        Draw your Image below
    </h1>

<div align="center" style="margin:100">
    <canvas id="draw" style="border: 2px solid black;width:1000px;height:500px;"></canvas>
</div>

<div class="ur">
    <button class="include" type="button" onclick="undo()"> <i class="fa fa-undo"></i> Undo</button>
    <button class="include" type="button" onclick="redo()"> Redo <span class="glyphicon glyphicon-repeat"></span> </button>
    <button class="include" type="button" onclick="reset()"> <span class="glyphicon glyphicon-refresh"></span> Reset</button>
</div>

<div class="icons row">
    <div class="circle col-lg-3 col-md-3 col-sm-3" style="margin-left:10px;">
        <label style="color:black;"> CIRCLE </label><br>
        <input class="input_fields" type="number" id="cx" placeholder="x-coordinate" ><br>
        <input class="input_fields" type="number" id="cy" placeholder="y-coordinate" ><br>
        <input class="input_fields" type="number" id="cr" placeholder="radius" ><br>
        <input class="input_fields" type="number" id="cp" placeholder="perimeter" ><br>
        <button class="include" type="button" onclick="add_circle()">ADD</button>
    </div>
    <div class="recatangle col-lg-3 col-md-3 col-sm-3">
            <label style="color:black;"> RECTANGLE </label><br>
        <input class="input_fields" type="number" placeholder="x-coordinate" id="rx"><br>
        <input class="input_fields" type="number" placeholder="y-coordinate" id="ry"><br>
        <input class="input_fields" type="number" placeholder="width" id="rw"><br>
        <input class="input_fields" type="number" placeholder="height" id="rh"><br>
        <button class="include" type="button" onclick="add_rect()">ADD</button>
    </div>
    <div class="oval col-lg-3 col-md-3 col-sm-3">
            <label style="color:black;"> ELLIPSE </label><br>
        <input class="input_fields" type="number" placeholder="x-coordinate" id="oax1"><br>
        <input class="input_fields" type="number" placeholder="y-coordinate" id="oay1"><br>
        <input class="input_fields" type="number" placeholder="radius-x" id="oax2"><br>
        <input class="input_fields" type="number" placeholder="radius-y" id="oay2"><br>

        <input class="input_fields" type="number" placeholder="rotation" id="ox"><br>
        <input class="input_fields" type="number" placeholder="start angle" id="oy"><br>
        <input class="input_fields" type="nunmber" placeholder="end angle" id="oa"><br>
        <button class="include" type="button" onclick="add_oval()">ADD</button>
    </div>
    <div class="line col-lg-2 col-md-3 col-sm-3">
            <label style="color:black;"> LINE </label><br>
        <input class="input_fields" type="number" placeholder="x1" id="lx1"><br>
        <input class="input_fields" type="number" placeholder="y1" id="ly1"><br>
        <input class="input_fields" type="number" placeholder="x2" id="lx2"><br>
        <input class="input_fields" type="number" placeholder="y2" id="ly2"><br>
        <button class="include" type="button" onclick="add_line()">ADD</button>
    </div>
</div>


<div align="center">
    <br>
    <div align = "center" style="display: inline-block;padding: 25px">
        <input class="MyB" id="upload" type="button" value="Upload and convert to G-CODE" onclick="showsave()">
    </div>
    <br>            
        <div class="container">
        <div class="row">
            <div col="col-lg-12 col-md-12 col-sm-6" align="center" style="display:inline-block;padding: 25px;">
                <a class="col-lg-3" href="./sim/test.png" id="save" download style="display:none;"> Save Image </a>
                <button class="save col-lg-3" id="submitt" onclick="submitpic()" style="display:none;"> Submit </button>
                <button type="submit" style="display: none;" class="save col-lg-3" id='simulate' 
                onclick="window.location.href='sim/index.php'">Simulate</button>
            </div>
        </div>
    </div>
    <div class="alert alert-info" id="loading" style="display:none;margin-top:20px;" role="alert">
                Uploading image...
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            </div>
        </div>
    </div>
    <div id="message" style="color: white;background-color: rgb(42, 218, 42);display: block;"></div>

</div>
    </div>

    <div id="nallow" style="display:none;">
        <?php include_once 'wait.php';  ?>
        
    </div>
</body>

<!-- ----------------------------- SCRIPT CODES ----------------------------------- -->

<script type="text/javascript">
    var c = document.getElementById('draw');
    var ctx = c.getContext("2d");
    var urnum = [];
    var interval;
        
    window.onload = function(){
        check();
        /* var interval = setInterval(check,5000); */
        make_reset();
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
    function make_reset(){
        var reset_image = ctx.getImageData(0,0,1000,500);
        urnum.push(reset_image);
    }

    function reset(){
        ctx.putImageData(urnum[0],0,0);
    }

    function showsave(){
        document.getElementById("save").style.display = "block";
        document.getElementById("submitt").style.display = "block";
    }

    /* var urpara = []; */
    var current_s =0, change_s = -1, last_s = 0;
    //if current_s < last_s then remove all the states after the current_s and add with the new one



    var canvasId = document.getElementById('draw');
    document.getElementById('upload').onclick = function (e) {
        

        var canvasData = canvasId.toDataURL("image/png");
        document.getElementById("loading").style.display="block";
        var ajax = new XMLHttpRequest();
        ajax.open("POST",'canvas2.php',true);
        //window.alert(canvasData)
        ajax.setRequestHeader('Content-Type', 'application/upload');
        ajax.send(canvasData);    
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("loading").style.display="none";
                document.getElementById("message").innerHTML = this.responseText;
                document.getElementById("simulate").style.display = "block";
                document.getElementById('save').style.display = "block";

            }
        };
    }

    function add_circle(){
        var x = document.getElementById("cx").value;
        var y = document.getElementById("cy").value;
        var r = document.getElementById("cr").value;
        var p = document.getElementById("cp").value;
    
        /* if(x>1000 || y>500 || r> 250 || x+r > 1000 || x-r < 0 || y+r > 500 || y-r < 0){
            alert("Co-ordinates out of bound");
            exit();
        } */
    //never use id as c_x because that didnt work.
        ctx.beginPath();
        ctx.arc(x,y,r,0,p*Math.PI);
        ctx.stroke(); 

        var imageData = ctx.getImageData(0,0,1000,500);
        if(current_s < last_s){
            //to remove the later images when undo and somthiing new is written
            urnum.splice(current_s+1);
        }

        urnum.push(imageData);
        current_s = current_s+1;
        last_s = current_s;
    }

    function add_rect(){

        var x = document.getElementById("rx").value;
        var y = document.getElementById("ry").value;
        var w = document.getElementById("rw").value;
        var h = document.getElementById("rh").value;
    
        /* if(x > 1000 || y > 500 || y+h>500 || x+w>1000){
            alert("Co-ordinates out of bound");
            exit();   
        } */
    //never use id as c_x because that didnt work.
        ctx.beginPath();
        ctx.rect(x, y, w, h);
        ctx.stroke(); 

        var imageData = ctx.getImageData(0,0,1000,500);
        
        if(current_s < last_s){
            //to remove the later images when undo and somthiing new is written
            urnum.splice(current_s+1);
        }
        current_s = current_s+1;
        last_s = current_s;
        urnum.push(imageData);
    }

    function add_oval(){
        var x = document.getElementById("oax1").value;
        var y = document.getElementById("oay1").value;
        var rx = document.getElementById("oax2").value;
        var ry = document.getElementById("oay2").value;
        var rot = document.getElementById("ox").value;
        var sang = document.getElementById("oy").value;
        var eang = document.getElementById("oa").value;      

        ctx.setLineDash([])
        ctx.beginPath();

       /*  if(x > 1000 || y > 500 || rx > 1000 || ry > 500){
            alert("Co-ordinates out of bound");
            exit();
        } */

        //first 2 are x and y coordinate. 
        //next 2 are x and y radius 
        //next is the angle of tilt w.r.t to axis
        //0 means full completion.. and so does 2.
        ctx.ellipse(x, y, rx, ry, rot * Math.PI/180, sang * Math.PI/180, eang * Math.PI/180);
        ctx.stroke();
        
        var imageData = ctx.getImageData(0,0,1000,500);
        if(current_s < last_s){
            //to remove the later images when undo and somthiing new is written
            urnum.splice(current_s+1);
        }
        current_s = current_s+1;
        last_s = current_s;
        urnum.push(imageData);
    }

    function add_line(){
        var x1 = document.getElementById("lx1").value;
        var y1 = document.getElementById("ly1").value;
        var x2 = document.getElementById("lx2").value;
        var y2 = document.getElementById("ly2").value;
        
        /* if(x1 > 1000 || x2 > 1000 || y1 > 500 || y2 > 500){
            alert("Co-ordinates out of bound");
            exit();
        } */
        ctx.beginPath();
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.stroke();

        var imageData = ctx.getImageData(0,0,1000,500);
        if(current_s < last_s){
            //to remove the later images when undo and somthiing new is written
            urnum.splice(current_s+1);
        }
        current_s = current_s+1;
        last_s = current_s;
        urnum.push(imageData);

    }

    function remove(){
         ctx.clearRect(0,0,1000,500); 
        //var imageData = ctx.getImageData(0,0,1000,500);
    }

    function undo(){
        if(current_s-1 >= 0){
            current_s = current_s - 1;
            var x = urnum[current_s];
            ctx.putImageData(x,0,0);
        }

    }

    function redo(){
        if(current_s+1 <= last_s){
            current_s += 1;
            var x = urnum[current_s];
            ctx.putImageData(x,0,0); 
        }
               
    }
    // give an option to undo and redo the diagrams
    // whenevr a shape is included in the canvas store it in an object.
    /* hold a variable called current size. ( increases as shapes gets added, remains same on undo and redo 
        but changes when undo and a new image is added.)*/
    /* when undo is pressed the canvas must remove all the shapes and add them again except the last one*/

    //we can simply create an array. the first parameter will 1 for circle 2 for rect 3 for ellipse and 4 for line
    //and the follwing () number of parametres will be its values in given order.
    
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
        content.style.display = "none";
        } else {
        content.style.display = "block";
        }
    });
    }

    function save(){

        $uid = "tdm";
        $id = JSON.stringify($uid);
        var x = new XMLHttpRequest();
        x.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //do nothing
            }

        };
        x.open("GET","save.php?b="+$id,true);
        x.send();
    }

    function submitpic(){
        //console.log("entered here");
        var x = new XMLHttpRequest();
        x.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //do nothing
            }
        };
        x.open("GET","submit.php");
        x.send();
    }
</script>

<script src="canvas.js"></script>