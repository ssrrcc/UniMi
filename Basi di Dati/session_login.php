<?php 
	ini_set ("display_errors", "On");
	ini_set("error_reporting", E_ALL);
	include_once ('lib/functions.php'); 

	$logged = null;
	
	session_start();
	
	if (isset($_POST['usr']) && (isset($_POST['psw']))) {
		$logged = check_login($_POST['usr'], $_POST['psw']);
	}
	
	if (isset($_SESSION['user'])) {
		$logged = $_SESSION['user'];
	}
	
	if (isset($_GET['mod']) && ($_GET['mod']=='del')) {
		if (isset($_GET['user']) && ($_GET['user']==$logged)) {
			$logged = null;
			unset($_SESSION['user']);
		}
	}
	
	if (isset($logged)) {
		$_SESSION['user'] = $logged;
	}
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
    <div class="uk-container uk-margin-top uk-margin-bottom">
    <?php
	if (isset($logged)) {
		$reload_link = $_SERVER['PHP_SELF'];
	 	$logout_link = $_SERVER['PHP_SELF'] . "?mod=del&user=$logged";
	?>
	<article class="uk-article uk-text-right">
    <p class="uk-text-lead">
    	<?php echo("Ciao $logged"); ?> - <a href="<?php echo($logout_link); ?>">Logout</a> -  <a href="<?php echo($reload_link); ?>">Ricarica pagina</a>
    </p>
	</article>
	<?php
	} 
	?>
    <h1 class="uk-article-title">Login mediante session</h1>
    <?php include_once ('lib/navigation.php'); ?>

    <div class="uk-section uk-section-default">
        <?php
		if(!isset($logged)) {
		?>
		<div class="uk-width-1-3@s uk-container">
		<div class="uk-panel uk-panel-space uk-text-center">
		<form class="uk-form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <legend class="uk-legend">Inserisci le credenziali</legend>

            <div class="uk-inline uk-width-1-1">     
                <input class="uk-input" type="text" placeholder="username" name="usr">
            </div>
            <div class="uk-inline uk-width-1-1">
                <input class="uk-input" type="password" placeholder="password" name="psw">
            </div>
            
            <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large uk-margin-small-top">Esegui il login</button>
        </form>
        </div>
        </div>
		<?php
		} else {
		?>
		<div uk-grid>
			<div class="uk-width-1-3">
				<div class="uk-card uk-card-primary uk-card-body uk-padding-small uk-text-left">
					<nav>
						<ul class="uk-nav uk-nav-default">
						<?php
						//list è l'opzione di visualizzazione predefinita
						if (isset($_GET['mod']))
							$active = $_GET['mod'];
						else
							$active = 'list';
					
						$menu = get_menu_entries();
						foreach ($menu as $key => $value) {
							$active_option = '';
							if ($key == $active)
								$active_option = 'class="uk-active"';
						?>
							<li <?php echo $active_option; ?>><a href="<?php echo $_SERVER['PHP_SELF'];?>?mod=<?php echo $key; ?>"><?php echo $value; ?></a></li>
						<?php
						}
						?>
						</ul>
					</nav>
				</div>
			</div>
			<div class="uk-width-2-3">
				<div class="uk-card uk-card-default uk-card-body uk-padding-small uk-text-left">
				 <?php
					if (isset($_GET['mod'])) {
						switch ($_GET['mod']) {
						case 'insert':
							include_once('lib/movieform.php');	
							break;
						case 'stats':
							include_once('lib/moviestats.php');	
							break;
						case 'list':
						default:
							include_once('lib/movietable.php');	
							break;
						}
					} else {
						include_once('lib/movietable.php');		
					}
				?>       
				</div>
			</div>
		</div>
		<?php
		}
		?>
	</div>
	
    <hr>
    
	<pre>
		<?php print_r($_COOKIE); ?>
	</pre>
    
    </div>
    </body>
</html>
