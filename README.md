PHP Sentence Randomizer
=======================

PHP Sentence Randomizer is a recursive function for parsing and randomizing given sentence. Usage:

```php
<?php 
	require_once('php-sentence-randomizer.php');	

	$sentence =
	"{Please|Just} make this {cool|awesome|random} test sentence
		{rotate {quickly|fast} and random|spin and be random}";

	echo randomizer($sentence);
?>
```
