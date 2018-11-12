// set canvas id to variable
var canvas = document.getElementById('draw');

// get canvas 2D context and set it to the correct size
var ctx = canvas.getContext('2d');
resize(); 

// resize canvas when window is resized
function resize() {
  ctx.canvas.width = window.innerWidth/1.5;
  ctx.canvas.height = window.innerHeight/1.5;
  ctx.beginPath();
  ctx.rect(0, 0, window.innerWidth, innerHeight);
  ctx.fillStyle = "white";
  ctx.fill();
}

// add event listeners to specify when functions should be triggered
window.addEventListener('resize', resize);
document.addEventListener('mousemove', draw);
document.addEventListener('mousedown', setPosition);
document.addEventListener('mouseenter', setPosition);

// last known position
var pos = { x: 0, y: 0 };

// new position from mouse events
function setPosition(e) {
  var rect = canvas.getBoundingClientRect();
  pos.x= (e.clientX - rect.left) / (rect.right - rect.left) * canvas.width,
  pos.y= (e.clientY - rect.top) / (rect.bottom - rect.top) * canvas.height
}

function draw(e) {
  
  if (e.buttons !== 1) return; // if mouse is pressed.....

  //var color = document.getElementById('hex').value;
  //window.alert(color);

  ctx.beginPath(); // begin the drawing path

  ctx.lineWidth = 3; // width of line 
  ctx.lineCap = 'round'; // rounded end cap
  ctx.strokeStyle = 'black'; // hex color of line

  ctx.moveTo(pos.x, pos.y); // from position
  setPosition(e);
  ctx.lineTo(pos.x, pos.y); // to position

  ctx.stroke(); // draw it!

 }