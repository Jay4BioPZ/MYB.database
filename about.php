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

<h2>About</h2>
<h3>Group List</h3>
<p>
    We have a strong team behind the MYBDB project!
</p>
<?php include './scripts/show_myb_group_list.php';?>

<h3>Sequence alignment and data analysis</h3>
<nl>
    <li>Selected <i>Malus x Domestica</i> GDDH13 v1.1 Whole Genome Assembly as reference.</li>
    <li>Performed HMMER search using MYB_DNA_binding (PF00249) model. Acquired 475 alignment results.</li>
    <li>Performed PSI-BLAST using MYB_ARATH reviewed sequences. Acquired 175 alignment results.</li>
    <li>Considered 122 overlapping alignments as verified.
</nl>
<h3>Database construction and visualization</h3>
<nl>
    <li>Basic information: Constructed mySQL table and then extracted information through php-mySQL connection.</li>
    <li>Alignment results: Manupulated text files directly through php scripts.</li>
    <li>Real-time MYB pages coding: Passed variables through php url.
</nl>

<?php include './foot.html';?>

</body>
</html>
