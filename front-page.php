<?php
/**
 * The template for displaying the Front page.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    scaffold
 * @copyright  Copyright (c) 2019, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>


		<div class="front-video">
			<script type="text/javascript" src="https://unpkg.com/youtube-background/jquery.youtube-background.min.js"></script>
			<div id="ytbg" data-youtube="https://www.youtube.com/watch?v=BF8fAR3gFzM"></div>
			<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery('[data-youtube]').youtube_background();
					});
			</script>

			<div class="wrapper">
				<h1 class="white-text">World-Class Cold Water Diving</h1>
				<h3 class="front-subline white-text">Experience the best in scuba diving, right here in Alaska.</h3>
				<button class='button'>FreeDiving</button>
				<button class='button'>Sucba Diving</button>
				<button class='button'>Alaska Diving</button>
				<button class='button'>Calendar</button>
			</div>
		</div>

		<div class="front-bar">
			<div class="wrapper">
				<div class="col-md-4">
					<h1>Dive Training</h1>
					<p>Scuba diving? Freediving? Whether you are new to scuba diving, interested in renewing your scuba certification, or ready to take your diving to the next level, we’ve got a course for you. Choose to complete your training in Alaska, or in your favorite vacation spot!</p>
					<button class='button'>Learn More</button>
				</div>
				<div class="col-md-4 boxxed">
					<h1>Get Started</h1>
					<p>New to diving? No problem! Swing by our shop in Anchorage, or give us a call, and we will walk you through which courses to take, which equipment to rent or buy, and the best options for you to begin your diving journey!</p>
					<button class='button'>Find A Class</button>
				</div>
				<div class="col-md-4">
					<h1>Alaska Diving</h1>
					<p>Take a trip out of Resurrection Bay or your favorite Alaska scuba diving spot with us! We are always down to come alongside you and your dive buddies as professional guides on a dive trip. The incredible natural beauty above and below our pristine Alaskan waters are something you won't want to miss.</p>
					<button class='button'>Learn More</button>
				</div>
			</div>
		</div>

		<div class="bottom-bar ">
			<div class="wrapper white-text">
			<h1 class="white-text">Why Dive Alaska?</h1>
			<p>Alaska has some of the best cold-water diving in the world! Get up close and personal with sea stars, anemones, rockfish, octopus, sea lions, and much more. Based in Anchorage, we mainly dive in Resurrection Bay and Prince William Sound, two p[ristine bodies of water teeming with life and bio-diversity. As a PADI, SSI, and GUE center, we're here to serve the scuba and freediving communities of Alaska with top-notch gear, training, guiding, and service. Let's go diving!</p>
			<button class='button'>Learn More</button>
			</div>
		</div>


<?php
get_footer();
