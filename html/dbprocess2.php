
<?php
include 'dbprocess.php';

$conn = OpenCon();

// echo "Connected Successfully";

$result = mysqli_query($conn,"SELECT * FROM BossStat");


$name = array();
$def = array();
$arm = array();
$weak = array();
$waff = array();
$melee = array();
$range = array();
$mage = array();
$img = array();
$vid = array();
$temp = 0;
while($row = mysqli_fetch_array($result))
{

  $name[] = $row['Name'];
  $def[] = $row['Defence Level'];
  $arm[] = $row['Armour'];
  $weak[] = $row['Weakness'];
  $waff[] = $row['Weakness-A'];
  $melee[] = $row['Melee'];
  $range[] = $row['Range'];
  $mage[] = $row['Mage'];
  $img[] = $row['Image'];
  if($row['Video'] == "")
  {
    $vid[] = 1;
    $temp++;
  }
  else {
    $vid[] = $row['Video'];
  }

}

mysqli_close($conn);
?>
