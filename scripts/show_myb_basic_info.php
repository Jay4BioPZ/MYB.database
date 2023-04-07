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
$sql = "select * from myb_basic_info where ID=\"$fname\"";
//echo "$sql";
$retval = mysqli_query($conn, $sql);
if ( ! $retval )
{
  die('Can not get data: ' . mysqli_error() ); 
  //exit
  //mysqli_error Returns the text of the error message from previous MySQL operation
}

//define variables
$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
$ID = $row['ID'];
$DN = $row['Domain_hit'];
$OG = $row['Organism'];
$TX = $row['Taxonomic_ID'];
$FM = $row['Family'];
$DP = $row['Description'];

//table header
echo 
"
    <table class='out'>
        <th colspan='2'>
            <span class='title_float_left'>Basic Information</span>
            <span class='help'><a href='./help_info.php'>? help</a></span>
            <span class='title_float_right'><a href='#top'>Back to Top</a></span>
        </th>
";
//see whether PSI-BLAST verified
$handle1 = fopen("./data/myb_list/match_list_find_proc", "r");
$verified = FALSE;
if ($handle1) {
    while (!feof($handle1)) {
        $buffer = substr_replace(fgets($handle1) ,"", -1);
        //echo "$buffer $fname ";
        if (strcmp($fname, $buffer) == 0){
            $verified = TRUE;
            break;
        }
    }
    fclose($handle1);
} else {
    echo "Failed to open file";
}
//outputing data
echo
"
        <tr>
            <td style='width:20%'>TF ID</td>
            <td style='width:80%'>$fname</td>
        </tr>
        <tr>
            <td style='width:20%'>PSI-BLAST</td>
            <td style='width:80%' class = 'verified'>
";
if ($verified == TRUE) {
    echo "Verified";
} else {
    echo "Unverified";
}
echo
"
            </td>
        </tr>
        <tr>
            <td style='width: 20%'>Organism</td>
            <td style='width: 80%'>
                <div class='species_name'>
                    $OG
                </div>
            </td>
        </tr>
        <tr>
            <td style='width: 20%'>Taxonomic ID</td>
            <td style='width: 80%'>
                <div>
                    $TX
                </div>
            </td>
        </tr>
        <tr>
            <td style='width: 20%'>Family</td>
            <td sytle='width: 80%'>
                $FM
            </td>
        </tr>
        <tr>
            <td style='width: 20%'>Protein Properties</td>
            <td style='width: 80%'>
";
//length, weight, PI
$handle2 = fopen("./data/sequence/prot_stat/$fname.PEPSTATS", "r");
$whole_content = array();
$ind = 0;
if ($handle2) {
    //echo "$handle2";
    while (!feof($handle2)) {
        $buffer = fgets($handle2);
        if ($ind >= 2) {
            $whole_content[] = $buffer;
        }
        $ind = $ind + 1;
        if ($ind == 5) {
            break;
        }
    }
    fclose($handle2);
} else {
    echo "Failed to open file";
}
//print_r($whole_content);
$A1 = explode(' ', $whole_content[0]);
$A2 = explode(' ', $whole_content[2]);
$s = 0;
$trim_words = array();
    while ($s <= count($A1)) {
        if (($A1[$s] !== $A1[9]) AND ($A1[$s] !== $A1[2])) {
            $trim_words[] = $A1[$s];
        }
        $s = $s + 1;
    }
global $AAL;
//print_r($trim_words);
$AAL = $trim_words[4];
$AAM = $trim_words[2];
$AAP = $A2[3];
echo
"
                Length: $AAL aa&nbsp;&nbsp;&nbsp;&nbsp;MW: $AAM Da&nbsp;&nbsp;&nbsp;&nbsp;PI: $AAP
            </td>
        </tr>
        <tr>
            <td style='width: 20%'>Description</td>
            <td sytle='width: 80%'>
                $DP
            </td>
        </tr>
        <tr>
            <td style='width: 20%'>Gene Model</td>
            <td sytle='width: 80%; padding: 0px;'>
            <table class='tf_anno' width='100%'>
                <tr class='title'>
                    <td>Gene Model ID</td>
                    <td>Type</td>
                    <td>Source</td>
                    <td>Coding Sequence</td>
                </tr>
                <tr>
                    <td>$fname</td>
                    <td>genome</td>
                    <td>
                        <a class='smplink' href='https://www.rosaceae.org/analysis/242'>
                            GDR
                        </a>
                    </td>
                    <td>
                        <a class='smplink' href='./data/sequence/GDDH13_1-1_mrna_split/$fname.FASTA' target='_blank'>
                            View CDS
                        </a>
                    </td>
                </tr>
            </table>
        </tr>
    </table>
";

mysqli_close($conn);

?>