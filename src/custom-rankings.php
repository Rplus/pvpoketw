<?php

$META_TITLE = 'Custom Rankings';

$META_DESCRIPTION = 'Configure a custom Pokemon GO tournament and see simple rankings.';


require_once 'header.php'; ?>

<h1>自訂排名</h1>
<div class="section white custom-rankings">
	<p>This tool will generate high-level rankings to help you develop a custom cup or tournament. Select your rulesets below for which Pokemon to include or exclude.</p>

	<?php require 'modules/leagueselect.php'; ?>

	<div class="include">
		<h3>包含寶可夢條件</h3>
		<p>符合以下條件之寶可夢將會包含在此次排名中。</p>
		<div class="filters" list-index="0">
		</div>
		<button class="add-filter" list-index="0">+ 增加篩選條件</button>
	</div>

	<div class="exclude">
		<h3>不包含寶可夢條件</h3>
		<p>符合以下條件之寶可夢將"不會"出現在此次排名中。</p>
		<div class="filters" list-index="1">
		</div>
		<button class="add-filter" list-index="1">+ 增加篩選條件</button>
	</div>

	<div class="filter clone hide">
		<a class="toggle" href="#"><span class="arrow-down">&#9660;</span><span class="arrow-up">&#9650;</span> <span class="name">Filter Name</span></a>
		<div class="toggle-content">
			<div class="field-container">
				<label>篩選條件種類</label>
				<select class="filter-type">
					<option value="type">屬性</option>
					<option value="tag">特殊類別寶可夢</option>
					<option value="id">指定寶可夢</option>
					<option value="dex">寶可夢全國圖鑑編號</option>
				</select>
			</div>
			<div class="field-section type">
				<p>請勾選屬性類別。含有被勾選到屬性之寶可夢將被 納入/剔除 排名。</p>
				<div class="field-container">
					<div class="check" value="bug"><span></span> 蟲</div>
					<div class="check" value="dark"><span></span> 惡</div>
					<div class="check" value="dragon"><span></span> 龍</div>
					<div class="check" value="electric"><span></span> 電</div>
					<div class="check" value="fairy"><span></span> 妖精</div>
					<div class="check" value="fighting"><span></span> 格鬥</div>
					<div class="check" value="fire"><span></span> 火</div>
					<div class="check" value="flying"><span></span> 飛行</div>
					<div class="check" value="ghost"><span></span> 幽靈</div>
					<div class="check" value="grass"><span></span> 草</div>
					<div class="check" value="ground"><span></span> 地面</div>
					<div class="check" value="ice"><span></span> 冰</div>
					<div class="check" value="normal"><span></span> 一般</div>
					<div class="check" value="poison"><span></span> 毒</div>
					<div class="check" value="psychic"><span></span> 超能力</div>
					<div class="check" value="rock"><span></span> 岩石</div>
					<div class="check" value="steel"><span></span> 鋼</div>
					<div class="check" value="water"><span></span> 水</div>
					<div class="check" value="none"><span></span> 僅單一屬性寶可夢</div>
				</div>
				<div class="field-container">
					<button class="select-all">全選</button>
					<button class="deselect-all">取消全選</button>
				</div>
			</div>

			<div class="field-section tag">
				<p>請勾選以下特殊分類。屬於以下被勾選到類別之寶可夢將被 納入/剔除 排名。</p>
				<div class="field-container">
					<div class="check" value="legendary"><span></span> 傳說的寶可夢</div>
					<div class="check" value="mythical"><span></span> 幻之寶可夢</div>
					<div class="check" value="alolan"><span></span> 阿羅拉型態</div>
					<div class="check" value="regional"><span></span> 地區限定</div>
				</div>
			</div>

			<div class="field-section id">
				<p>在下方輸入寶可夢的英文id(全小寫)，並且用英文逗點"," (非 "，")區隔。</p>
				<p>指定的寶可夢將有最高優先順序於排名上 保留/移除 而無視其他篩選器的條件。</P>
				<p>寶可夢的id輸入範例如下：</p>
				<ul>
					<li><em>pikachu</em></li>
					<li><em>raichu_alolan</em></li>
					<li><em>giratina_altered</em></li>
					<li><em>deoxys_defense</em></li>
					<li><em>pikachu,deoxys_defense,beedrill</em></li>
				</ul>
				<p>譯者按：亦可參考此份Google試算表文件：<a target="_blank" href="https://docs.google.com/spreadsheets/d/1m6gAODHNgF0YCMrwi5oFmVTDlYRe_9nYRL72V7iPMHg/edit#gid=1098261709">寶可夢英文id列表</a>
				<div class="field-container">
					<input class="ids" placeholder="寶可夢英文id" />
				</div>
			</div>

			<div class="field-section dex">
				<p>請輸入寶可夢圖鑑上之編號範圍。以下為範例：</p>
				<ul>
					<li><strong>第一世代：</strong> 1-151</li>
					<li><strong>第二世代：</strong> 152-251</li>
					<li><strong>第三世代：</strong> 252-386</li>
					<li><strong>第四世代：</strong> 387-488</li>
				</ul>
				<div class="field-container">
					<input class="start-range" placeholder="Start #" />
					<input class="end-range" placeholder="End #" />
				</div>
			</div>
		</div>
		<div class="remove">X</div>
	</div>

	<button class="simulate button">模擬排名開始</button>

	<div class="output"></div>
</div>

<div class="section white custom-rankings-results">
	<h3>排名</h3>

	<div class="poke-search-container">
		<input class="poke-search" context="ranking-search" type="text" placeholder="Search Pokemon" />
		<a href="#" class="search-info">i</a>
	</div>

	<div class="ranking-header">寶可夢</div>
	<div class="ranking-header right">模擬分數</div>

	<div class="rankings-container clear"></div>
</div>

<div class="section white custom-rankings-list">
	<h3>Pokemon List (<span class="pokemon-count">0</span>)</h3>
	<p>This list below contains eligible Pokemon for this cup. Pokemon that don't meet certain stat requirements, such as low CP Pokemon, aren't included for ranking purposes.</p>
	<textarea class="pokemon-list"></textarea>
</div>

<div class="section white custom-rankings-import">
	<h3>匯入/匯出 設定</h3>

	<p>複製底下代碼以分享或保存此排名設定。或是貼上其他排名之設定代碼以匯入。
	
	<textarea class="import"></textarea>
	<div class="copy">複製</div>
</div>

<div class="hide">
	<?php require 'modules/pokeselect.php'; ?>
</div>

<div class="section white custom-rankings-overrides">
	<h3>指定寶可夢招式組固定</h3>
	<p>本站的排名演算法會依據計算結果，推薦寶可夢各自較佳的招式組合。但有時實際情況搭配特定的招式組會又更理想的效果。</p>
	<p>本功能可以讓你自訂，並且固定特定寶可夢的招式組合。如此在演算法進行計算時將會只考慮你所指定的招式組。
	<?php require 'modules/pokemultiselect.php'; ?>
</div>

<div class="delete-filter-confirm hide">
	<p>是否移除此過濾條件？</p>

	<div class="center flex">
		<div class="button yes">是</div>
		<div class="button no">否</div>
	</div>
</div>

<div class="sandbox-search-strings hide">
    <p>使用以下格式可以用來過濾尋找特定條件寶可夢(均不含雙引號 " ")：</p>
    <table>
        <tr>
            <td><strong>中文名稱 如：</strong></td>
            <td>"瑪力露麗"</td>
        </tr>
        <tr>
            <td><strong>英文屬性 如：</strong></td>
            <td>"water"</td>
        </tr>
        <tr>
            <td><strong>中文招式名稱 如：</strong></td>
            <td>"@雙倍奉還"</td>
        </tr>
        <tr>
            <td><strong>英文招式屬性 如：</strong></td>
            <td>"@fighting"</td>
        </tr>
        <tr>
            <td><strong>And(且)符號 如：</strong></td>
            <td>"water&amp;@fighting"</td>
        </tr>
        <tr>
            <td><strong>Or(或)符號 如：</strong></td>
            <td>"water,fighting"</td>
        </tr>
        <tr>
            <td><strong>Not(非)符號 如：</strong></td>
            <td>"!water"</td>
        </tr>
    </table>
</div>

<div class="details-template hide">
	<div class="detail-section float margin">
	    <div class="ranking-header">Fast Moves</div>
	    <div class="ranking-header right">Usage</div>
	    <div class="moveset fast clear"></div>
	</div>
	<div class="detail-section float">
	    <div class="ranking-header">Charged Moves</div>
	    <div class="ranking-header right">Usage</div>
	    <div class="moveset charged clear"></div>
	</div>
	<div class="detail-section float margin">
	    <div class="ranking-header">Key Matchups</div>
	    <div class="ranking-header right">Battle Rating</div>
	    <div class="matchups clear"></div>
	</div>
	<div class="detail-section float">
	    <div class="ranking-header">Top Counters</div>
	    <div class="ranking-header right">Battle Rating</div>
	    <div class="counters clear"></div>
	</div>
	<div class="clear"></div>
	<div class="detail-section stats">
	    <div class="rating-container">
	        <div class="ranking-header">Attack</div>
	        <div class="rating"></div>&nbsp;-
	        <div class="rating"></div>
	    </div>
	    <div class="rating-container">
	        <div class="ranking-header">Defense</div>
	        <div class="rating"></div>&nbsp;-
	        <div class="rating"></div>
	    </div>
	    <div class="rating-container">
	        <div class="ranking-header">Stamina</div>
	        <div class="rating"></div>&nbsp;-
	        <div class="rating"></div>
	    </div>
	</div>
	<div class="share-link detail-section"><input type="text" readonly="">
		<div class="copy">Copy</div>
	</div>
</div>

<script src="<?php echo $WEB_ROOT; ?>js/GameMaster.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/pokemon/Pokemon.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/battle/TimelineEvent.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/battle/TimelineAction.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/battle/Battle.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/battle/RankerSandboxWeightingMoveset.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/RankerMain.js"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/PokeSearch.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/RankingInterface.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/PokeSelect.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/PokeMultiSelect.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/CustomRankingInterface.js?v=<?php echo $SITE_VERSION; ?>"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/ModalWindow.js?v=<?php echo $SITE_VERSION; ?>"></script>

<?php require_once 'footer.php'; ?>
