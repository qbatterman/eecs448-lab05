<?php

//get user name and makes sure not empty
$user = $_POST["username"];
if($user != "")
{
  $mysqli = new mysqli("mysql.eecs.ku.edu", "qbatterman", 'P@$$word123.' , "qbatterman");

  /* check connection */
  if ($mysqli->connect_errno)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  // check for user
  $result = $mysqli->query("SELECT user_id FROM Users");
  $exists = false;
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
        if($row["user_id"] == $user)
        {
          echo "username already exists";
          $exists = true;
          break;
        }
    }
  }
  //user does not exist create user
  if($exists == false)
  {
    $sql = "INSERT INTO Users (user_id) VALUES ('$user')";

    if ($mysqli->query($sql) === TRUE)
    {
      echo "User created";
    }
    else
    {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  $mysqli ->close();
}
else
{
  echo "Name cannot be blank";
}

?>
