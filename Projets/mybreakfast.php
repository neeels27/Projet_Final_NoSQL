<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Nutrition</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="font/font/css/all.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<link rel="apple-touch-icon" sizes="180x180" href="image/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="image/favicon-16x16.png">
	<link rel="manifest" href="image/site.webmanifest">
	<link rel="mask-icon" href="image/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
      	height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
      	height: 100%;
      	margin: 0;
      	padding: 0;
      }
  </style>

</head>
<?php

	$text="";
    if(isset($_GET['action'])=='test') 
	{
					$val = $_POST['filtrage'];
					$text = "";
					switch($val)
					{
						case "departement":
							$text = "fields.departement";
							break;
						
						case "produit":
							$text = "fields.produit";
							break;
						
						case "theme":
							$text = "fields.theme";
							break;
						
						case "annee":
							$text = "fields.annee";
							break;
					}
    }
	
?>
<body>
	<header>
		<nav class="menu container">
			<div>
				<a href=#>
					<img src="image/logo_typo_breakfast_2.png"
					alt= "WELCOME TO BREAK'FAST" 
					width= "150"></a>
				</div>
			</nav>
			
		</header>
		<main>
		<?php 
			$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			$filter =[];
			$options = ['sort' => [$text => 1]]; 
			if ($text)
			{
				$query = new MongoDB\Driver\Query($filter, $options);
			}
			else
			{
				$query = new MongoDB\Driver\Query($filter);
			}
			$rows = $mongo->executeQuery('Vin.production', $query); // $mongo contains the connection object to MongoDB
			$tab[] = array();
			foreach($rows as $r)
			{
				array_push($tab, $r);
			}
			
			
		?>
			<form method="post" action="?action=test">
				<select style="margin-left:100px;" class="btn btn-secondary dropdown-toggle" name = "filtrage">
					<option value = "departement">Département</option>
					<option value = "produit">Produit</option>
					<option value = "theme">Thème</option>
					<option value = "annee">Année</option>
				</select>
				<button class="btn btn-outline-secondary" type=submit>Submit</button>
			</form><br>
			<div style='height: 450px; overflow-y:scroll'> 
				<table class="table-index">
					<thead>
						<tr>
							<td class="saad">Infos</td>
							<td class="saad">Département</td>
							<td class="saad">Produit</td>
							<td class="saad">Thème</td>
							<td class="saad">Année</td>
						</tr>
					</thead>
						<?php
							foreach($tab as $r)
							{
								$ide = $r->recordid;
								if($r)
								{
									try
									{
										?>
										<tr>
												<td class="saad">
													<form method="post" action = "test.php"><button class="btn btn-outline-secondary" type="submit">Voir</button>
													<input name="id" value="<?php echo  $ide ?>"  style="display:none"></form>
												</td>
												<td class="saad"> <?php echo $r->fields->departement;?></td>
												<td class="saad"> <?php echo $r->fields->produit;?></td>
												<td class="saad"> <?php echo $r->fields->theme;?></td>
												<td class="saad"> <?php echo $r->fields->annee;?></td>
											
										</tr><?php
										}
									catch(Exception $e)
									{
										var_dump($e);
									}
								}
							}
						?>
					
				</table>
			</div>
			


<br>

			</main>



		</body>
									</html>
