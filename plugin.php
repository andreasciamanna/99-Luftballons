<?php
/**
 * @package 99_Luftballons
 * @version 1.6
 */
/*
Plugin Name: 99 Luftballons
Plugin URI: https://github.com/sciamannikoo/99-Luftballons
Description: This is a fork of http://wordpress.org/plugins/hello-dolly/ meant to be used for testing WPML String Translation
Author: WPML (OnTheGo Systems)
Version: 1.0
Author URI: http://wpml.org/
Text Domain: neunundneunzig-luftballons
*/

function neunundneunzig_luftballons_get_lyric() {
	/** These are the lyrics to 99 Luftballons */
	$lyrics = __( "Hast Du etwas Zeit für mich
Dann singe ich ein Lied für Dich
Von 99 Luftballons
Auf ihrem Weg zum Horizont
Denkst Du vielleicht g'rad an mich
Dann singe ich einen Lied für Dich
Von 99 Luftballons
Und dass so was von so was kommt
99 Luftballons
Auf ihrem Weg zum Horizont
Hielt man für UFOs aus dem All
Darum schickte eine General
'Ne Fliegerstaffel hinterher
Alarm zu geben, wenn es so wär
Dabei war'n da am Horizont
Nur 99 Luftballons
99 Düsenflieger
Jeder war ein großer Krieger
Hielten sich für Captain Kirk
Es gab ein großes Feuerwerk
Die Nachbarn haben nichts gerafft
Und fühlten sich gleich angemacht
Dabei schoss man am Horizont
Auf 99 Luftballons
99 Kriegsminister
Streichholz und Benzinkanister
Hielten sich für schlaue Leute
Witterten schon fette Beute
Riefen, Krieg und wollten Macht
Mann, wer hätte das gedacht
Dass es einmal soweit kommt
Wegen 99 Luftballons
Wegen 99 Luftballons
99 Luftballons
99 Jahre Krieg
Ließen keinen Platz für Sieger
Kriegsminister gibt's nicht mehr
Und auch keine Düsenflieger
Heute zieh' ich meine Runden
Seh die Welt in Trümmern liegen
Hab 'n Luftballon gefunden
Denk' an Dich und lass' ihn fliegen", 'neunundneunzig-luftballons' );

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function neunundneunzig_luftballons() {
	$chosen = neunundneunzig_luftballons_get_lyric();
	echo "<p id='neunundneunzig_luftballons'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'neunundneunzig_luftballons' );
add_action( 'wp_footer', 'neunundneunzig_luftballons' );

// We need some CSS to position the paragraph
function neunundneunzig_luftballons_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#neunundneunzig_luftballons {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
		text-align: center;
	}
	</style>
	";
}

add_action( 'admin_head', 'neunundneunzig_luftballons_css' );
add_action( 'wp_head', 'neunundneunzig_luftballons_css' );
