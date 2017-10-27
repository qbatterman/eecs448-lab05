<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $user = $_POST["users"];
  $mysqli = new mysqli("mysql.eecs.ku.edu", "qbatterman", 'P@$$word123.' , "qbatterman");

  /* check connection */
  if ($mysqli->connect_errno)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  //go through list
//  $sql = "INSERT INTO Posts (author_id, content) VALUES ('$user', '$post')";
  $result = $mysqli->query("SELECT content FROM Posts WHERE author_id =  '$user'");
  if ($result->num_rows > 0)
  {
    echo "<table border =\"\">";
    echo '<tr><td>' . "<b>Posts by " . $user . "</b>" . '</td></tr>';
    while($row = $result->fetch_assoc())
    {
      echo '<tr><td>' . $row["content"] . '</td></tr>';
    }

    echo "</table>";
  }
  else
  {
    echo "No posts by this user";
  }

  $mysqli ->close();

?>
