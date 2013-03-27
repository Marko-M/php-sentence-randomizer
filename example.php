<?php 
	require_once('php-sentence-randomizer.php');	

	$sentence =
	"{Please|Just} make this {cool|awesome|random} test sentence
		{rotate {quickly|fast} and random|spin and be random}";

	echo randomizer($sentence);
?>
