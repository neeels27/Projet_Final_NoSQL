<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<?php
		$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$message = $_POST['id'];
		$filter =['recordid' => $message];
		$query = new MongoDB\Driver\Query($filter);
		$rows = $mongo->executeQuery('Vin.production', $query);
		$tab[] = array();
		foreach ($rows as $doc)
		{
			foreach($doc as $val)
			{
				array_push($tab,$val);
			}
		}
		switch($tab[4]->produit)
		{
			case ($tab[4]->produit == "Ensemble des vignes") or ($tab[4]->produit == "Vignes à raisin de table") :
				echo "<table class='table-test'>";
				echo "<tr><td>Département</td><td>Produit</td><td>Surface Totale HA</td><td>Rendement 100 KG HA</td><td>Thème</td><td>Production de raisin 100 KG</td><td>Quantitée récoltée pour le fruit de 100 KG</td><td>Surface en Production</td><td>Année</td></tr>";
				echo "<tr>";
				echo "<td>";
				echo $tab[4]->departement;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->produit;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->surface_totale_ha;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->rendement_100_kg_ha;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->theme;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_raisin_100_kg;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->quantite_recoltee_pour_le_fruit_100_kg;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->annee;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->surface_en_production_ha;
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				break;
		
		
			case ($tab[4]->produit == "Récolte agronomique de vins aptes à la production d'eaux de vie AOP") or ($tab[4]->produit == "Récolte pour AOP de vins aptes à la production d'eaux de vie (Cognac, Armagnac)")
			or ($tab[4]->produit == "TOTAL VINS") or ($tab[4]->produit == "TOTAL VINS (JO-CVI)")
			or ($tab[4]->produit == "dont récolte non classée IGP") or ($tab[4]->produit == "dont récolte pour AOP de vins aptes à la production d'eaux de vie (JO-CVI)")
			or ($tab[4]->produit == "dont récolte pour vins sans IG avec mention de cépage"):
				echo "<table class='table-test'>";
				echo "<tr><td>Département</td><td>Produit</td><td>Production de Vins H1</td><td>Surface en Production HA</td><td>Production de vins rouges et roses H1</td><td>Production de vins blancs H1</td><td>Thème</td><td>Année</td></tr>";
				echo "<tr>";
				echo "<td>";
				echo $tab[4]->departement;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->produit;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_vins_hl;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->surface_en_production_ha;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_vins_rouges_et_roses_hl;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_vins_blancs_hl;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->theme;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->annee;
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				break;

			case ($tab[4]->produit ==  "Récolte agronomique de vins doux naturels en AOP") or ($tab[4]->produit ==  "Récolte agronomique en AOP hors vins doux naturels, hors vins pour eaux de vie") 
			or ($tab[4]->produit ==  "Récolte agronomique en IGP") or ($tab[4]->produit ==  "Récolte agronomique en AOP hors vins pour eaux de vie") 
			or ($tab[4]->produit == "Récolte de vins non classée en IG") or ($tab[4]->produit == "Récolte de vins sans IG") 
			or ($tab[4]->produit == "Récolte pour AOP de vins doux naturels") or ($tab[4]->produit == "Récolte pour AOP hors vins doux naturels, hors vins pour eaux de vie")
			or ($tab[4]->produit == "Récolte pour IGP") or ($tab[4]->produit == "Récolte pour vins sans IG") or ($tab[4]->produit == "dont récolte pour AOP de vins doux naturels (JO-CVI)")
			or ($tab[4]->produit == "dont récolte pour AOP hors vins doux naturels, hors vins pour eaux de vie (JO-CVI)") or ($tab[4]->produit == "dont récolte pour AOP hors vins pour eaux de vie (JO-CVI)")
			or ($tab[4]->produit == "dont récolte pour IGP (JO-CVI)"):
				echo "<table class='table-test'>";
				echo "<tr><td>Département</td><td>Produit</td><td>Production de Vins H1</td><td>Surface en Production HA</td><td>Production de vins rouges et roses H1</td><td>Production de vins blancs H1</td><td>Thème</td><td>Rendement H1 HA</td><td>Année</td></tr>";
				echo "<tr>";
				echo "<td>";
				echo $tab[4]->departement;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->produit;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_vins_hl;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->surface_en_production_ha;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_vins_rouges_et_roses_hl;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_vins_blancs_hl;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->theme;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->rendement_hl_ha;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->annee;
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				break;
				
				case ($tab[4]->produit == "Récolte en AOP/IGP non classée non commercialisée en vin") or ($tab[4]->produit == "dont récolte sans IG sans mention de cépage")
				or ($tab[4]->produit == "Récolte totale de vins sans IG (JO-CVI)"):
				echo "<table class='table-test'>";
				echo "<tr><td>Département</td><td>Produit</td><td>Production de Vins H1</td><td>Production de vins rouges et roses H1</td><td>Production de vins blancs H1</td><td>Thème</td><td>Année</td></tr>";
				echo "<tr>";
				echo "<td>";
				echo $tab[4]->departement;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->produit;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_vins_hl;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_vins_rouges_et_roses_hl;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->production_de_vins_blancs_hl;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->theme;
				echo "</td>";
				echo "<td>";
				echo $tab[4]->annee;
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				break;


		}

	?>
</body>
