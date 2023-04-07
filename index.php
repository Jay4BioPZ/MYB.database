<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
    <title>LEB22 Project MYBDB</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yantramanav&display=swap" rel="stylesheet">
</head>

<body> 
    <?php include './head.html';?>

    <h2>MYB Family Introduction</h2>
    <p>
        MYB factors represent a family of proteins that include the conserved MYB DNA-binding domain. 
        The first MYB gene identified was the "oncogene" v-Myb derived from the avian myeloblastosis virus. 
        Evidence obtained from sequence comparisons indicates that v-Myb may have originated from a vertebrate gene, 
        which mutated once it became part of the virus. 
        Many vertebrates contain three genes related to v-Myb c-Myb, A-Myb and B-Myb and other similar genes have been identified in insects, 
        plants, fungi and slime moulds. 
        The encoded proteins are crucial to the control of proliferation and differentiation in a number of cell types, 
        and share the conserved MYB DNA-binding domain. 
        This domain generally comprises up to three imperfect repeats, each forming a helix-turn-helix structure of about 53 amino acids. 
        Three regularly spaced tryptophan residues, 
        which form a tryptophan cluster in the three-dimensional helix-turn-helix structure, 
        are characteristic of a MYB repeat. 
        The three repeats in c-Myb are referred to as R1, R2 and R3; 
        and repeats from other MYB proteins are categorised according to their similarity to either R1, R2 or R3. 
        MYB proteins can be classified into three subfamilies depending on the number of adjacent repeats in the MYB domain (one, two or three). 
	We refer to MYB-like proteins with one repeat as "MYB1R factors", with two as "R2R3-type MYB" factors, and with three repeats as "MYB3R" factors.<br>
 In contrast to animals,
	plants contain a MYB-protein subfamily that is characterised by the R2R3-type MYB domain,which is a unique MYB transcription factor in plants and closely related to anthocyanin synthesis and regulation.<br>
<?php echo "<img src='./images/transfactor.png'/>";?>
    </p>
   <h2>Enlightenment of project</h2>
<p>
Most apples seen was red peel and white flesh.As shown in the figure below,the apple with red flesh is due to the activation trasncription of MYB10 transcription factor,contributing to accumulaation of anthocyanins and the red flesh phenotype of apple,which relate to Jiang’s research subject:Through using the genome-wide comparative analysis of cultivars of apples, acquire the developmental correlation among anthocyanin pigment accumulation, aroma, early maturity and storage tolerance of apple from the molecular level.Base on the two new germplasm selected and bred by Jiang’s supervisor at present and both of which has crisp and bright red flesh, extremely early maturity but one has extra resistance of storage,the transcriptome and metabolome of the two cultivars have been sequenced and genome sequencing is in progress.The transcription factor families involved include MYB, bHLH and WRKY, which interact with each other and regulate anthocyanin synthesis in apple, and ERF transcription factor family that related to ethylene synthesis and transcription in maturation stage.<br>
<?php echo "<img src='./images/malusexample.png'/>";?>
In the process of using PlantTFDB, Jiang found errors in the annotation information of some apple transcription factors and incorrect family classification. It may be that the fragment sequenced with this gene is missing due to variable exon clipping, which leads to the lack of structural domain in scanning and thus is wrongly classified. For example, the MYB10 transcription factor mentioned above, the annotation information in the library belongs to the MyB-related family with only one DNA-binding domain. Blast with the MYB10 sequence in the UniProt library found that a sequence was missing.In Plant TFDB, the genome data of apple's first edition sequenced and assembled in 2012 was used. Currently, the most comprehensive annotated information and most commonly used version in Apple is GDDH13, which was sequenced and assembled by double haploid samples of Golden Crown Apple in 2017.So we use this genome data to build a Malus x domestica myb and myb-related database.<br>
<?php echo "<img src='./images/Lossexample.png'/>";?>
</p>
<h2>Reference</h2>
    <p>
        Stracke R, Werber M, Weisshaar B.
        The R2R3-MYB gene family in Arabidopsis thaliana.
        <i>Curr Opin Plant Biol</i>. 2001 Oct;4(5):447-56. Review.
        PMID: 11597504
    </p>


    <?php include './foot.html';?>
</body>

</html>
