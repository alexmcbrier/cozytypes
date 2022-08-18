<?php
$link = mysqli_connect("localhost", "root", "AMcB0807", "cozytypes");
if($link === false){
    die("ERROR: Could not connect. " 
                . mysqli_connect_error());
}
$sql = "UPDATE user SET fontSize='5' WHERE id=19";
if(mysqli_query($link, $sql)){
    echo "Record was updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " 
                            . mysqli_error($link);
} 
mysqli_close($link);