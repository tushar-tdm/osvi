<?php
session_start();

if ( isset($_FILES["file"]["type"]) )
{
  $max_size = 500 * 1024; // 500 KB
  $destination_directory = "./";
  $validextensions = array("jpeg", "jpg", "png");

  $temporary = explode(".", $_FILES["file"]["name"]);
  $file_extension = end($temporary);

  // We need to check for image format and size again, because client-side code can be altered
  if ( (($_FILES["file"]["type"] == "image/png") ||
        ($_FILES["file"]["type"] == "image/jpg") ||
        ($_FILES["file"]["type"] == "image/jpeg")
       ) && in_array($file_extension, $validextensions))
  {
    if ( $_FILES["file"]["size"] < ($max_size) )
    {
      if ( $_FILES["file"]["error"] > 0 )
      {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Error: <strong>" . $_FILES["file"]["error"] . "</strong></div>";
      }
      else
      {
        if ( file_exists($destination_directory . $_FILES["file"]["name"]) )
        {
          echo "<div class=\"alert alert-danger\" role=\"alert\">Error: File <strong>" . $_FILES["file"]["name"] . "</strong> already exists.</div>";
        }
        else
        {
          $sourcePath = $_FILES["file"]["tmp_name"];
          $targetPath = $destination_directory . $_FILES["file"]["name"];
          //move_uploaded_file($sourcePath, $targetPath);
          imagepng(imagecreatefromstring(file_get_contents($_FILES['file']['tmp_name'])),"sim/test.png");
          shell_exec('node C:\Bitnami\wampstack-7.1.14-0\apache2\htdocs\4\sim\image2gcode');
          echo "<div class=\"alert alert-success\" role=\"alert\">";
          echo "<p>Image uploaded successful</p>";
          echo "<p>File Name: <a href=\"". $targetPath . "\"><strong>" . $targetPath . "</strong></a></p>";
          echo "<p>Type: <strong>" . $_FILES["file"]["type"] . "</strong></p>";
          echo "<p>Size: <strong>" . round($_FILES["file"]["size"]/1024, 2) . " kB</strong></p>";
          echo "<p>Temp file: <strong>" . $_FILES["file"]["tmp_name"] . "</strong></p>";
          echo "</div>";
          echo "<button class=\"btn btn-lg btn-primary\" id=\"upload-button\" type=\"submit\" onclick=\"window.location.href='sim/index.php'\">Simulate</button>";
        }
      }
    }
    else
    {
      echo "<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is " . round($_FILES["file"]["size"]/1024, 2) . " KB, maximum size allowed is " . round($max_size/1024, 2) . " KB</div>";
    }
  }
  else
  {
    echo "<div class=\"alert alert-danger\" role=\"alert\">Unvalid image format. Allowed formats: JPG, JPEG, PNG.</div>";
  }
}

?>
