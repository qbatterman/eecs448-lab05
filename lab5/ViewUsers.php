<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);


  $mysqli = new mysqli("mysql.eecs.ku.edu", "qbatterman", 'P@$$word123.' , "qbatterman");

  /* check connection */
  if ($mysqli->connect_errno)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  //go through list
  $result = $mysqli->query("SELECT user_id FROM Users");
  if ($result->num_rows > 0)
  {
    echo "<table border =\"\">";
    echo '<tr><td>' . "<b>User Names</b>" . '</td></tr>';
    while($row = $result->fetch_assoc())
    {
      echo '<tr><td>' . $row["user_id"] . '</td></tr>';
    }

    echo "</table>";
  }
  else
  {
    echo "No users to show.";
  }

  $mysqli -> close();
?>
