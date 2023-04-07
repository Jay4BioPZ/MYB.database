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
$LN = $AAL;
//header
echo 
"
    <table class='out'>
        <th colspan='3'>
            <span class='title_float_left'>Sequence</span>
            
            <span class='help'><a href='/myb_tfdb/help_info.php'>? help</a></span>
            <span class='title_float_right'><a href='#top'>Back to Top</a></span>
            
        </th>
";
//content
echo
"
        <tr class='title'>
            <td>
                Protein Sequence&nbsp;&nbsp;&nbsp;&nbsp;Length: $LN aa&nbsp;&nbsp;&nbsp;&nbsp;
                <a class='smplink' href='./data/sequence/GDDH13_1-1_prot_split/$fname.FASTA' target='_blank'>Download sequence</a>
            </td>
        </tr>
        <tr>
            <td>
                <div class='seq'>
                    <!--
                    <object data='./data/sequence/GDDH13_1-1_prot_split/$fname.FASTA' width=100%>
                    </object>
                    -->
";
//找一个等宽的字体，设计seq的env
$handle = fopen("./data/sequence/GDDH13_1-1_prot_split/$fname.FASTA", "r");
$aalen = 0;
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        if ($line[0] !== '>'){
            $line = str_replace(array("\n","\r"), '',$line);
            //echo strlen($line);
            $aalen = $aalen + strlen($line);
            if (strlen($line) !== 60){
                echo "$line";
            } else {
                echo "$line&nbsp;&nbsp;$aalen";
            }
            echo "<br>";
        }
    }
    fclose($handle);
} else {
    echo "Failed to open file";
}
echo
"
                </div>
            </td>
        </tr>
    </table>
";

mysqli_close($conn);

?>