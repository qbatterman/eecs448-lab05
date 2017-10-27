<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$holder = "";
$mysqli = new mysqli("mysql.eecs.ku.edu", "qbatterman", 'P@$$word123.' , "qbatterman");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//go through list

$result = $mysqli->query("SELECT post_id FROM Posts");
if ($result->num_rows > 0)
{

  while($row = $result->fetch_assoc())
  {

    $holder = $row["post_id"];
    settype($holder, "string");
    //undefined offset
    $hold = $_POST[$holder];
  }

}
else
{
  echo "No posts to delete";
}

$mysqli ->close();

?>
