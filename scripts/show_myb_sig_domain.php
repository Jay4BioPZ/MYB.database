<?php
$fname = $_GET['ID'];
//echo "$fname";
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
//$sql = "select * from myb_basic_info where ID=\"$fname\"";
//echo "$sql";
//$retval = mysqli_query($conn, $sql);
//if ( ! $retval )
//{
  //die('Can not get data: ' . mysqli_error() ); 
  //exit
  //mysqli_error Returns the text of the error message from previous MySQL operation
//}

//table header
echo 
"
    <table class='out'>
        <th colspan='8'>
            <span class='title_float_left'>Signature Domain</span>
            
            <span class='help'><a href='./help_info.php'>? help</a></span>
            <span class='title_float_right'><a href='#top'>Back to Top</a></span>  
        </th>
";

$handle = fopen("./data/sequence/hmmsearch_split/$fname.search", "r");
$hit_good = "!";
$hit_bad = "?";
$whole_content = array();
$table_matches = array();
if ($handle) {
    //echo "$handle";
    while (!feof($handle)) {
        $buffer = fgets($handle);
        $whole_content[] = $buffer;
        if((strpos($buffer, $hit_good) != FALSE) OR (strpos($buffer, $hit_bad) != FALSE))
            $table_matches[] = $buffer;
    }
    fclose($handle);
} else {
    echo "Failed to open file";
}
$ind = 0;
$num_dom = count($table_matches);
$HMM_result = array();

for ($x = 1; $x <= $num_dom; $x++) {
    $row = $table_matches[$x-1];
    $words = explode(' ', $row);
    $s = 0;
    $trim_words = array();
    while ($s <= count($words)) {
        if ($words[$s] !== $words[0]){
            //echo "get";
            $trim_words[] = $words[$s];
        }
        $s = $s + 1;
    }
    $HMM_result[] = $trim_words;
    //print_r($trim_words);
}
//insert alignment image
echo
"   <tr>
        <td colspan='8'>
            <img src='./scripts/draw_hmm_fig.php?AAL={$AAL}&num_dom={$num_dom}&HMM_result=" . urlencode(serialize($HMM_result)) . "' alt='Signature Domain' />
        </td>  
    </tr>
"
;
echo
"
        <tr class='title'>
            <td>No.</td>
            <td>Domain</td>
            <td>Score</td>
            <td>E-value</td>
            <td>Start</td>
            <td>End</td>
            <td>HMM Start</td>
            <td>HMM End</td>
	    </tr>
";

for ($x = 1; $x <= $num_dom; $x++) {
    $data = $HMM_result[$x-1];
    echo
    "
        <tr>
            <td>$data[0]</td>
            <td>PF00249</td>
            <td>$data[2]</td>
            <td>$data[4]</td>
            <td>$data[9]</td>
            <td>$data[10]</td>
            <td>$data[6]</td>
            <td>$data[7]</td>
        </tr>
    ";
    echo
    "
        <tr>
            <td colspan='8'>
                <div class='hmmalign'>
<pre>";
    $start = FALSE;
    $end = FALSE;
    $hit_start = "== domain $x";
    //echo "$hit_start";
    $hit_end = "PP";
    while ($end == FALSE) {
        if ($start == TRUE) {
            $part = $whole_content[$ind];
            $part = rtrim(str_replace(array("\n","\r"), '',substr($part, 0, strlen($part)-0)), ' ');
            echo "$part\n";
            if (strpos($part, $hit_end) == TRUE) {
                $ind = $ind + 1;
                $end = TRUE;
            } else {
                $ind = $ind + 1;
            }
        } else {
            if (strpos($whole_content[$ind], $hit_start) == TRUE) {
                $start = TRUE;
            }
            $ind = $ind + 1;
        }
    }
    echo
    "
</pre>
                </div>
            </td>
        </tr>
    ";
}
echo
"
    </table>
";

mysqli_close($conn);

//print_r($HMM_result);

?>