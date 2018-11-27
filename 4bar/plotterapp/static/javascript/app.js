function loadCanvas(cwidth, cheight,scaleType,project_id) {
  // Set the canvas id to the variable canvas
  var canvasDiv = document.getElementById('canvasDiv');
  var clearCanvas = document.getElementById('clearcanvas');
  canvas = document.createElement('canvas');

  // Get the context 2d for the canvas
  context = canvas.getContext('2d');

  // Define arrays for storing the pixel values corresponding to the drawing the user has made.
  var mouse_X_pos = new Array();
  var mouse_Y_pos = new Array();
  var xy = new Array();
  var clickDrag = new Array();

  //Get available height and width
  /*var iwidth = window.innerWidth;
  var iheight = window.innerHeight;

  var flag = 0;

  if (cwidth==cheight) {
    var flag = 1;
  }

  //scale the canvas to fit browser screen
  var scaleW = cwidth/iwidth;
  var scaleH = cheight/iheight;

  if(scaleType==0) {
    scaleW += 1;
    scaleH += 1;
  }
  else if (scaleType == 1) {
    scaleW += 4;
    scaleH += 4;
  }
  else if (scaleType == 2) {
    scaleW += 2;
    scaleH += 2;
  }
  else {      //consider as 'in'
    scaleW += 1;
    scaleH += 1;
  }

  //canvas width and height
  if (flag==0) {
    var canvasWidth = Math.round(cwidth/scaleW);
    var canvasHeight = Math.round(cheight/scaleH);
  }
  else {  //width and height are equal
    var canvasWidth = Math.round(cheight/scaleH);
    var canvasHeight = canvasWidth;
  }*/

  // Set the canvas window attributes.
  canvas.setAttribute('width', cwidth);
  canvas.setAttribute('height', cheight);
  canvas.setAttribute('id', 'canvas');
  canvas.setAttribute('name', 'canvas');

  //Append the canvas to canvasDiv
  canvasDiv.appendChild(canvas);

  //Intially set the paint to false
  var paint = false;

  if(typeof G_vmlCanvasManager != 'undefined') {
  	canvas = G_vmlCanvasManager.initElement(canvas);
  }

  // When the user starts drawing we record the position in an array via the add click function.
  // This is for when the user is clicking down on the screen.
  $('#canvas').mousedown(function(e){
    var mouseX = e.pageX - this.offsetLeft;
    var mouseY = e.pageY - this.offsetTop;

    paint = true;
    addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
    redraw();
  });

  // If paint is true, then this will start drawing.
  // We first record the position in the array & drawing starts. This is for moving the
  // virtual pen on the screen.
  $('#canvas').mousemove(function(e){
    if(paint){
      addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
      redraw();
    }
  });

  // For when the mouse button is released.
  $('#canvas').mouseup(function(e){
    paint = false;
  });
  $('#canvas').mouseleave(function(e){
    paint = false;
  });

  // Stores the x & y coordinates of mouse
  function addClick(x, y, dragging)
  {
      mouse_X_pos.push(x);
      mouse_Y_pos.push(y);
      
      clickDrag.push(dragging);
  }

  // This is where we draw in the canvas.
  function redraw(){
    // Clear the canvas
    $("#clearCanvas").click(function () {
        context.clearRect(0, 0, cwidth, cheight);
        sendData("reset",xC.toFixed(2),yC.toFixed(2));
        mouse_X_pos = []; mouse_Y_pos = []; clickDrag = []; // This will empty the array after the clear button has been pressed.
      });

    context.strokeStyle = "#df4b26";
    context.lineJoin = "round";
    //TODO: Later set this to user preference or pencil width of the plotter.
    context.lineWidth = 1;

    for(var i=0; i < mouse_X_pos.length; i++) {
      context.beginPath();
      if(clickDrag[i] && i){
        context.moveTo(mouse_X_pos[i-1], mouse_Y_pos[i-1]);
       }else{
         context.moveTo(mouse_X_pos[i]-1, mouse_Y_pos[i]);
       }
       context.lineTo(mouse_X_pos[i], mouse_Y_pos[i]);
       context.closePath();
       context.stroke();
    }
  }
  $("#submitCanvas").click(function(){
    for (var i=0,j=0; (i<mouse_X_pos.length)&&(j<mouse_Y_pos.length);i++,j++) {
        xC = ((mouse_X_pos[i])/100)*25.4;
        yC = ((cheight - mouse_Y_pos[j])/100)*25.4;
        yC1 = (cheight/100)*25.4;
        yC = yC1-yC;
        xC1 = (cwidth/100)*25.4;
        l1 = Math.sqrt(Math.pow(xC,2)+Math.pow(yC,2))*42.8;
        xC=xC1-xC;
        l2 = Math.sqrt(Math.pow(xC,2)+Math.pow(yC,2))*44.16;
        console.log(l1.toFixed(2)+","+l2.toFixed(2));
        sendData("submit",l1.toFixed(2),l2.toFixed(2));
    }
    startPlot("complete");
  });
}

function sendData(btnType,x,y){
  var jsondata = JSON.stringify({
    'btnType': btnType,
    'x':x,
    'y':y,
  })
  $.ajax({
    type: 'POST',
    url: "http://localhost:5000/save-coordinates",
    data: jsondata,
    contentType: "application/json",
    dataType: "json",
  });
}

function startPlot(trigData){
  var jsondata = JSON.stringify({
    'trigData': trigData,
  })
  $.ajax({
    type: 'POST',
    url: "http://localhost:5000/send-coordinates",
    data: jsondata,
    contentType: "application/json",
    dataType: "json",
  });
}
