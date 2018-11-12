<?php
if (file_get_contents("php://input"))
{
  // Get the data
  $imageData= file_get_contents("php://input");
 
  // Remove the headers (data:,) part.
  // A real application should use them according to needs such as to check image type
  $filteredData=substr($imageData, strpos($imageData, ",")+1);
 
  // Need to decode before saving since the data we received is already base64 encoded
  $unencodedData=base64_decode($filteredData);
 
  //echo "unencodedData".$unencodedData;
  echo "<h1 align='center'>Image is converted to Gcode</h1>";

  // Save file. This example uses a hard coded filename for testing,
  // but a real application can specify filename in POST variable
  $fp = fopen( 'sim/test.png', 'w' );
  fwrite( $fp, $unencodedData);
  fclose( $fp );
  shell_exec('node C:/xampp/htdocs/oo/plotter/html/sim/image2gcode');
}

?>
