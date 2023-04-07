<?php
$fname = $_GET['ID'];
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
$sql = "select * from myb_go where ID=\"$fname\"";
//echo "$sql";
//$retval = mysqli_query($conn, $sql);
//if ( ! $retval )
//{
//  die('Can not get data: ' . mysqli_error() ); 
  //exit
  //mysqli_error Returns the text of the error message from previous MySQL operation
//}

//$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
$TM = "NULL"; //$row['Term'];
$CT = "NULL"; //$row['Category'];
$DP = "NULL"; //$row['Description'];

//header
echo 
"
    <table class='out'>
        <th colspan='3'>
            <span class='title_float_left'>Gene Ontology</span>
            
            <span class='help'><a href='/myb_tfdb/help_info.php'>? help</a></span>
            <span class='title_float_right'><a href='#top'>Back to Top</a></span>
            
        </th>
";
//content
echo
"
        <tr class='title'>
            <td>GO Term</td>
            <td>GO Category</td>
            <td>GO Description</td>
        </tr>
        <tr>
            <td>$TM</td>
            <td>$CT</td>
            <td>$DP</td>
        </tr>
    </table>
";

mysqli_close($conn);

?>