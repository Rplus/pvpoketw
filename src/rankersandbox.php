<?php require_once 'header.php'; ?>

<h1>Ranker</h1>
<div class="section league-select-container">
	<?php require 'modules/leagueselect.php'; ?>
	<?php require 'modules/cupselect.php'; ?>
	<button class="simulate">Simulate</button>
	
	<div class="output"></div>
</div>

<script src="js/GameMaster.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="js/pokemon/Pokemon.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="js/interface/RankerInterface.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="js/battle/TimelineEvent.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="js/battle/Battle.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="js/battle/RankerOverall.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="js/RankerMain.js?v=<?php echo $SITE_VERSION; ?>"></script>

<?php require_once 'footer.php'; ?>