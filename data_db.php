<html>
<head>
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
    <title>LEB22 Project MYBDB</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yantramanav&display=swap" rel="stylesheet">
</head>

<body> 
<?php include "./head.html";?>

<!-- Basic Information Start -->
<table id='basic_info_table' class='tf_info'>
    <?php
        //$fname = basename(__FILE__, '.php');
    ?>
    <?php 
        $ID = $_GET['ID'];
        echo "<h2>$ID</h2>";
        include './scripts/show_myb_basic_info.php';
        include './scripts/show_myb_sig_domain.php';
        include './scripts/show_myb_prot_seq.php';
    ?>
</table>

<!-- Basic Information End -->

<?php include "./foot.html";?>

</body>
</html>
