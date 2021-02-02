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
                try
				{

					$bdd = new PDO('mysql:host=localhost;dbname=nutrition', 'root', '');

				}

        catch(Exception $e)

        {

            die('Erreur : '.$e->getMessage());

        }
			$reponse = $bdd->query('SELECT * FROM menu');


            while($donnees = $reponse->fetch())
            {
            ?>


            <table border="1" >
                <tr>
                    <td><?php echo $donnees['date']?></td>
					<td> <?php echo $donnees['secteur']?></td>
					<td> <?php echo $donnees['type']?></td>
					<td> <?php echo $donnees['ouverture']?></td>
					<td> <?php echo $donnees['code_entree']?></td>
					<td> <?php echo $donnees['entree']?></td>
					<td> <?php echo $donnees['code_plat']?></td>
					<td> <?php echo $donnees['plat']?></td>
					<td> <?php echo $donnees['code_legumes']?></td>
					<td> <?php echo $donnees['legumes']?></td>
					<td> <?php echo $donnees['code_laitage']?></td>
					<td> <?php echo $donnees['laitage']?></td>
					<td> <?php echo $donnees['code_dessert']?></td>
					<td> <?php echo $donnees['dessert']?></td>
					<td> <?php echo $donnees['code_gouter']?></td>
					<td> <?php echo $donnees['gouter']?></td>
                </tr>


            </table>
			    <style>
					table, td, tr
					{
						table-layout: fixed;
						width: 150px;
						padding: 10px;
						border: 1px solid black;
						border-collapse: collapse;
					}
				</style>
            <?php
            }
            $reponse->closeCursor();

            ?>
			<section class="www">
			</section>

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
