<?php
//$dir = "/var/www/html/dir";         
$dir = "C:/xampp/htdocs/oo/plotter/html/uploads";         
$pattern = '\.(gcode)$'; // check only file with these ext.          
$newstamp = 0;            
$newname = "";

$file_array = array();

/* function setInterval($f, 5000)
{
    while(true)
    {
        $f();
        sleep($seconds);
    }
} */

while(0)
{
  //echo "hey";
  if (is_dir($dir))
  {
    if ($dh = opendir($dir))
    {
      while (($file = readdir($dh)) !== false)
      {
        //this is to read all the files in that folder
        if($file != '.' && $file != '..')
        {
          //make sure the file exists
          $fpath = 'uploads/'.$file;
          //take the file modified time.
          $filet = filemtime($fpath);

          if($filet > $newstamp){
            $newstamp = $filet;
            $newname = $file;

            echo "filename: " .$filet. "<br>";
            array_push($file_array,$filet);
          }
        }
      }
      closedir($dh);
    }
  }
  sleep(5000);
}

//echo json_encode();

//  to make this keep running 24*7 make another file which keeps calling this code through ajax.Put the ajax code in while
//  loop 

// $newstamp is the time for the latest file
// $newname is the name of the latest file
// print last mod.file - format date as you like            
//print $newname . " - " . date( "Y/m/d", $newstamp);   
?>
