<?php
	$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$message = $_POST['id'];
	$filter =['recordid' => $message];
	$query = new MongoDB\Driver\Query($filter);
	$rows = $mongo->executeQuery('Vin.production', $query);
	foreach ($rows as $document)
	{
		var_dump($document);
	}

?>