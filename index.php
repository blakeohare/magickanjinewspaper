<?php
	require 'kanji.php';
	
	$KANJI = generate_kanji_grid();
	
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

	echo '<html lang="ja">';
	
	echo '<head>';
	echo '<title>Juku</title>';
	echo '<style type="text/css">';
	echo 'body { font-family: "Meiryo", serif; background-color:#' . $bgcolor . '; color:#' . $fgcolor . '; }';
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
	
	echo '<form action="' . $_SERVER['REQUEST_URI'] . '" method="GET">';
	echo '<div>';
	echo 'Start: <input type="text" name="start" value="' . ($start + 1). '" size="3"/> &nbsp; ';
	echo 'End: <input type="text" name="end" value="' . $end . '" size="3"/> &nbsp; ';
	echo '<input type="submit" name="submit" value="Update">';
	echo '</div>';
	echo '</form>';
	
	echo '<table cellspacing="0" cellpadding="2">';
	
	$index = array();
	for ($i = $start; $i < $end; ++$i) {
		if ($i >= count($clumps)) break;
		array_push($index, $i);
	}
	
	shuffle($index);
	
	foreach ($index as $i) {
		$n = $i + 1;
		echo '<tr valign="top">';
		echo '<td>#' . $n . '</td>';
		$clump = $clumps[$i];
		shuffle($clump);
		foreach ($clump as $value) {
			echo '<td>';
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