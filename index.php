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
					<label for="wine">Wine:</label>
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
						<option>Melbourne</option>
						<option>Sydney</option>
					</select>
				</li>
				<li>
					<label for="grape">Grape:</label>
					<select name="grape" id="grape">
						<option>*</option>
						<option>Red</option>
						<option>Green</option>
					</select>
				</li>
				<li>
					<label for="fromyear">Years between </label>
					<select name="fromyear" id="fromyear">
						<option>*</option>
						<option>1991</option>
						<option>1992</option>
					</select>
					<label class='smllbl' for="toyear">and</label>
					<select name="toyear" id="toyear">
						<option>*</option>
						<option>1991</option>
						<option>1992</option>
					</select>
				</li>
				<li>
					<label for="minstock">Minimum in stock:</label>
					<select name="minstock" id="minstock">
						<option>*</option>
						<option>1</option>
						<option>2</option>
					</select>
				</li>
				<li>
					<label for="minpurchase">Minimum purchase:</label>
					<select type="text" name="minpurchase" id="minpurchase">
						<option>*</option>
						<option>1</option>
						<option>2</option>
					</select>
				</li>
				<li>
					<label for="fromcost">Prices between </label>
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