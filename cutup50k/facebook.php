<?php
    ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/2.0.0.9');
    // http://stackoverflow.com/a/10438840/1457704
    // https://graph.facebook.com/160064734128949
    
    //160028464132576
    $rssUrl = "http://www.facebook.com/feeds/page.php?id=160028464132576&format=rss20";
    $xml = simplexml_load_file($rssUrl);
    $entry = $xml->channel->item;
    $returnMarkup = '';
    for ($i = 0; $i < 2; $i++) {
    	$returnMarkup .= "<a href=\"".$entry[$i]->link."\">";
        $returnMarkup .= "<h4>".$entry[$i]->title."</h4></a>";
        $returnMarkup .= "<time>".date("F jS Y", strtotime($entry[$i]->pubDate))."</time>";
    }
    echo $returnMarkup;
?>