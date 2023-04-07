<html>
<head>
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
    <title>LEB22 Project MYBDB</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yantramanav&display=swap" rel="stylesheet">
</head>
</head>

<body> 
    <?php include './head.html';?>
    <?php 
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
        $q = isset($_GET['q'])? htmlspecialchars($_GET['q']) : '';
        $id1 = isset($_GET['id1'])? htmlspecialchars($_GET['id1']) : '';
        if($q) {
            $sql = "select * from myb_basic_info where $q like '%".$id1."%'";
            //echo "$sql";
            $retval = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($retval);
            if ( (! $retval) OR ($rowcount == 0) )
            {
                //echo "<h2>Search Result</h2><p>Nothing is found</p>";
            }
            echo
            "
                <h2>Search Result</h2>
            ";
    ?>
    <form action="" method="get"> 
        <select name="q">
            <option value="">Search by</option>
            <option value="ID">ID</option>
            <option value="Domain_hit">Domain number</option>
            <option value="Description">Description</option>
        </select>
        <input id="id1" name="id1">
        <input type="submit" value="Search" class="search_button">
    </form>
    <?php
            echo
            "
                <p>$rowcount results in total.</p>
                <table class='out'>
                <tr align=center>
                    <th>TF ID</th>
                    <th>Domain number</th>
                    <th>Description</th>
                </tr>
            ";
            while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                $ID = $row['ID'];
                $DN = $row['Domain_hit'];
                $DP = $row['Description'];
                echo
                "
                    <tr>
                        <td align=center><a class='smplink' href=./data_db.php?ID={$ID}>$ID</a></td>
                        <td align=center>$DN</td>
                        <td align=left>$DP</td>
                    </tr>
                ";
            }
            echo
            "
                </table>
            ";
            
        } else {
    ?>
    <h2>Search</h2>
    <form action="" method="get"> 
        <select name="q">
            <option value="">Search by</option>
            <option value="ID">ID</option>
            <option value="Domain_hit">Domain number</option>
            <option value="Description">Description</option>
        </select>
        <input id="id1" name="id1">
        <input type="submit" value="Search" class="search_button">
    </form>
    <?php
    }
    ?>
    <?php include './foot.html';?>
</body>

</html>
