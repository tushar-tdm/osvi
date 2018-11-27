//Define a variable to get the input from the current value of the slider.
var slider = document.getElementById('myRange');

function leftIn() {
    console.log('LI-' + slider.value);
    sendCalibrationData('LI-' + slider.value)
}

function leftOut() {
    console.log('LO' + slider.value);
    sendCalibrationData('LO' + slider.value)
}

function rightIn() {
    console.log('RI-' + slider.value);
    sendCalibrationData('RI-' + slider.value)
}

function rightOut() {
    console.log('RO' + slider.value);
    sendCalibrationData('RO' + slider.value)
}

function sendCalibrationData(target){
  var jsondata = JSON.stringify({
    'target':target
  })
  $.ajax({
    type: 'POST',
    url: "http://localhost:5000/calibration-data",
    data: jsondata,
    contentType: "application/json",
    dataType: "json",
  });
}