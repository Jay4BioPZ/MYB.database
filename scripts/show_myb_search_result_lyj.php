<?php

//build a connection
////echo '<p>Connecting to MYB mySQL database...';
$dbhost = 'localhost';          // MySQL server
$dbuser = 'leb3a';                // MySQL user
$dbpass = 'leb2022';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if ( ! $conn ) {
    die('Can not connect database: ' . mysqli_error() . '</p>');
} else {
    //echo 'Successfully connect.</p>';
}
  
mysqli_select_db( $conn, 'myb' );
$search=$_POST['search'];
$str="select * from myb_basic_info where ID like '%".$search."%'";
$result=mysqli_query($conn,$str);

if ( ! $result )
{
    die('Can not get data: ' . mysqli_error() );
    //exit
    //mysqli_error Returns the text of the error message from previous MySQL operation
}

echo 
"
    <table class='out'>
    <tr align=center>
    <th>TF ID</th>
    <th>Domain number</th>
    <th>Description</th>
    </tr>
";

include('../search_lyj.html');

while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $ID = $row['ID'];
    $DN = $row['Domain_hit'];
    $DP = $row['Description'];
    echo
    "
        <tr>
            <td align=center>
                <a href=/myb_tfdb/myb_ind_pages/$ID.php>$ID</a>
            </td>
            <td align=center>$DN</td>
            <td align=left>$DP</td>
        </tr>";
    }
    echo "</table>";
?>

