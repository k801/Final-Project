<?php
include "db.php";
$id=$_POST['room_no'];
$sql="delete from rooms where room_no=$id";
$result=mysqli_query($conn,$sql);

if($result)
{
    echo "yes";
}
else
{echo mysqli_error($conn);}

?>