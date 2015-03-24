<?php
 // Template Name: lyd-campsite
	create_section_top('Campsite', false, 'post');
?> 
<div class-"col-md-12">
	<?php campsite_map(); ?>
</div>
<div class="row">
	<div class="col-md-8">
		<h1>this is the campsites</h1>
		<form id="campsite-book">
			<div class="camp-ip-grp">
	  			<span class="input-prepend" id="camp-name-pre">Name: </span>
	  			<input type="text" id="camp-name" class="campsite-input" placeholder="Bob Smith" data-key="name">
			</div>

			<div class="camp-ip-grp">
	  			<span class="input-prepend" id="camp-email-pre">Email: </span>
	  			<input type="email" id="camp-email" class="campsite-input" placeholder="bsmith@gmail.com" data-key="email">
			</div>

			<div class="camp-ip-grp">
	  			<span class="input-prepend" id="camp-phone-pre">Phone #: </span>
	  			<input type="tel" id="camp-phone" class="campsite-input" placeholder="555-555-5555" data-key="phone">
			</div>

			<div class="camp-ip-grp">
	  			<span class="input-prepend" id="camp-from-pre">From: </span>
	  			<input type="text" id="camp-from" class="campsite-input" placeholder="05/20/2015" data-key="from">
	  		</div>

	  		<div class="camp-ip-grp">
		  		<span class="input-prepend" id="camp-to-pre">To: </span>
		  		<input type="text" id="camp-to" class="campsite-input" placeholder="05/20/2015" data-key="to">
	  		</div>
	  		<div class="clear"></div>
	  		<div class="camp-ip-grp">
		  		<span class="input-prepend" id="camp-number-pre">Number: </span>
				<select class="campsite-input" id="camp-number" data-key="number">
					<option>A1</option>
					<option>A2</option>
					<option>A3</option>
					<option>A4</option>
					<option>A5</option>
					<option>A6</option>
					<option>A7</option>
					<option>A8</option>
					<option>A9</option>
				</select>
			</div>
	  		<div class="camp-ip-grp">
	  			<div class="reserve-btn-2">Reserve</div>
			</div>

		</form>
		</div>
		<div class="col-md-4">
			<div class="response"></div>
		</div>

<?php create_section_bottom(); ?>