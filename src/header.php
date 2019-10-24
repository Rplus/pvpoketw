<?php require_once 'modules/config.php';
$SITE_VERSION = '1.12.4.1';

// This prevents caching on local testing
if (strpos($WEB_ROOT, 'src') !== false) {
    $SITE_VERSION = rand(1,1000) . '.' . rand(1,1000) . '.' . rand(1,1000);
}

// Initialize settings object
if(isset($_COOKIE['settings'])){
	$_SETTINGS = json_decode($_COOKIE['settings']);
} else{
	$_SETTINGS = (object) [
		'defaultIVs' => "gamemaster",
		'animateTimeline' => 1,
		'theme' => 'default'
	];
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
if(! isset($META_TITLE)){
	$META_TITLE = 'PvPokeTW | 為 Pokemon GO PVP 而設的開源平台';
} else{
	$META_TITLE = $META_TITLE . ' | PvPokeTW';
}

if(! isset($META_DESCRIPTION)){
	$META_DESCRIPTION = '想在 Pokemon GO PVP 戰鬥中無往不利嗎? 善用這個網站，組建並精進你的隊伍，不用二十年你也可以成為冠軍！';
}

if(! isset($OG_IMAGE)){
	$OG_IMAGE = 'https://pvpoke.com/img/og.jpg';
}
?>

<title><?php echo $META_TITLE; ?></title>
<meta name="description" content="<?php echo $META_DESCRIPTION; ?>" />

<?php if(isset($CANONICAL)): ?>
	<link rel="canonical" href="<?php echo $CANONICAL; ?>" /><!--Prevents Google from indexing hundreds of different versions of the same page-->
<?php endif; ?>

<!--OG tags for social-->
<meta property="og:title" content="<?php echo $META_TITLE; ?>" />
<meta property="og:description" content="<?php echo $META_DESCRIPTION; ?>" />
<meta property="og:image" content="<?php echo $OG_IMAGE; ?>" />

<meta name="apple-mobile-web-app-capable">
<meta name="mobile-web-app-capable">
<link rel="manifest" href="<?php echo $WEB_ROOT; ?>data/manifest.json?v=2">

<link rel="icon" href="<?php echo $WEB_ROOT; ?>img/favicon.png">
<link rel="stylesheet" type="text/css" href="<?php echo $WEB_ROOT; ?>css/style.css?v=58">

<?php if(strpos($META_TITLE, 'Train') !== false): ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $WEB_ROOT; ?>css/train.css?v=5">
<?php endif; ?>

<?php if((isset($_SETTINGS->theme))&&($_SETTINGS->theme != "default")): ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $WEB_ROOT; ?>css/themes/<?php echo $_SETTINGS->theme; ?>.css?v=4">
<?php endif; ?>

<script src="<?php echo $WEB_ROOT; ?>js/libs/jquery-3.3.1.min.js"></script>

<?php require_once('modules/analytics.php'); ?>

<script>
	// Host for link reference

	var host = "<?php echo $WEB_HOST; ?>";
	var webRoot = "<?php echo $WEB_ROOT; ?>";

	<?php if(isset($_COOKIE['settings'])) : ?>
		var settings = {
			defaultIVs: "<?php echo htmlspecialchars($_SETTINGS->defaultIVs); ?>",
			animateTimeline: <?php echo htmlspecialchars($_SETTINGS->animateTimeline); ?>
		};
	<?php else: ?>

		var settings = {
			defaultIVs: "gamemaster",
			animateTimeline: 1
		};

	<?php endif; ?>


	// If $_GET request exists, output as JSON into Javascript

	<?php
	foreach($_GET as &$param){
		$param = htmlspecialchars($param);
	}


	if($_GET){
		echo 'var get = ' . json_encode($_GET) . ';';
	} else{
		echo 'var get = false;';
	}
	?>
</script>

</head>

<body>
	<header>
		<div class="header-wrap">
			<div class="hamburger">
				<!--Because I'm too lazy to make a graphic-->
				<div class="meat"></div>
				<div class="meat"></div>
				<div class="meat"></div>
			</div>
			<h1 class="title"><a href="/">回首頁</a></h1>
			<div class="menu">
				<a class="icon-battle" href="<?php echo $WEB_ROOT; ?>battle/">戰鬥模擬計算</a>
				<a class="icon-train" href="<?php echo $WEB_ROOT; ?>train/">AI對戰訓練</a>
				<div class="parent-menu">
					<a class="icon-rankings" href="<?php echo $WEB_ROOT; ?>rankings/">寶可夢排名</a>
					<div class="submenu">
						<div class="submenu-wrap">
							<a class="icon-rankings" href="<?php echo $WEB_ROOT; ?>custom-rankings/">自訂排名</a>
						</div>
					</div>
				</div>
				<a class="icon-team" href="<?php echo $WEB_ROOT; ?>team-builder/">隊伍組建模擬</a>
				<div class="parent-menu">
				<a class="more desktop" href="#"></a>
				<div class="submenu">
					<div class="submenu-wrap">
						<a class="icon-moves" href="<?php echo $WEB_ROOT; ?>moves/">招式</a>
						<a class="icon-articles" href="<?php echo $WEB_ROOT; ?>articles/">專欄文章</a>
						<a class="icon-contribute" href="<?php echo $WEB_ROOT; ?>contribute/">貢獻一己之力</a>
						<a class="icon-settings" href="<?php echo $WEB_ROOT; ?>settings/">設定</a>
						<a class="icon-twitter" href="https://twitter.com/pvpoke" target="_blank">官方推特</a>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</header>
	<div class="main-wrap">
		<div id="main">