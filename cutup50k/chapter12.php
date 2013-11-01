<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>&times; &#x34e; &ndash; Chapter Twelve</title>
	<meta name="description" content="cut up">
	<meta name="author" content="Nick Heer">
	<meta name="viewport" content="width=560">
	<link rel="apple-touch-icon-precomposed" href="http://nickheer.com/cutup/apple-touch-icon-precomposed.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link href="css/additional.css" rel="stylesheet" media="screen">
</head>
<body>
	<?php include('simple_html_dom.php'); //very necessary?>
<div class="container">
	  <header>
	    <h2><a href="index.php">&times;&nbsp;&#x34e; cut up: <strong>the book</strong></a></h2>
		<h6>Nick Heer, with others</h6>
	  </header>
	<article>
		<h3>Chapter Twelve</h3>
		<?php
		    $url = "http://shakespeare.mit.edu/romeo_juliet/full.html";
			$url = file_get_html("$url");
			$ret = $url->find('blockquote');
			$ret = implode ($ret);
		    $returnMarkup = '';
		 		$lengthA = rand(3200,4200);
		 		$lengthB = rand(3150,3850);
		        $returnMarkup .= strip_tags($ret);
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
		<cite>Text adapted from <em><a href="http://shakespeare.mit.edu/romeo_juliet/full.html">Romeo and Juliet</a></em> by William Shakespeare.</cite>
		<h3>The End</h3>
			</article>
			<nav>
				<ul>
					<li><a href="chapter11.php">&larr; Chapter Eleven</a></li>
					<li><a href="index.php">Chapter One &rarr;</a></li>
				</ul>
				<i class="clearfix"></i>
			</nav>
			<footer>
				<p>Thank you for reading &ldquo;cut up: the book&rdquo;. This book was generated in PHP using the source texts above. Special thanks to S.C. Chen who created <a href="http://simplehtmldom.sourceforge.net">PHP Simple HTML DOM Parser</a> &mdash; this project would not be possible without it. All articles are fetched in real time from the live web, so uptime or reliability cannot be guaranteed.</p>
				<p>Written by <a href="http://nickheer.com">Nick Heer</a>. Hot tip: refresh to generate a new (possibly better) chapter.</p>
			</footer>
		</div>
		<script src="/mint/?js" type="text/javascript"></script>
		</body>
		</html>