<?php
//build a connection
//echo '<p>Connecting to MYB mySQL database...';
$dbhost = 'localhost';          // MySQL server
$dbuser = 'leb3a';                // MySQL user
$dbpass = 'leb2022';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if ( ! $conn ) {
    die('Can not connect database: ' . mysqli_error() . '</p>');
} else {
    //echo 'Successfully connect.</p>';
}

//select a table
mysqli_select_db( $conn, 'myb' );
$sql = 'select * from group_list';
$retval = mysqli_query($conn, $sql);
if ( ! $retval )
{
  die('Can not get data: ' . mysqli_error() ); 
  //exit
  //mysqli_error Returns the text of the error message from previous MySQL operation
}

echo 
"
  <table class='out'>
    <tr>
    <th>No</th>
    <th>Name</th>
    <th>Gender</th>
    </tr>"; 
    //the tr tag defines a row, td tag defines a column
    while ( $row = mysqli_fetch_array($retval, MYSQLI_ASSOC) )
    //by using MYSQLI_ASSOC, we get associative indices
    {
      $No = $row['No'];
      $Name = $row['Name'];
      $Gender = $row['Gender'];
      echo
      "<tr align=center>
      <td>$No</td>
      <td>$Name</td>
      <td>$Gender</td>
      </tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>