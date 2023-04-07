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
$sql = 'select * from myb_basic_info order by Domain_hit desc';
$retval = mysqli_query($conn, $sql);
if ( ! $retval )
{
  die('Can not get data: ' . mysqli_error() ); 
  //exit
  //mysqli_error Returns the text of the error message from previous MySQL operation
}

echo "<table class='out'>
    <tr align=center>
    <th>TF ID</th>
    <th>Domain number</th>
    <th>Description</th>
    </tr>"; 
    //the tr tag defines a row, td tag defines a column
    while ( $row = mysqli_fetch_array($retval, MYSQLI_ASSOC) )
    //by using MYSQLI_ASSOC, we get associative indices
    {
      $ID = $row['ID'];
      $DN = $row['Domain_hit'];
      $DP = $row['Description'];
      echo
      "<tr>
      <td align=center><a class='smplink' href=./data_db.php?ID={$ID}>$ID</a></td>
      <td align=center>$DN</td>
      <td align=left>$DP</td>
      </tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>