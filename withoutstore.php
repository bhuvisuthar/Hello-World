<!DOCTYPE html>
<html>
<body>
<center><br><br><br><br>
<table width="600">
<form action="" method="post" enctype="multipart/form-data">

<tr>
<td width="20%">Select CSV file</td>
<td width="80%"><input type="file" name="file" id="file" /></td>
</tr>

<tr></tr>
<tr></tr>
<tr>
<td></td>
<td><input type="submit" name="submit" /></td>
</tr>

</form>
</table>
</center>
</body>
</html>

<?php
if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["file"])) {
	   

            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
              
                 //if file already exists
             if (file_exists("uploads/" . $_FILES["file"]["name"])) {
             echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
             
          //read file without storing them  
              
echo "<html><body><center><table border='2'>";
$f = fopen($_FILES["file"]["tmp_name"], "r");
while (($line = fgetcsv($f)) !== false) 
{
echo "<tr>";
foreach ($line as $cell)
        {
echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
echo "</tr>";
}
fclose($f);
echo "</table></center></body></html>";

            }
        }
     } else {
             echo "No file selected <br />";
     
   }
   
}
?>

