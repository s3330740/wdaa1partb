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

	function closeDB()
	{
		mysql_close($con);
	}

?>