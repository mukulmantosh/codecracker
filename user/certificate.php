<?php require 'header.php'; 


$certificate_collection= $db->selectCollection('certificates');
$certificate_collection_find= $certificate_collection->find(array("student_id"=>$profile["regdno"]));
$certificate_count= $certificate_collection_find->count();

if($certificate_count==1)
{



foreach($certificate_collection_find as $certify)
{

?>

<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="page-title"></h4>
								<p class="text-muted page-title-alt">Man gives you the award but God gives you the reward. - <i>Denzel Washington</i></p>  
								<ol class="breadcrumb"></ol>
							</div>
						</div>
					
	<center><a target="_blank" class="btn btn-primary btn-lg" href="../<?php echo $certify["certificate_url"]; ?>">DOWNLOAD CERTIFICATE <span class="glyphicon glyphicon-cloud-download"></span></a>
</center>


<?php
}
}
else
{

?>

<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="page-title"></h4>
								<ol class="breadcrumb"></ol>
							</div>
						</div>
					
	<center><h1 style="font-family: 'Audiowide', cursive;">No Certificate Available</h1></center>
<?php
}
?>






<?php require 'footer.php'; ?>