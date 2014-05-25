<!DOCTYPE html>
<html>
<head>

<?php include("inc/meta.php"); ?>

<Title>
<?php include("inc/page-index.php"); ?>
</Title>

<?php include("inc/stylesheet.php"); ?>

<?php include("inc/head.php"); ?>
</head>

<body>

<?php include("inc/background-image.php"); ?>

<div id="container">
<?php include("inc/header.php"); ?>
<?php include("inc/widemenu.php"); ?>
<?php include("inc/sidebar-left.php"); ?>


<div id="content">
<?php include("inc/plugin01.php"); ?>

<div style="width:100%;text-align:center;">

<h2>The file you are looking for doesn&#39;t exist!</h2>

<input width="150px" style="border-style:solid;border-width:1px;border-color:#666;border-radius:3px;"/>

<p class="icon-label"><a href="view-entries.php">Search for another page</a></p>

<p class="icon-label"><a onclick="goBack()" style="cursor:pointer;">Return to the previous page</a></p>

</div>







<?php include("inc/plugin02.php"); ?>
</div>

<?php include("inc/sidebar-right.php"); ?>
<?php include("inc/footer.php"); ?>
</div>

<?php include("inc/scripts.php"); ?>

<script>
 function goBack()
   {
   window.history.back()
   }
</script>

</body>
</html>