<!DOCTYPE html>
<html>
  <head>
    <title>leapp test page</title>
  </head>
  <body>
    <h1>Hello leapp!</h1>
    <?php
    echo "<b>running php " . phpversion() . " on " . php_uname() . "</b><br>\n";
    echo "<b>/etc/redhat-release: " . file_get_contents('/etc/redhat-release') . "</b><br><br>\n\n";

    $servername = "localhost";
    $username = "leapp";
    $password = "12345";
    $dbname = "leapptest";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT customerNumber, customerName FROM customers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "number: " . $row["customerNumber"]. " - Name: " . $row["customerName"]. "<br>\n";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
  </body>
</html>
