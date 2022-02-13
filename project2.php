<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="submit" Value="Connect to MySQL Server & Insert data in a table">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
echo "Connected successfully<br>";
}
$sql =  "CREATE TABLE movie_details(moviename varchar(200), leadactor varchar(200), leadactress varchar(200), yor int, director varchar(200))";
$result = mysqli_query($conn, $sql);
if($result){
  echo "The table is created successfully<br>";
}
else{
  echo "The table was not created because of this error" .mysqli_error
  ($conn);
}
$sql = "INSERT INTO movie_details VALUES ('Harry Potter and the Prisnor of Azkaban', 'Daniel Radcliff and Rupert Grint', 'Emma Watson', 2004, 'Chris Columbus');";
$sql .= "INSERT INTO movie_details VALUES ('3 Idiots', 'Amir Khan', 'Kareena Kapoor', 2009, 'Rajkumar Hirani');";
$sql .= "INSERT INTO movie_details VALUES ('Jab We Met', 'Shahid Kapoor', 'Kareena Kapoor', 2007, 'Imtiaz Ali');";
$sql .= "INSERT INTO movie_details VALUES ('Chronicles of Narnia', 'William Moseley', 'Anna Popplewell', 2005, 'Michael Apted');";
$sql .= "INSERT INTO movie_details VALUES ('Harry Potter and the Deathly Hollows', 'Daniel Radcliff and Rupert Grint', 'Emma Watson', 2010, 'David Yates');";


if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>

</body>
</html>