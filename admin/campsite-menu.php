<?php 
	global $wpdb;
	$campsite_table = $wpdb->prefix . 'lyd_campsite_table';
	$campsites = $wpdb->get_results("SELECT * FROM " . $campsite_table);

?>
<h1>Campsite menu</h1>
<div class="content-row">
	<div class="content-wrapper" id="camp-status">
		<h3 class="ad-h1">Campsite Status</h3>
		<table id="campsite-status">
			<thead>
				<tr>
					<th>Site #</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				// var_dump($campsites);
					foreach ($campsites as $key) {
						// var_dump($key);
						$this_status = $key->campsite_status;
						$st = array();
						switch ((int)$this_status) {
							case 0:

								$status = 'Available';
								$status_0 = 'Booked';
								$status_1 = 'Waiting Aprovial';
								$the_val_0 = 1;
								$the_val_1 = 3;
								break;
							case 1:
								$status = 'Booked';
								$status_0 = 'Available';
								$status_1 = 'Waiting Aprovial';
								$the_val_0 = 0;
								$the_val_1 = 3;
								break;
							case 3:
								$status = 'Waiting Aprovial';
								$status_0 = 'Available';
								$status_1 = 'Booked';
								$the_val_0 = 0;
								$the_val_1 = 1;
								break;
							default:
								$status = 'Available';
								$status_0 = 'Booked';
								$status_1 = 'Waiting Aprovial';
								
								$the_val_0 = 1;
								$the_val_1 = 3;
								break;
						}
						// $status = $val->campsite_status ? 'Available' : 'Booked';
						// $other_status = $val->campsite_status ? 'Booked' : 'Available';
						// echo $status . ' ' . $other_status . '<br/>'; 
?>
 					<tr>
							<td><?php echo $key->campsite_number; ?></td>
							<td>
								<form>
									<select>
										<option  value="<?php echo $this_status; ?>"><?php echo $status; ?></option>
										<option value="<?php echo $the_val_0; ?>"><?php echo $status_0 ; ?></option>
										<option value="<?php echo $the_val_1; ?>"><?php echo $status_1 ; ?></option>
									</select>
								</form>
							</td>
						</tr>  
<?php
							
					}
				?>

			</tbody>
		</table>
	</div>
	<div class="content-wrapper" id="camp-message">message</div>
	<div class="content-wrapper" id="camp-requests">requests</div>
</div>
<div class="content-row">
	b
</div>