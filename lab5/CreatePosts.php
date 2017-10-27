<?php

//get user name & text and makes sure not empty
$user = $_POST["username"];
$post = $_POST["post"];
if($user != "" && $post != "")
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
    //users exist, cycle through
    while($row = $result->fetch_assoc())
    {
        //user matches, create post
        if($row["user_id"] == $user)
        {
          $sql = "INSERT INTO Posts (author_id, content) VALUES ('$user', '$post')";
          if ($mysqli->query($sql) === TRUE)
          {
            echo "Post complete";
          }
          else
          {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $exists = true;
          break;
        }
    }
  }
  else
  {
    echo "No users exist, please create a user before posting.";
    //done so other if statement doesn't also print
    $exists = true;
  }
  //no user exists
  if($exists == false)
  {
    echo "could not find user, please check spelling or create a user before posting.";
  }

  $mysqli ->close();
}
else
{
  echo "Name and Post cannot be blank";
}
?>
