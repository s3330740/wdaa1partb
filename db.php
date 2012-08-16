<?php

	define('DB_HOST', 'yallara.cs.rmit.edu.au:51725');
	define('DB_USER', 'root');
	define('DB_PASS', 'pass');

	define('DB_NAME', 'winestore');

	$con = @mysql_connect(DB_HOST, DB_USER, DB_PASS);

	if (!$con)
	{
		die('Could not connect to MySQL: ' . mysql_error());
	}

	mysql_select_db(DB_NAME);

	function getRegions()
	{
		$sql = "SELECT region_name FROM region;";
		$regions = array();
		$res = mysql_query($sql);

		while ($row = mysql_fetch_array($res))
			array_push($regions, $row["region_name"]);

		return $regions;
	}

	function getGrapeVarieties()
	{
		$sql = "SELECT variety FROM grape_variety;";
		$varieties = array();
		$res = mysql_query($sql);

		while ($row = mysql_fetch_array($res))
			array_push($varieties, $row["variety"]);

		return $varieties;
	}

	function getYears()
	{
		$sql = "SELECT distinct year FROM wine ORDER BY year;";
		$years = array();
		$res = mysql_query($sql);

		while ($row = mysql_fetch_array($res))
			array_push($years, $row["year"]);

		return $years;
	}

	function search($wine, $winery, $region, $grape, $minYear, $maxYear, $minStock, $minOrder, $minPrice, $maxPrice)
	{
		$sql = "SELECT wine_name, variety, year, winery_name, region_name, SUM(cost) AS cost, SUM(on_hand) AS on_hand, SUM(qty) AS qty_sold, SUM(qty * price) AS revenue";
		$sql .= " FROM wine, wine_variety, grape_variety, winery, region, inventory, items";
		$sql .= " WHERE";
		$sql .= " wine.wine_id = wine_variety.wine_id AND ";
		$sql .= " wine_variety.variety_id = grape_variety.variety_id AND ";
		$sql .= " wine.winery_id = winery.winery_id AND ";
		$sql .= " winery.region_id = region.region_id AND";
		$sql .= " wine.wine_id = inventory.wine_id AND";
		$sql .= " wine.wine_id = items.wine_id ";

		$where = array();

		if (isset($wine) && $wine != '*')
			array_push($where, "wine.wine_name LIKE '%" . $wine . "%'");

		if (isset($winery) && $winery != '*')
			array_push($where, "winery.winery_name LIKE '%" . $winery . "%'");

		if (isset($region) && $region != '*')
			array_push($where, "region.region_name LIKE '%" . $region . "%'");

		if (isset($grape) && $grape != '*')
			array_push($where, "grape_variety.variety LIKE '%" . $grape . "%'");

		if (isset($minYear) && $minYear != '*')
			array_push($where, "wine.year >= " . $minYear);

		if (isset($maxYear) && $maxYear != '*')
			array_push($where, "wine.year <= " . $maxYear);

		if (isset($minStock) && $minStock != '*')
			array_push($where, "inventory.on_hand >= " . $minStock);

		/* TODO:
		if (isset($minOrder) && $minOrder != '*')
			array_push($where, "inventory.on_hand >= " . $minOrder);
		*/

		if (isset($maxPrice) && $maxPrice != '*')
			array_push($where, "items.price <= " . $maxPrice);

		if (isset($minPrice) && $minPrice != '*')
			array_push($where, "items.price >= " . $minPrice);

		/* add all where clauses */
		for ($i = 0; $i < count($where); $i++)
			$sql .= " AND " . $where[$i];

		$sql .= " GROUP BY wine.wine_id";
		$sql .= " ORDER BY wine.year, wine.wine_name DESC;";

		echo '<p>' . $sql . '</p>';

		$results = array();
		$res = mysql_query($sql);

		if (!$res)
			die('Invalid query: ' . mysql_error());

		while ($row = mysql_fetch_array($res))
			array_push($results, $row);

		return $results;
	}

	function closeDB()
	{
		mysql_close($con);
	}

?>