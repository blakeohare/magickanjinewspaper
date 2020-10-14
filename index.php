<?php
	require 'kanji.php';
	
	$path = $_SERVER['REQUEST_URI'];
	$t = explode('?', $path);
	$path = $t[0];
	if ($path[strlen($path) - 1] === '/') $path = substr($path, 0, strlen($path) - 1);
	
	$KANJI = generate_kanji_grid();
	
	$view_mode = trim(strtoupper($_GET['view_mode']));
	
	$mode = trim(strtoupper($_GET['mode']));
	switch ($mode) {
		case 'CLUMPED':
		case 'MIXED':
			break;
		default: $mode = 'CLUMPED'; break;
	}
	
	// Take a list of items and then create a list of lists of n items each.
	function clumpify($items, $clump_size) {
		$clumps = array();
		
		$length = count($items);
		$active_clump = array();
		for ($i = 0; $i < $length; ++$i) {
			$item = $items[$i];
			array_push($active_clump, $item);
			if (count($active_clump) == $clump_size) {
				array_push($clumps, $active_clump);
				$active_clump = array();
			}
		}
		if (count($active_clump) > 0) {
			array_push($clumps, $active_clump);
		}
		return $clumps;
	}
	
	$start = 0;
	$end = 110;
	
	if (isset($_GET['start'])) {
		$start = intval($_GET['start']) - 1;
	}
	if (isset($_GET['end'])) {
		$end = intval($_GET['end']);
	}

	$clumps = clumpify($KANJI, 20);

	$fgcolor = '000';
	$bgcolor = 'fff';
	$kanji_size = 16;
	$kanji_font = 'Meiryo';
	$is_bold = false;
	
	if ($view_mode === 'NEWSPAPER') {
		$fgcolor = '222';
		$bgcolor = 'bbb';
		$kanji_size = 18;
		$kanji_font = 'Noto Serif JP';
		$is_bold = false;
	} else if ($view_mode === 'PLAYFUL') {
		$fgcolor = '08f';
		$bgcolor = 'ffffdd';
		$kanji_size = 20;
		$kanji_font = 'Chihaya';
		$is_bold = false;
	}

	echo '<html lang="ja">';
	
	echo '<head>';
	echo '<title>Juku</title>';
	echo '<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300&display=swap" rel="stylesheet">';
	echo '<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel="stylesheet">';
	echo '<style type="text/css">';
	?>

@font-face {
	font-family: "Chihaya";
	src: url("<?php echo $path; ?>/chihaya.ttf");
}
	<?php
	echo 'body { font-family: "Arial", sans-serif; background-color:#' . $bgcolor . '; color: #000; }';
	echo '.kanji { font-family: "' . $kanji_font . '", sans-serif; color:#' . $fgcolor . '; font-size: ' . $kanji_size . 'pt; ' . ($is_bold ? 'font-weight:bold;' : '') .'}';
	echo '</style>';
	?>

<script>

function show_meaning(slot, value) {
	document.getElementById('meaning_slot_' + slot).innerHTML = value;
}

</script>
	
<?php

	echo '</head>';
	
	echo '<body>';
	
	echo '<h2>Kanji Study Chart</h2>';
	
	echo '<form action="' . $path . '" method="GET">';
	echo '<div>';
	echo 'Start: <input type="text" name="start" value="' . ($start + 1). '" size="3"/> &nbsp; ';
	echo 'End: <input type="text" name="end" value="' . $end . '" size="3"/> &nbsp; ';
	echo '<select name="mode">';
	foreach (array('Clumped', 'Mixed') as $m) {
		echo '<option value="' . $m . '"';
		if (strtoupper($m) === $mode) echo ' selected="selected"';
		echo '>' . htmlspecialchars($m) . '</option>';
	}
	echo '</select> &nbsp; ';
	echo '<div>';
	echo 'View Mode: <select name="view_mode">';
	foreach (array('Digital', 'Newspaper', 'Playful') as $view) {
		echo '<option value="' . strtoupper($view) . '"';
		if (strtoupper($view) === $view_mode) echo ' selected="selected"';
		echo '>' . htmlspecialchars($view) . '</option>';
	}
	echo '</select>';
	echo '</div>';
	echo '<div><input type="submit" name="submit" value="Update"></div>';
	echo '</div>';
	echo '</form>';
	
	echo '<table cellspacing="0" cellpadding="2">';
	
	$index = array();
	for ($i = $start; $i < $end; ++$i) {
		if ($i >= count($clumps)) break;
		array_push($index, $i);
	}
	
	if ($mode == 'MIXED') {
		$chars = array();
		foreach ($index as $i) {
			foreach ($clumps[$i] as $value){
				array_push($chars, $value);
			}
		}
		shuffle($chars);
		foreach ($index as $i) {
			$clumps[$i] = array();
			for ($j = 0; $j < 20; ++$j) {
				array_push($clumps[$i], array_pop($chars));
			}
		}
	} else {
		shuffle($index);
		
	}
	
	foreach ($index as $i) {
		$n = $i + 1;
		echo '<tr valign="middle">';
		if ($mode === 'CLUMPED') {
			echo '<td style="color:#888">#' . $n . '</td>';
		}
		$clump = $clumps[$i];
		shuffle($clump);
		foreach ($clump as $value) {
			echo '<td class="kanji">';
			echo '<span onclick="show_meaning(' . $n . ', &quot;' . htmlspecialchars($value['meaning']) . '&quot;)">';
			echo htmlspecialchars($value['char']);
			echo '</span>';
			echo '</td>';
		}
		echo '<td><span style="margin-left:20px; color:#888;" id="meaning_slot_'. $n . '"></span></td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</body>';
	
	echo '</html>';
?>