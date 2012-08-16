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
		<form class='searchform' action='search.php' method="get">
			<ol>
				<li>
					<label for="wine">Wine Variety:</label>
					<input type="text" name="wine" id="wine" value='*' />
				</li>
				<li>
					<label for="winery">Winery:</label>
					<input type="text" name="winery" id="winery" value='*' />
				</li>
				<li>
					<label for="region">Region:</label>
					<select name="region" id="region">
						<option>*</option>
						<?php
							foreach (getRegions() as $region)
								echo '<option>' . $region . '</option>';
						?>
					</select>
				</li>
				<li>
					<label for="grape">Grape:</label>
					<select name="grape" id="grape">
						<option>*</option>
						<?php
							foreach (getGrapeVarieties() as $variety)
								echo '<option>' . $variety . '</option>';
						?>
					</select>
				</li>
				<li>
					<label for="fromyear">Between year </label>
					<select name="fromyear" id="fromyear">
						<option>*</option>
						<?php
							foreach (getYears() as $year)
								echo '<option>' . $year . '</option>';
						?>
					</select>
					<label class='smllbl' for="toyear">and</label>
					<select name="toyear" id="toyear">
						<option>*</option>
						<?php
							foreach (getYears() as $year)
								echo '<option>' . $year . '</option>';
						?>
					</select>
				</li>
				<li>
					<label for="minstock">Minimum in stock:</label>
					<input type="text" name="minstock" id="minstock" value='*' />
				</li>
				<li>
					<label for="minpurchase">Minimum purchase:</label>
					<input type="text" name="minpurchase" id="minpurchase" value='*' />
				</li>
				<li>
					<label for="fromcost">Price between </label>
					<input type="text" name="fromcost" id="fromcost" value='*' />
					<label class='smllbl' for="tocost">and</label>
					<input type="text" name="tocost" id="tocost" value='*' />
				</li>
				<li>
					<input class='btnsubmit' type="submit" name="submit" value="Submit" />
				</li>
			</ol>
		</form>
	</body>
</html>