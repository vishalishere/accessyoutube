<?php 

//clever little PHP file to compress all CSS

//split into sections as defined in HTML5 Boilerplate

include ('../global.php');


header('Content-type: text/css');
ob_start("compress");

	function compress($buffer) {
		/* remove comments */
    	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    	
    	/* remove tabs, spaces, newlines, etc. */
    	$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '   ', '    '), '', $buffer);

    	return $buffer;
	}

  	/* css files for compression */
require_once('bootstrap.css');
// require_once ('begin.css');
require_once ('css.css');
// require_once ('media.css');
// require_once ('end.css');

ob_end_flush();
?>

