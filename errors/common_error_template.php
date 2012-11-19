<?php

	// Normalize the different variables passed

	$error_obj->title = isset($title) ? $title : '';
	$error_obj->heading = isset($heading) ? $heading : '';
	$error_obj->message = isset($message) ? strip_tags($message) : '';

	if(isset($severity) && $severity)
	{
		$error_obj->severity = $severity;
	}
	if(isset($filepath) && $filepath)
	{
		$error_obj->filepath = $filepath;
	}
	if(isset($line) && $line)
	{
		$error_obj->line =  $line;
	}


	$is_ajax = false;

	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
	{
		$http_x_requested_with = filter_var($_SERVER['HTTP_X_REQUESTED_WITH']);

		$is_ajax = $http_x_requested_with === 'XMLHttpRequest';
	}

	if($is_ajax)
	{
		header("Content-Type: application/json; charset=UTF-8", true);

		echo json_encode($error_obj);

		exit;
	}

	// Switch the error template for the (2) diffrent error outputs

	if(isset($error_obj->severity)) :

	// This is a PHP error

?><div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: <?php echo $error_obj->severity; ?></p>
<p>Message:  <?php echo $error_obj->message; ?></p>
<p>Filename: <?php echo $error_obj->filepath; ?></p>
<p>Line Number: <?php echo $error_obj->line; ?></p>

</div><?php

	else :

	// The other errors 

?><html>
<head>
<title><?php echo $error_obj->title?></title>
<style type="text/css">

body {
background-color:	#fff;
margin:				40px;
font-family:		Lucida Grande, Verdana, Sans-serif;
font-size:			12px;
color:				#000;
}

#content  {
border:				#999 1px solid;
background-color:	#fff;
padding:			20px 20px 12px 20px;
}

h1 {
font-weight:		normal;
font-size:			14px;
color:				#990000;
margin: 			0 0 4px 0;
}
</style>
</head>
<body>
	<div id="content">
		<h1><?php echo $error_obj->heading; ?></h1>
		<?php echo $error_obj->message; ?>
	</div>
</body>
</html>
<?php

	endif;