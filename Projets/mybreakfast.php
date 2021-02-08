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
	<meta name="author" content="Suriyah Lucien Thevarajah">

	<link rel="apple-touch-icon" sizes="180x180" href="image/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="image/favicon-16x16.png">
	<link rel="manifest" href="image/site.webmanifest">
	<link rel="mask-icon" href="image/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

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
				<a href="index.html">
					<img src="image/logo typo breakfast 2.png"
					alt= "WELCOME TO BREAK'FAST" 
					width= "150"></a>
				</div>
				<ul class="menu-list">
					<li>
						<a class="text-danger" href="index.html">Home</a>
					</li>
					
					<li>
						<a class="fas fa-user-circle" href="LOGIN.html">Login</a>
					</li>
				</ul>
			</nav>
			
		</header>
		<main>
		<?php 
			$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			$filter =[];
			// new MongoDB\Driver\Command(['fields' => 1]);
			$options = ['sort' => [$text => 1]]; 
			$query = new MongoDB\Driver\Query($filter, $options);
			$rows = $mongo->executeQuery('Vin.production', $query); // $mongo contains the connection object to MongoDB
			$tab[] = array();
			foreach($rows as $r)
			{
				array_push($tab, $r);
			}
			
		?>
			<form method="post" action="?action=test">
				<select name = "filtrage">
					<option value = "departement">Département</option>
					<option value = "produit">Produit</option>
					<option value = "theme">Thème</option>
					<option value = "annee">Année</option>
				</select>
				<button type=submit>Submit</button>
			</form>
			<table>
				<thead>
					<tr>
						<td>Infos</td>
						<td>Département</td>
						<td>Produit</td>
						<td>Thème</td>
						<td>Année</td>
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
									<form method="post" action = "test.php">
										<tr>
											<td>
												<button name="id" value="<?php echo  $ide ?>">Voir</button>
												<input type="submit" style="display:none">
											</td>
											<td> <?php echo $r->fields->departement;?></td>
											<td> <?php echo $r->fields->produit;?></td>
											<td> <?php echo $r->fields->theme;?></td>
											<td> <?php echo $r->fields->annee;?></td>
										</tr>
									</form><?php
									}
								catch(Exception $e)
								{
									var_dump($e);
								}
							}
						}
					?>
				
			</table>
			


<br>

			</main>



		</body>
		<footer>
			<div class="a container">
				<div >
					<a class="slogan">
						<p class="text-light">/Nutrtion gang</p></a>			
						<p class="text-light">Suivez nous</p>
						
									</footer>
									</html>
