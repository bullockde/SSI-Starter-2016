<?php
	$staff = get_posts( array( 'post_type' => 'ssi_staff', 'posts_per_page' => -1 , 'order' => 'desc') );
	$tasklists = get_posts( array( 'post_type' => 'ssi_tasklists', 'posts_per_page' => -1 , 'order' => 'desc') );
	
	$show_title = 1;

?>

<div id='all-missions' class=''>		
		<div class='text-center h4'>
			<u><?php echo count($tasklists); ?></u> Projects
		</div>
		<hr>
		<div id='all-lists' style='display: block;' class='text-center hidden'>
		<button id='all-lists'>View All</button>	
		<div class='clear'></div><hr>			
		</div>
		<div id='all-lists' style='display: block;' class='col-md-12'>
			
			<?php 
			
			$vehicle = 0;
			$rental = 0;
			
			
			
				foreach( $tasklists as $lead ){
					
					$person = $lead->post_name;
					
					
					
					$ssi_vehicle_ID = get_field( 'ssi_vehicle_ID', $lead->ID );
					
					?>
					
					
					
						
<div class='clear'></div>



		<div class='text-center h3'> 

			<?php echo " - " . ++$count . " - "; ?><br><br>

				<div class='clear'></div>
		</div>
		
		
		
		<center>
			<?php			
			$vehicles = array();
			
			if( $_GET['ID'] ){ 

				$tasklist_ID = $_GET['ID'] ; 
				
			}
			
	
			
			if( get_field( 'ssi_vehicle_ID', $lead->ID ) ){
				$vehicle_ID = get_field( 'ssi_vehicle_ID', $lead->ID );
				$args = array( 'ID' => $vehicle_ID , 'post_type' => 'ssi_vehicles' );
				
				$vehicle = 1;
			}else if( get_field( 'ssi_rental_ID', $lead->ID ) ){
				$vehicle_ID = get_field( 'ssi_rental_ID', $lead->ID );
				$args = array( 'ID' => $vehicle_ID , 'post_type' => 'ssi_rentals' );
				
				$rental = 1;
			}
				
			
				
				
				
				$vehicles = get_posts( $args  );
		
				$t_id = 0;

				foreach( $vehicles as $vehicle ){
					
					if( $vehicle->ID != $vehicle_ID  ){ 
						continue;
						
						$show_title = 0;
					}
?>
	<div class='well'>

		<div class='col-xs-12 h3 red'><?php echo $vehicle->post_title; ?></div>
				<div class='clear'></div><hr>
		<div class='col-sm-3'>
		<?php
				$thumb_id = get_post_thumbnail_id( $vehicle->ID );
			$thumb_url_array = wp_get_attachment_image_src(  $thumb_id, 'thumbnail', true);
			$thumb_url = $thumb_url_array[0];

				 
				
				if( get_post_thumbnail_id( $vehicle->ID ) ){
					?>
					<img src='<?php echo $thumb_url; ?>' class='' >
					<?php
					
				}
				?>
				<br>
				(25 Photos)
				<br><br>
			
			
		<div class='clear'></div>
		</div>
		<div class='col-sm-6'>
			
		
		<?php
			if( get_field( 'ssi_vehicle_ID', $lead->ID ) ){
			
				
				?>
				<div class='text-left'>
				<div class='col-sm-6'>
					<div class='col-sm-4 col-xs-6'><b>Year:</b></div>
					<div class='col-sm-8 col-xs-6'>1995</div>
						<div class='clear'></div><hr>
					<div class='col-sm-4 col-xs-6'><b>Make:</b></div>
					<div class='col-sm-8 col-xs-6'>Dodge</div>
						<div class='clear'></div><hr>
					<div class='col-sm-4 col-xs-6'><b>Model:</b></div>
					<div class='col-sm-8 col-xs-6'>Grand Caravan SE</div>
					<div class='clear'></div><hr>
				</div>
				<div class='col-sm-6'>
					<div class='col-xs-6'><b>Mileage:</b></div>
					<div class='col-xs-6'>101 K</div>
						<div class='clear'></div><hr>
					<div class='col-xs-6'><b>Condition:</b></div>
					<div class='col-xs-6'>Fair</div>
						<div class='clear'></div><hr>
					<div class='col-xs-6'><b>Transmission:</b></div>
					<div class='col-xs-6'>Automatic</div>
					<div class='clear'></div><hr>
				</div>
				
							<div class='clear'></div>

			</div>
			
			<div class='clear'></div>
					<div class='col-xs-12 h4 red'>Kelly Blue Book: $2,895</div><br>
					
			
				
				<?php
			}else if( get_field( 'ssi_rental_ID', $lead->ID ) ){

				?>
				Home Stats
				
				<?php
			}
		?>
			
			
			

			
		
		</div>
		<div class='col-sm-3'>
		
			<h4>PRICE</h4>
			<h1 class='red'>$125 <small class='red'>/wk</small></h1>
			<br>$500 Down + 20 weeks<br><hr>
			
			<a target='_blank' href='/tasklist/?ID=<?php echo $lead->ID ?>' class='btn btn-lg btn-default btn-block'>More Info >></a>
			
			
		<div class='clear'></div>
		</div>
		
		<div class='clear'></div>
	</div>		
	<?php } ?>
	
			<a href='/tasklist/?ID=<?php echo $lead->ID; ?>' class='h3'><?php echo $lead->post_title; ?></a>
		
				
<div class='clear'></div>
						<?php
				if( get_field( 'current_download', $lead->ID ) != '' ){
				
			?><br>
			<a target='_blank' href='<?php echo get_field( "current_download", $lead->ID ); ?>' class='btn btn-default'>Download PDF</a>
			<br><br>
			<?php
				
			}
		
		?>

		</center>			
		
					<div class='col-sm-2 col-xs-2 text-center'>
								
						<div class='clear'></div>
						<?php
						//$img_url = get_the_post_thumbnail_url($lead->ID , 'thumbnail');
						
						?> 
						<img src='<?php echo $img_url; ?>'>
						 <div class='clear'></div>
					</div>
					
					<div class='col-xs-3 hidden'>
						
						<?php echo get_field( 'MX_user_email', $lead->ID ); ?>
						
						<div class='clear'></div>
					</div>
					<div class='col-xs-6 col-sm-2'>
						
						<a href="tel:<?php echo get_field( 'MX_user_phone', $lead->ID ); ?>"><?php echo get_field( 'MX_user_phone', $lead->ID ); ?></a>
						
						<div class='clear'></div>
					</div>
					<div class='col-xs-12 col-sm-2'>
						<div class='clear'></div>
						<?php /* echo get_field( 'area_code', $lead->ID ); */?> 
						<?php 
							if(get_field( 'address', $lead->ID )){
								
								echo get_field( 'address', $lead->ID ) . ", ";
							}
 ?>						<?php echo get_field( 'MX_user_city', $lead->ID ); ?>
						 <?php echo get_field( 'MX_user_state', $lead->ID ); ?>

						 <div class='clear'></div>
					</div>
					
					
	<div class='clear'></div><hr>
					
					
								
	<?php
		$count = 1;
	
	$tasks = get_posts( array( 'post_type' => 'to_do', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby'=> 'meta_value_num', 'meta_key' => 'target_date' ) );

	foreach( $tasks as $task ){
		
		$num = 10;
		if(is_page('tasklist')){ $num = 10; }

		if( get_field( 'assigned_mission', $task->ID ) == $lead->ID ){ 
				//if( $count++ > $num )continue; 
		?>
		
		
<div class=' report text-center1 hidden1'>


		<div class='col-xs-1 visible-print'>
				<br>
		</div>

		<div class=' col-xs-4'>
				<b><u>Task</u></b><br>
				<?php if($task->post_title){ echo $task->post_title; }else{ echo 'New Request'; } ?>

		</div>		
				
		
			<div class='col-xs-2 text-center hidden'>
				<u>Created</u><br>
				<?php echo mysql2date('n/j/y', $task->post_date ); ?>
			</div>
			<div class='col-xs-2 text-center'>
				<u>Deadline</u><br>
				<?php echo mysql2date('n/j/y', get_field( 'target_date', $task->ID ) ); ?>
			</div>
			<div class='col-xs-2 text-center hidden-print'>
				<u>Max Budget</u><br>
				<?php 
					if(get_field( 'target_budget', $task->ID , 1 )){
						?>
						$<?php echo  get_field( 'target_budget', $task->ID , 1 ); ?>
						<?php
					}else{
						echo "- No Bids -";
					}
						
				
				?> 
			</div>
			<div class='col-xs-2 text-center'>
				<u>Lowest Bid</u><br>
				<?php 
					if(get_field( 'target_budget', $task->ID , 1 )){
						?>
						$<?php echo  get_field( 'target_budget', $task->ID , 1 ); ?>
						<?php
					}else{
						echo "- No Bids -";
					}
						
				
				?> 
			</div>
			<div class='col-xs-2 visible-print'>
				Bid
			</div>
			<div class='col-xs-2 text-center hidden-print'>
				<div id='details<?php echo $task->ID; ?>' class='' style='display: block;' >		
						
						<button id='details<?php echo $task->ID; ?>' class='btn btn-success btn-default btn-block'> Details >> </button>
				</div>
			</div>
		<div class='clear'></div><hr>
		
		
		
		<div id='details<?php echo $task->ID; ?>' class='details goal' style='display: none;' >
				<?php

					echo "";
					
					?>
					
					<div class='col-xs-12 text-center title' ><b>Task Goals </b> </div><div class='clear'></div>
					<div class='col-xs-4' >
						<b>Date: </b> 
					<!--	<input  type="text" name="target_date" value="<?php echo  get_field( 'target_date', $task->ID , 1  ) ?>" >-->
						<?php echo  get_field( 'target_date', $task->ID , 1 ) ?> 
					</div>
					<div class='col-xs-4' >
						<b>Hrs: </b> 
					<!--	<input  type="text" name="target_hours" value="<?php echo  get_field( 'target_hours', $task->ID , 1  ) ?>" >-->
						<?php echo  get_field( 'target_hours', $task->ID , 1 ) ?> 
						</div>
					<div class='col-xs-4' >
						<b>Budget: </b>
						$<!--<input  type="text" name="target_budget" value="<?php echo  get_field( 'target_budget', $task->ID , 1  ) ?>" >-->
						<?php echo  get_field( 'target_budget', $task->ID , 1 ) ?> </div>


				<?php
					echo "<div class='clear'></div><br><br>";
					
					$content = $task->post_content;
					
					$content = apply_filters('the_content', $content);
					
					//echo "<div class='col-xs-12 text-left' ><b><u>Notes</u></b><br>" . $content . "";
			?>
			<div class='col-xs-12 text-left' >
				<b><u>Notes</u></b><br>
				
				<?php echo $content; ?>
			<form method='post'>	
				<textarea name="post_content" placeholder="More notes .."></textarea>
				
				<input type='hidden' name='ID' value='<?php echo $task->ID; ?>'>
				<input type='hidden' name='ssi_update_cf' value='1'>
				<input type='submit' value='Add Notes'>
			</form>
			</div>
			<div class='nav text-center'>
			<?php
					echo "<div class='clear'></div><br>";
					echo "<a target='_blank' href='/wp-admin/post.php?post=" . $task->ID . "&action=edit' class='btn btn-default'>Edit Request</a>";
			?>
				<button id='details<?php echo $task->ID; ?>' class='btn btn-default '> x close </button>
			<?php
					//echo "<a target='_blank' href='/apply?title=" . $task->post_title . "' class='btn btn-default'>Apply Now!</a>";

					?>
			</div>
			<div class='clear'></div><br>
					
			</div>

<div id='details<?php echo $task->ID; ?>' class='' style='display: none;' >			
		<form method="post" action="" class=''>
			<button name="task_complete" type="submit" class='btn btn-success btn-block btn-lg' value="Remove Lead" />Completed!</button>
			
			<input  type="hidden" name="trans_date" value="<?php echo current_time( 'm/d/y' ); ?>" >
			<input name="ID" type="hidden" value="<?php echo $task->ID; ?>" />
			<input name="task_complete" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>
</div>		
		
		
</div>
			<div class='clear'></div>
			
			
			

		<?php }//end if

	}//end foreach
	?>
					
					
					
					
					
					<?php
					
					
					
					
					
					
					
					
					
				}
			?>
			<div class='clear'></div>
			<div class='text-center'>
				<button id='all-lists' class='btn btn-default btn-block'>x close</button>	
			</div>
		</div>
	</div>
	<div class='clear'></div>