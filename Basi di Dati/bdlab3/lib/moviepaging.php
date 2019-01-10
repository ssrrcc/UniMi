<?php

	//numero predefinito di righe per pagina 
	$per_page = 10;	
	$offset = 0;
	$current_page = 0;

	$db = open_pg_connection();
	
	$result = pg_query($db, 'SET SEARCH_PATH TO imdb');
	
	$sql = "SELECT movie.id, official_title, year, country FROM movie LEFT JOIN produced ON movie.id=produced.movie ORDER BY year DESC";
	$sql .= " OFFSET $1 LIMIT $2";

 	$result = pg_prepare($db, "the_query", $sql);
	$result = pg_execute($db, "the_query", array($offset, $per_page));
 
	$movies = array();
	
	while($row = pg_fetch_assoc($result)){
	    $id = $row['id'];
	    // raggruppo le righe che si riferiscono allo stesso movie
	    if(in_array($id, array_keys($movies))){
	        $movies[$id]['country'][] = $row['country'];
	    }else{
	        $row['country'] = array($row['country']);
	        $movies[$id] = $row;
	    }
	}

/*
 * mostra array risultato
 */
//pre($data);

?>

<h3 class="uk-card-title">Film disponibili in archivio</h3>
<table class="uk-table uk-table-divider">
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
	foreach($movies as $id=>$values){
		$title = $values['official_title'];
		$year = $values['year'];
		$countries = $values['country'];
?>
    	<tr>
            <td><?php echo $title; ?></td>
            <td><?php echo $year; ?></td>
            <td><?php echo implode(", ", $countries); ?></td>
        </tr>
<?php
	}
?>
</tbody>
</table>
<?php	
	close_pg_connection($db);
?>
		