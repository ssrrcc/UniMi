<?php
	$db = open_pg_connection();
	
	$result = pg_query($db, "SET SEARCH_PATH TO imdb;");
	
	$params = Array();
	$year_value = '';
	$where = '';
	if (isset($_POST['year'])) {
		$params[] = $_POST['year'];
		$where = " WHERE year = $1";
		$year_value = 'value="' . $_POST['year'] . '"';
	}
	
	$sql = "SELECT movie.id, official_title, year, country FROM movie 
			LEFT JOIN produced ON movie.id=produced.movie" . $where;

/*
 * NB: uso di pg_query senza parametri
 * USO DI PG_QUERY DA EVITARE. SI VEDANO I PREPARED STATEMENTS 
 */
 
 	$result = pg_prepare($db, "query_movie", $sql);
 	$result = pg_execute($db, "query_movie", $params);
 	
/*
 * mostra array risultato
 */


?>

<h3 class="uk-card-title">Film disponibili in archivio</h3>
<table class="uk-table uk-table-divider">
<form class="uk-form" action="<?php echo ($_SERVER['PHP_SELF']); ?>?mod=list" method="post">
	<div class="uk-margin">     
		<label class="uk-form-label" for="movie-year">Filtra per anno di produzione</label>
		<div class="uk-form-controls">
			<input class="uk-input" id="movie-year" type="text" placeholder="inserisci l'anno" name="year" <?php echo $year_value; ?>>
		</div>
	</div>
	<button class="uk-button uk-button-primary">Cerca</button>
</form>
<thead>
	<tr>
		<th>Titolo del film</th>
		<th>Anno di produzione</th>
		<th>Paese di produzione</th>
	</tr>
</thead>
<tbody>
<?php
/*
 * NB: differenze fra array pg_fetch_assoc e pg_fetch_num
 * scorri il risultato ricevuto
 */
 
  	while ($row = pg_fetch_assoc($result)) {
		$id = $row['id'];
		$title = $row['official_title'];
		$year = $row['year'];
		$country = $row['country'];
?>
 <tr>
	<td><?php echo $title; ?></td>
	<td><?php echo $year; ?></td>
	<td><?php echo $country; ?></td>
 </tr>
 <?php
	}
 ?>
</tbody>
</table>
<?php
	close_pg_connection($db);
?>
		
