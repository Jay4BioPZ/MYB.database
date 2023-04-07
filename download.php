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
    <h2>Download</h2>
    <h3>Genome and Proteome of <i>Malus x domestica</i></h3>
    <ul>
        <li><a class='smplink' href="./data/sequence/GDDH13_1-1_mrna.fasta">GDDH13 v1.1 mRNA sequences (CDS)</a></li>
        <li><a class='smplink' href="./data/sequence/GDDH13_1-1_prot.fasta">GDDH13 v1.1 protein sequences</a></li>
    </ul>
    <h3>Sequence Alignment</h3>
    <ul>
        <li><a class='smplink' href="./data/hmm/MYB_DNA_binding.sto">Pfam PF00249 alignment seed</a></li>
        <li><a class='smplink' href="./data/hmm/MYB_DNA_binding.hmm">Pfam PF00249 HMM model</a></li>
        <li><a class='smplink' href="./data/sequence/PF00249.hmmsearch">HMMER search results</a></li>
        <li><a class='smplink' href="./data/sequence/uniprot_myb_arath/uniprot-compressed_true_download_true_format_fasta_query_accession_3-2022.06.21-12.39.48.52.fasta">Uniprot PSI-BLAST query data</a></li>
        <li><a class='smplink' href="./data/sequence/PSI-blast_result">PSI-BLAST results</a></li>
    </ul>


    <?php include './foot.html';?>
</body>

</html>
