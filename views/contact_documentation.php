<div class="fluid-layout" >
	<div class="layout-span12">
		<div class="widget-layout">
			<div class="widget-layout-title">
				<h4><?php _e( "Documentation - Contact Bank", contact_bank ); ?></h4>
			</div>
			<div class="widget-layout-body">
				<a class="btn btn-info" href="admin.php?page=contact_bank"><?php _e("Add New Form", contact_bank);?></a>
				<a class="btn btn-info" href="#"  onclick="delete_forms();"><?php _e("Delete All Forms", contact_bank);?></a>
				<div class="separator-doubled"></div>
				<div class="fluid-layout">
					<div class="layout-span9">
						<div class="widget-layout">
							<div class="widget-layout-title">
								<h4><?php _e( "How to Setup Contact Bank?", contact_bank ); ?></h4>
							</div>
							<div class="widget-layout-body">
								<iframe width="560" height="315" src="//www.youtube.com/embed/EcqbsXmPbaI" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
					<div class="layout-span3">
						<div class="widget-layout">
							<div class="widget-layout-title">
								<h4><?php _e('Server Settings', contact_bank); ?></h4>
							</div>
							<div class="widget-layout-body">
								<ul class="settings">
									<?php
										global $wpdb;
										// Get MYSQL Version
										$sql_version = $wpdb->get_var("SELECT VERSION() AS version");
										// GET SQL Mode
										$my_sql_info = $wpdb->get_results("SHOW VARIABLES LIKE 'sql_mode'");
										if (is_array($my_sql_info)) $sqlmode = $my_sql_info[0]->Value;
										if (empty($sqlmode)) $sqlmode = __('Not set', 'contact_bank');
										// Get PHP Safe Mode
										if(ini_get('safemode')) $safemode = __('On', 'contact_bank');
										else $safemode = __('Off', 'contact_bank');
										// Get PHP allow_url_fopen
										if(ini_get('allow-url-fopen')) $allowurlfopen = __('On', 'contact_bank');
										else $allowurlfopen = __('Off', 'contact_bank');
										// Get PHP Max Upload Size
										if(ini_get('upload_max_filesize')) $upload_maximum = ini_get('upload_max_filesize');
										else $upload_maximum  = __('N/A', 'contact_bank');
										// Get PHP Output buffer Size
										if(ini_get('pcre.backtrack_limit')) $backtrack_lmt = ini_get('pcre.backtrack_limit');
										else $backtrack_lmt = __('N/A', 'contact_bank');
										// Get PHP Max Post Size
										if(ini_get('post_max_size')) $post_maximum = ini_get('post_max_size');
										else $post_maximum = __('N/A', 'contact_bank');
										// Get PHP Max execution time
										if(ini_get('max_execution_time')) $maximum_execute = ini_get('max_execution_time');
										else $maximum_execute = __('N/A', 'contact_bank');
										// Get PHP Memory Limit
										if(ini_get('memory_limit')) $memory_limit = ini_get('memory_limit');
										else $memory_limit = __('N/A', 'contact_bank');
										// Get actual memory_get_usage
										if (function_exists('memory_get_usage')) $memory_usage = round(memory_get_usage() / 1024 / 1024, 2) . __(' MByte', 'contact_bank');
										else $memory_usage = __('N/A', 'contact_bank');
										// required for EXIF read
										if (is_callable('exif_read_data')) $exif = __('Yes', 'contact_bank'). " ( V" . substr(phpversion('exif'),0,4) . ")" ;
										else $exif = __('No', 'contact_bank');
										// required for meta data
										if (is_callable('iptcparse')) $iptc = __('Yes', 'contact_bank');
										else $iptc = __('No', 'contact_bank');
										// required for meta data
										if (is_callable('xml_parser_create')) $xml = __('Yes', 'contact_bank');
										else $xml = __('No', 'contact_bank');
									?>
										<li><strong><?php _e('Operating System', 'contact_bank'); ?> : </strong> <span><?php echo PHP_OS; ?>&nbsp;(<?php echo (PHP_INT_SIZE * 8) ?>&nbsp;Bit)</span></li>
										<li><strong><?php _e('Server', 'contact_bank'); ?> : </strong> <span><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></span></li>
										<li><strong><?php _e('Memory usage', 'contact_bank'); ?> :</strong> <span><?php echo $memory_usage; ?></span></li>
										<li><strong><?php _e('MYSQL Version', 'contact_bank'); ?> : </strong> <span><?php echo $sql_version; ?></span></li>
										<li><strong><?php _e('SQL Mode', 'contact_bank'); ?> : </strong> <span><?php echo $sqlmode; ?></span></li>
										<li><strong><?php _e('PHP Version', 'contact_bank'); ?> : </strong> <span><?php echo PHP_VERSION; ?></span></li>
										<li><strong><?php _e('PHP Safe Mode', 'contact_bank'); ?> : </strong> <span><?php echo $safemode; ?></span></li>
										<li><strong><?php _e('PHP Allow URL fopen', 'contact_bank'); ?> : </strong> <span><?php echo $allowurlfopen; ?></span></li>
										<li><strong><?php _e('PHP Memory Limit', 'contact_bank'); ?> : </strong> <span><?php echo $memory_limit; ?></span></li>
										<li><strong><?php _e('PHP Max Upload Size', 'contact_bank'); ?> : </strong> <span><?php echo $upload_maximum; ?></span></li>
										<li><strong><?php _e('PHP Max Post Size', 'contact_bank'); ?> : </strong> <span><?php echo $post_maximum; ?></span></li>
										<li><strong><?php _e('PCRE Backtracking Limit', 'contact_bank'); ?> : </strong> <span><?php echo $backtrack_lmt; ?></span></li>
										<li><strong><?php _e('PHP Max Script Execute Time', 'contact_bank'); ?> : </strong> <span><?php echo $maximum_execute; ?>s</span></li>
										<li><strong><?php _e('PHP Exif support', 'contact_bank'); ?> : </strong> <span><?php echo $exif; ?></span></li>
										<li><strong><?php _e('PHP IPTC support', 'contact_bank'); ?> : </strong> <span><?php echo $iptc; ?></span></li>
										<li><strong><?php _e('PHP XML support', 'contact_bank'); ?> : </strong> <span><?php echo $xml; ?></span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="layout-span3" style="float: right;">
						<div class="widget-layout">
							<div class="widget-layout-title">
								<h4><?php _e('Graphic Library Settings', contact_bank); ?></h4>
							</div>
							<div class="widget-layout-body">
								<ul class="settings">
									<?php
									if(function_exists("gd_info"))
									{
										$information = gd_info();
										$key = array_keys($information);
										for($i=0; $i<count($key); $i++) 
										{
											
											if(is_bool($information[$key[$i]]))
											echo "<li> <strong> " . $key[$i] ." : </strong> <span>" . ngg_gd_yesNo($information[$key[$i]]) . " </span></li>\n";
											else
											echo "<li><strong> " . $key[$i] ." : </strong>  <span>" . $information[$key[$i]] . "</span></li>\n";
										}
									}
									else 
									{
										echo '<h4>'.__('No GD support', contact_bank).'!</h4>';
									}
									function ngg_gd_yesNo( $bool )
									{
										if($bool)
											return __('Yes', contact_bank);
										else
										return __('No', contact_bank);
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
