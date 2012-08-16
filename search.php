<?php
	require_once('config.php');
	require_once('db.php');
?>

<html>
	<head>
		<title>S3330740 WDA Assignment 1</title>
		<link type="text/css" rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class='header'>
			<div class='title'>
				Winestore Assignment - S3330740
			</div>
		</div>
		<table class='wineresults'>
			<tr>
				<th>Wine Name</th>
				<th>Grape Variety</th>
				<th>Year</th>
				<th>Winery</th>
				<th>Region</th>
				<th>Cost</th>
				<th>Stock</th>
				<th>Total Sold</th>
				<th>Total Revenue</th>
			</tr>
			<?php
				$rows = search(
						$_GET['wine'],
						$_GET['winery'],
						$_GET['region'],
						$_GET['grape'],
						$_GET['fromyear'],
						$_GET['toyear'],
						$_GET['minstock'],
						$_GET['minpurchase'],
						$_GET['fromcost'],
						$_GET['tocost']
					);
				foreach ($rows as $row)
				{
					echo '<tr>';
					echo '<td>' . $row['wine_name'] . '</td>';
					echo '<td>' . $row['variety'] . '</td>';
					echo '<td>' . $row['year'] . '</td>';
					echo '<td>' . $row['winery_name'] . '</td>';
					echo '<td>' . $row['region_name'] . '</td>';
					echo '<td>$' . $row['cost'] . '</td>';
					echo '<td>' . $row['on_hand'] . '</td>';
					echo '<td>' . $row['qty_sold'] . '</td>';
					echo '<td>$' . $row['revenue'] . '</td>';
					echo '</tr>';
				}
			?>
		</table>
	</body>
</html>