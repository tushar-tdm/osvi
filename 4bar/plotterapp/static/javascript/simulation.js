//Define the bot.
var botComponent;

//The Slider 
var slider = document.getElementById("myRange");
var canvasWidth='';
var canvasHeight='';
var canvasDiv;
//Define the function to start the calibration
function startCalibration(cwidth, cheight,project_id) {
    canvasDiv = document.getElementById('canvasDiv');
    canvasWidth = cwidth;
    canvasHeight = cheight;
    botComponent = new component(30, 30, "red", 240, 135);
    myProjectArea.start();
    string_left = new draw_strings(0, 0, botComponent.x, botComponent.y);
    string_right = new draw_strings(canvasWidth, 0, botComponent.x, botComponent.y);
}

//Define the project area.
var myProjectArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.setAttribute('width', canvasWidth);
        this.canvas.setAttribute('height', canvasHeight);
        this.context = this.canvas.getContext("2d");
        canvasDiv.appendChild(this.canvas);
        this.interval = setInterval(updateProjectArea, 20);
    },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}

//Define the bot attributes object.
function component(width, height, color, x, y) {
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;
    this.x = x;
    this.y = y;    
    this.update = function() {
        ctx = myProjectArea.context;
        ctx.fillStyle = color;
        ctx.fillRect(this.x, this.y, this.width, this.height);
    },
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;        
    }   
}

//Defines the string objects.
function draw_strings(loc_x, loc_y, string_x, string_y) {
    this.loc_x = loc_x;
    this.loc_y = loc_y;
    this.string_x = string_x;
    this.string_y = string_y;
    this.speedX = 0;
    this.speedY = 0;
    this.update = function() {
        ctx = myProjectArea.context;
        ctx.beginPath();
        ctx.moveTo(this.loc_x, this.loc_y);
        ctx.lineTo(this.string_x + (botComponent.width)/2, this.string_y);
        ctx.stroke();
    }
    this.newPos = function() {
        this.string_x += this.speedX;
        this.string_y += this.speedY;        
    } 
}

//Updates the project area everytime the mouse moves 
function updateProjectArea() {
    myProjectArea.clear();
    botComponent.newPos();  
    botComponent.update();
    string_left.newPos();
    string_left.update();
    string_right.newPos();
    string_right.update();
}


//Moves the bot up left when the mouse is pressed or held down.
function leftUp() {
    botComponent.speedX = -1;
    string_left.speedX = -1;
    string_right.speedX = -1;
    botComponent.speedY = -1;
    string_left.speedY = -1;
    string_right.speedY = -1;
}

//Moves the bot down right when the mouse is pressed or held down.
function rightDown() { 
    botComponent.speedX = 1
    botComponent.speedY = 1
    string_left.speedX = 1;
    string_left.speedY = 1;
    string_right.speedX = 1;
    string_right.speedY = 1;
}

//Moves the bot down left when the mouse is pressed or held down.
function leftDown() { 
    botComponent.speedX = -1
    botComponent.speedY = 1
    string_left.speedX = -1;
    string_left.speedY = 1;
    string_right.speedX = -1;
    string_right.speedY = 1;
}

//Moves the bot up right when the mouse is pressed or held down.
function rightUp() { 
    botComponent.speedX = 1
    botComponent.speedY = -1
    string_left.speedX = 1;
    string_left.speedY = -1;
    string_right.speedX = 1;
    string_right.speedY = -1;
}

//Moves the bot up
function up() {
    botComponent.speedY = -1;
    string_left.speedY = -1;
    string_right.speedY = -1;
}

//Moves the bot down
function down() {
    botComponent.speedY = 1;
    string_left.speedY = 1;
    string_right.speedY = 1;
}

//Moves the bot towards the left
function left() {
    botComponent.speedX = -1;
    string_left.speedX = -1;
    string_right.speedX = -1;
}

//Moves the bot towards the right
function right() {
    botComponent.speedX = 1;
    string_left.speedX = 1;
    string_right.speedX = 1;
}


//Reduces the speed to 0 when the mouse button is not pressed.
function clearmove() {
    botComponent.speedX = 0; 
    botComponent.speedY = 0; 
    string_left.speedX = 0;
    string_left.speedY = 0;
    string_right.speedX = 0;
    string_right.speedY = 0;
}


// output.innerHTML = slider.value; // Display the default slider value

// // Update the current slider value (each time you drag the slider handle)
// slider.oninput = function() {
//     output.innerHTML = this.value;
// }


