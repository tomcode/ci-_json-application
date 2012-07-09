<?php

	$error_obj->title = isset($title) ? $title : '';
	$error_obj->heading = isset($heading) ? $heading : '';
	$error_obj->message = isset($message) ? strip_tags($message) : '';

	if(isset($severity) && $severity) $error_obj->severity = $severity;
	if(isset($filepath) && $filepath) $error_obj->filepath = $filepath;
	if(isset($line) && $line) $error_obj->line =  $line;


	header("Content-Type: application/json; charset=UTF-8", true);

	echo json_encode($error_obj);