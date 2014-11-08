<?php
/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
*/


// Various clean up functions
require_once('library/cleanup.php');

// Required for Foundation to work properly
require_once('library/foundation.php');

// Register all navigation menus
require_once('library/navigation.php');

// Add menu walker
require_once('library/menu-walker.php');

// Create widget areas in sidebar and footer
require_once('library/widget-areas.php');

// Return entry meta information for posts
require_once('library/entry-meta.php');

// Enqueue scripts
require_once('library/enqueue-scripts.php');

// Add theme support
require_once('library/theme-support.php');

/*** Test Custom Function ***/
function foo() {
	echo "<h2>Foo!</h2>";
}



/*** Post Social Links ***/

function getFullSocialize($url) {
	
	$social_string = <<<TEST
		<div class="facebook-button"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=162021730542742&amp;xfbml=1"></script><fb:like href="$url" send="false" layout="button_count" width="10" show_faces="false" action="like" font=""></fb:like></div>
				<div class="google-button">
			<!-- Place this tag in your head or just before your close body tag -->
			<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

			<!-- Place this tag where you want the +1 button to render -->
			<g:plusone size="medium" count="false" href="$url"></g:plusone>
		</div>
		<div class="twitter-button"><a href="http://twitter.com/share" class="twitter-share-button" data-url="$url" data-count="horizontal" data-via="choppingblock">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
TEST;

echo $social_string;
}

?>
