<?php

$genres = Array('4126022' => 'Sci-Fi',
				'0816691' => 'Drama',
                '0816692' => 'Adventure',
                '1345836' => 'Thriller',
                '0770828' => 'Action');
                
$movies_ita = Array('2012' => 'La grande bellezza',
					'1978' => 'Nuovo cinema paradiso');
					
$movies_fra = Array('2010' => 'Leon',
					'2012' => 'XXX');
					
$movies_usa = Array('2000' => 'Spiderman',
					'2003' => 'Spiderman2');
					
$movies = Array();
$movies['ITA'] = $movies_ita;
$movies['FRA'] = $movies_fra;
$movies['USA'] = $movies_usa;

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include_once ('lib/header.php'); ?>
        <title>
        IMDB app
        </title>
    </head>
    <body>
    <div class="uk-container uk-margin-remove-bottom uk-margin-remove-top">
    <h1 class="uk-article-title">Passaggio di parametri GET/POST - esempi con IMDB</h1>
    <?php include_once ('lib/navigation.php'); ?>

    <div class="uk-section uk-section-default">
    <div class="uk-container">
        <form class="uk-form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <legend class="uk-legend">Passaggio di parametri con il metodo POST</legend>

            <div class="uk-margin">
                <label class="uk-form-label" for="movie-title">Titolo</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="movie-title" type="text" placeholder="inserisci il titolo" name="movie[title]">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="movie-year">Anno</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="movie-year" type="text" placeholder="inserisci l'anno di produzione" name="movie[year]">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="movie-length">Durata</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="movie-length" step="1" type="number" placeholder=" durata in minuti" name="movie[length]">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="movie-release">Data di rilascio in Italia</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="movie-release" type="date" placeholder="inserisci la data" name="movie[release]">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="movie-genre">Genere</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="movie-genre" name="movie['genre']">
                    	<option value="" selected="selected">Seleziona una voce</option>
                    	<?php
							foreach ($genres as $k => $v) {
						?>
							<option value="<?php echo $k; ?>"><?php echo $v ?></option>
						<?php
							}
						?>
                    </select>
                </div>
            </div>
            <button class="uk-button uk-button-default">Invia</button>
        </form>
    </div>
    </div>

    <?php
    if(isset($_POST['movie'])) {
        $movie = $_POST['movie'];
        
        $title = 'Non definito';
		if(!empty($movie['title'])) {
			$title = $movie['title'];
		}
		
		$year = 'Non definito';
		if(!empty($movie['year'])) {
			$year = $movie['year'];
		}
		
		$length = 'Non definito';
		if(!empty($movie['length'])) {
			$length = $movie['length'] . ' minuti';
		}
		
		$release = 'Non definito';
		if(!empty($movie['release'])) {
			$form_date = strtotime($movie['release']);
			$release = date('D d M Y', $form_date);
		}
		
		$genre = 'Non definito';
		if(!empty($movie['genre'])) {
			$genre = $genres[$movie['genre']];
		}
	
    ?>
    <hr>
    <div class="uk-card uk-card-primary uk-card-body uk-margin-bottom">
        <h3 class="uk-card-title">Sto per inserire i seguenti dati:</h3>
        <div uk-grid>
            <div class="uk-width-1-3">
                <span class="uk-text-bold">Titolo (anno): </span> 
                <?php echo $title . " (" . $year . ")"; ?>
            </div>
            
            <div class="uk-width-1-3">
                <span class="uk-text-bold">Durata: </span>
                <?php echo $length; ?><br>
                <span class="uk-text-bold">Genere: </span>
                <?php echo $genre; ?>
            </div>  

            <div class="uk-width-1-3">
                <span class="uk-text-bold">Data di rilascio in Italia: </span>
                <?php echo $release; ?>
            </div>       
        </div>
    </div>
    <?php
	}
    ?>

    <div class="uk-card uk-card-secondary uk-card-body">
		<?php
		if (isset($_GET['country'])) {
			$movie_to_show = $movies[$_GET['country']];
			if (!empty($movie_to_show)) {
		?>
		<table class="uk-table uk-table-divider">
		<thead>
			<tr>
				<td>Titolo del film</td>
				<td>Anno di produzione</td>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($movie_to_show as $k => $v) {
			?>
			<tr>
				<td><?php echo $v; ?></td>
				<td><?php echo $k; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
		</table>
		<?php
		}
		}
		?>
        <h3 class="uk-card-title">Seleziona il paese di interesse (passaggio di parametri con il metodo GET)</h3>
        Vedi i film prodotti in <a href="<?php echo $_SERVER['PHP_SELF']; ?>?country=ITA">Italia</a>.<br>
        Vedi i film prodotti in <a href="<?php echo $_SERVER['PHP_SELF']; ?>?country=FRA">Francia</a>.<br> 
        Vedi i film prodotti in <a href="<?php echo $_SERVER['PHP_SELF']; ?>?country=USA">Stati Uniti</a>.<br>
    </div>
	</div>
    </body>
</html>
