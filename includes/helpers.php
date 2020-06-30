<?php
	// Image path
	function image($file) {
	    return get_template_directory_uri().'/assets/images/'.$file;
	}

	// Split string based on dividing number of words by number passed into function
	function splitByNumber($title, $number) {
		$wordCount = str_word_count($title);
		$split = intdiv($wordCount, $number);
		$words = explode(' ', $title);
		$count = 1;

		foreach ($words as $word) {
			echo $word;

			if ($count == $split) {
				echo '<br />';
			} else {
				echo ' ';
			}

			$count++;
		}
	}

	// Create counters for page sections
	$section_counter = 1;

	function section_count()
	{
		global $section_counter;

		echo $section_counter;

		$section_counter++;
	}
