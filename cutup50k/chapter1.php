<?php
    $content = "http://www.marxists.org/reference/subject/philosophy/works/ge/benjamin.htm";
	$content = file_get_html("$content");
    $returnMarkup = '';
 		$lengthA = rand(2400,2800);
 		$lengthB = rand(2350,2950);
        $returnMarkup .= strip_tags($content);
 		$fixedMarkup = html_entity_decode($returnMarkup);
 		// now let's grab some random words from this
 		$words = str_word_count($fixedMarkup,1);
 		shuffle($words);
		$start = array_slice($words,1,1);
		$partA = array_slice($words,2,$lengthA);
		$partB = array_slice($words,$lengthA,$lengthB);
		$punc = array('&ndash;', ',', '-', ' ', ';', '&mdash;', '&hellip;', '/', ':');
		shuffle($punc);
		$insPunc = array_slice($punc,0,1);
		// assemble it
		while (list($key, $value) = each($start)) {
			if (strlen($value)<3){
				echo "<p class=\"lead\">The ";
			}
			else {
				echo "<p class=\"lead\">$value ";
			}
		}
 		while (list($key, $value) = each($partA)) {
 			if (strlen($value)<3){
 				echo "";
 			}
 			else {
 				echo "$value ";
 			}
 		}
 		while (list($key, $value) = each($insPunc)) {
 		html_entity_decode($value);
 		echo "<span class=\"punc\">$value </span><span>";
 		while (list($key, $value) = each($partB)) {
 			if (strlen($value)<3){
 				echo "";
 			}
 			else {
 				echo "$value ";
 			}
 		
 		}
 		echo "</span></p>";
 	}
?>