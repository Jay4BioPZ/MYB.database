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
    <h2>Help Information</h2>
    <div id='tfinfo' class='column_title'>
        Transcription Factor Information
    </div>
    <div class='column_content'>
        <div class='column_subtitle'>
            TF ID
        </div>
        <div class='column_line'>
            We chose <div class='species_name'>Malus x Domestica</div> genome GDDH13 v1.1 as our target. TF ID here is identical to gene model ID.
        </div>
        <div class='column_subtitle'>
            Taxonomy
        </div>
        <div class='column_line'>
            The taxonomic ID and lineage for each organism was collected from NCBI.
        </div>
        <div class='column_subtitle'>
            Gene Model
        </div>
        <div class='column_line'>
            The gene (data source) coding for this transcription factor.
        </div>
        <div class='column_subtitle'>
            Gene Model ID
        </div>
        <div class='column_line'>
            The ID of gene model, which was extracted from the original data source. Gene model ID can be searched in advanced search page.
        </div>
        <div class='column_subtitle'>
            Gene Model Type
        </div>
        <div class='column_line'>
            The type of gene model. MYBDB gene models came from genome.
        </div>
        <div class='column_subtitle'>
            Source
        </div>
        <div class='column_line'>
            The source where gene model was got.
        </div>
        <div class='column_subtitle'>
            Signature Domain
        </div>
        <div class='column_line'>
            The Domain used to identify and classify transcription factors.
        </div>
    </div>

    <?php include './foot.html';?>
</body>

</html>
