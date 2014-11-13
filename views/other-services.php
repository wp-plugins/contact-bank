<?php 
switch($cb_role)
{
	case "administrator":
		$user_role_permission = "manage_options";
	break;
	case "editor":
		$user_role_permission = "publish_pages";
	break;
	case "author":
		$user_role_permission = "publish_posts";
	break;
	case "contributor":
		$user_role_permission = "edit_posts";
	break;
	case "subscriber":
		$user_role_permission = "read";
	break;
}
if (!current_user_can($user_role_permission))
{
	return;
}
else
{
	?>
	<form id="frm_other_services" class="layout-form">
		<div id="poststuff" style="width: 99% !important;">
			<div id="post-body" class="metabox-holder">
				<div id="postbox-container-2" class="postbox-container">
					<div id="advanced" class="meta-box-sortables">
						<div id="contact_bank_get_started" class="postbox" >
							<div class="handlediv" data-target="ux_other_services" title="Click to toggle" data-toggle="collapse"><br></div>
							<h3 class="hndle"><span><?php _e("Our Other Services", contact_bank); ?></span></h3>
							<div class="inside">
								<div id="ux_other_services" class="contact_bank_layout">
									<a class="btn btn-info" href="admin.php?page=dashboard"><?php _e("Back to Dashboard", contact_bank);?></a>
									<div class="separator-doubled"></div>
									<div class="fluid-layout ">
										<div class="layout-span12">
											<div class="framework_tabs">
												<ul class="framework_tab-links">
													<li class="active">
														<a href="#WordPress_services"><?php _e("WordPress", contact_bank); ?></a>
													</li>
													<li>
														<a href="#websites_programming"><?php _e("Websites & Programming", contact_bank); ?></a>
													</li>
													<li>
														<a href="#ecommerce"><?php _e("E-Commerce", contact_bank); ?></a>
													</li>
													<li>
														<a href="#designs_graphics"><?php _e("Designs & Graphics", contact_bank); ?></a>
													</li>
													<li>
														<a href="#company_brand"><?php _e("Company Branding ", contact_bank); ?></a>
													</li>
												</ul>
												<div class="framework_tab-content">
													<div id="WordPress_services" class="framework_tab active">
														<div class="wp-list-table plugin-install">
															<div id="the-list">
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WordPress Theme Installation & Demo Setup ( + Logo + Plugins + Optimization + Security)", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																			<?php _e("We are specialized in WordPress Theme Installation, which includes :", contact_bank); ?>
																				<ul style="margin-left:20px;">
																					<li>
																						<?php _e("Installation of your purchased Theme.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We cover various areas such as Personal Websites, Business Websites and much more.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-theme-installation-demo-setup/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 50 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 2 Business Days and upto 5 Revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WordPress Website Migration, Backup & Restore", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("With Hundreds of Migrations under our belt, you can trust us.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We can transfer your WordPress site to a new Host/Domain in 1 Business Day.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We will make sure everything is transferred and works properly.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-migration-transfer-service-backup-restore/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 50 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 1 Business Day.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WordPress Virus Removal Services & Security Review", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We will review the Security of your Website and make necessary changes as required.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We will run virus scans and delete viruses and malicious softwares found.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("A detailed report would be submitted once we finish our job.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-virus-removal-services-security-review/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 50 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 2 Business Days.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WordPress Plugin Customization", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can customize your existing WordPress Plugin to match your goals.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We will modify existing code with some new or modified features as required.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We will make sure all functionality works properly once the customization is complete.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-plugin-customization/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("Expert Custom WordPress Plugin Development", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are a Team of Experts in developing Custom WordPress Plugins.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Our Goal is to provide you with the best, optimized and satisfactory results to your development needs.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We ensure you with clean and optimized code increasing your plugin's efficiency.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/expert-custom-wordpress-plugin-development/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 800 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("WordPress SEO Optimization", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can Increase your site's traffic by improving search engine results.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We will perform some actions such as HTML, CSS & JS Minification, Improve basic load time, Optimize images for SEO etc. to enhance your WordPress Website Speed.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("A detailed report would be submitted once we finish our job.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-seo-optimization/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 100 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("HTML to WordPress", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can convert your HTML into WordPress Theme as needed.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We will provide you the User friendly Interface for Managing contents with an easily understandable documentation.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We ensure you the clean and optimized code increasing your theme's efficiency.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/html-wordpress/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("PSD to WordPress (Responsive)", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can convert your PSD Design into WordPress Theme as required.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("The code would be fully Responsive, Optimized and Cross Browser Compatible.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("A detailed report would be submitted once we finish our job.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/psd-wordpress-responsive/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 800 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("WordPress Theme Customization", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("You will get a theme modified to match your goals. The .zip pack will contain modified installable WordPress Theme.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("This is a completed website on a working host loaded with custom contact forms, SEO configuration & Page Speed Optimization.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-theme-customization/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and 5 Revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WordPress Theme Development", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can professionally develop a responsive WordPress theme which would be unique for your company.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("It would be compatible with all web browsers, Optimized for small screen devices, Professional coding and SEO friendly.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-theme-development/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="vers column-rating">
																			
																		</div>
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 800 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="designs_graphics" class="framework_tab">
														<div class="wp-list-table  plugin-install">
															<div id="the-list">
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("Creative & Professional Brochure Design", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("Our goal is to produce professional, amazing and high quality brochure designs to target your customers.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("The brochure could be Bi-fold, Trifold or Multi-page as per your requirement. ", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Design brochures in any style to advertise your business, product or services.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/creative-professional-brochure-design/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 400 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 Revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("E-Books & Digital Design ", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("Provide you with unique concepts and eye-catching E-Book designs.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("100% satisfaction is guaranteed with the concept and designs provided for your company.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Send us the designs which you like and dislike which help us to gauge a style which suit your needs.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/e-books-digital-design/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 400 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and 5 Revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("Photo Customization", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can retouch or manipulate the Graphics for you easily as required.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Customizations could be: redesign, color correction and retouch for the existing Photos or Graphics.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Best quality Photos are delivered in the format like jpg, png, tiff, PDF and PSD with transparent background, to make it flexible.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/photo-customization/" target="_blank"><?php _e("Order Now", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 400 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 5 Business Days and 3 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("Caricatures & Cartoon Design", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can design the most creative Caricatures and Cartoon for your business, advertisement, or mobile game.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We focus on colors, line qualities and styles to describe our character and design to make it flexible.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Designs can be delivered in JPEG, PNG and PSD with transparent background, to make it easier to apply on graphic material. ", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/caricatures-cartoon-design/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 7 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("App Icon Design", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We design own unique app icon that will really make your app extra special!", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Our goal is to give your app a professional look with a great and original icon.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Let us know any ideas you may have in mind, it would help us to fulfill your requirements easily.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/app-icon-design/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("Label & Packaging Design", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("Complete packaging design solution for your products such as Labels, packs, bags and much more.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Unique and original design to suite your needs, products and target consumers.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("The final product will be delivered to you in AI, EPS, PSD or PDF format, all editable.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/label-packaging-design/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("CD Cover Artwork", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("Professionally and Creatively designed CD Artwork & Designs are available here.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We provide you with original cover artwork, with multiple formats and if desired multiple dimensions too.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Tell us some ideas and preferences so that we can meet your needs. ", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/cd-cover-artwork/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("Banner Design & Customization", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We customize from existing banner templates or start banner making from scratch as required.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("The final product is delivered in the format like jpg, png and PSD with transparent background, to make it flexible with other graphics.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/banner-design-customization/" target="_blank"><?php _e("Order Now", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="websites_programming" class="framework_tab">
														<div class="wp-list-table  plugin-install">
															<div id="the-list">
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("Website Design & Development", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We design and develop professional websites with pixel perfect work and guaranteed satisfaction.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We provide high quality and responsive Website designs that represents perfect image to your customers.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("With our experience you will get creative designs unique to your needs.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/website-design-development/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 800 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("Website Re-design & Customization", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can re-design your website to give it a unique and attractive look.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("100% satisfaction is guaranteed with the concept and designs provided.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("For Modifications of layout and design, send us the ideas which would help us to meet your needs.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/website-redesign-customization/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("Landing Page Design & Development", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can Design and Develop unique home page which is related to creativity and expression of ideas ", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("The professional custom design, created by considering all your requirements and adapted to all your needs", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Final Product as Organized & grouped layered PSD file, JPG or PNG file and Optimized Code with friendly services.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/landing-page-design-development/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 800 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("PHP Programming & Web Development", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are PHP experts ready to work on your project and provides you with SQL Injection Security Protection.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Creation of any php script with secure and optimized code, integration on your project and compatible with your needs.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We will make sure all the functionality and features works properly once the development process is completed.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/php-programming-web-development/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 800 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("Server Configuration & Management", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are here to install, manage or optimize your server efficiently.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We specialize in Cpanel Server Management, Website Migration to new dedicated server and much more.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Also, we can Install a Corn Job to Check yours Databases and Tables as needed.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/server-configuration-management/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("Bug Fixes & Error Handling", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are specialized into Website Troubleshooting which includes:", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("PHP errors, Database errors, JavaScript errors and CSS errors and much more.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Provide us the detailed description of issue with the error messages or log files to speed up the fix process.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/bug-fixes-error-handling/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 300 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e(".Net Programming & Development", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are expertise to develop perfect .NET product and can deliver real worth to you in succinct solution.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Our Service includes: .NET Application Migration, Custom .NET Programming, .NET Web Services Development and .NET Ecommerce Solutions.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/net-programming-develpoment/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 2000 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 30 Business Days and upto 10 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("Desktop Application Development & Customization", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are into Windows Software Development over years with our extensive development exposure.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We have great experience in developing desktop applications using wide range of technologies.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Provide us the detailed description of your project to meet your needs.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/desktop-applications/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 2000 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 30 Business Days and upto 10 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="company_brand" class="framework_tab">
														<div class="wp-list-table  plugin-install">
															<div id="the-list">
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("Professional Logo Design", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are here to create your brand with Unique, Creative and Professional Logo Designs which suits your requirement.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Logos would be in different file formats such as .ai, .eps, .psd, .pdf, jpg and transparent .png", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e(" We hand over 100% Copyrights to the final logo designs.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/company-branding/professional-logo-design/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 5 Business Days and upto 3 Revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("Logo Customization", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can redesign your existing logos to give it a unique and attractive look.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We guaranteed 100% satisfaction with the concept and designs provided for the Company.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("For Modifications of concept and design, send us the ideas which would help us to meet your needs.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/company-branding/logo-customization/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="vers column-rating">
																			
																		</div>
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 5 Business Days and 3 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("Stunning Flyer Design", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can design unique flyer designs to get your name and logo in the market.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("The Designs would be creative, professional and eye-catching to attract your customers.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Let us know any ideas you may have in mind, it would help us to fulfill your requirements easily.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/company-branding/stunning-flyer-design/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="vers column-rating">
																			
																		</div>
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 8 Business Days and upto 5 Revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3><?php _e("Brand Stationery Design", contact_bank); ?></h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are experts in creating professional and unique Design package that includes:", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Custom Business Card, Letterhead and Envelope Design which are compatible with your needs.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We focuses on creating a robust brand image and converting Strangers into your Customers!", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?></a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/company-branding/brand-stationery-design/" target="_blank"><?php _e("Read More", contact_bank); ?></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong>
																			<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="ecommerce" class="framework_tab">
															<div class="wp-list-table  plugin-install">
															<div id="the-list">
																
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WooCommerce Service Addition (+Theme Installation + Theme Customization + Payment Gateway Setup)", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are here to add products to your existing website, increasing the market value of your business.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We also offer you with WooCommerce Theme Installation, Theme Customization and Payment Gateway Setup for website.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-service-addition/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 100 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 2 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WooCommerce Theme Development", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("Our goal is to provide you with Professional and Unique WordPress WooCommerce Theme.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("The code would be fully Responsive, Optimized and supports Cross Browser Compatible, increasing market targets.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We have ability to provide the best ecommerce solutions for your business.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-theme-development/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 800 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WooCommerce Theme Customization", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are here to customize your theme to match your requirements.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Our goal is to give your theme a unique and professional look with great features and functionality.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Let us know some ideas and preferences so that we can meet your needs.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-theme-customization/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="vers column-rating">
																		</div>
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WooCommerce Plugin Development", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("A team of WordPress Experts, now offering WooCommerce Plugin development.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We provide high quality plugin and ensure you with proper working functionality.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("A detailed report with documentation would be submitted once we finish the development process.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-plugin-development/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 800 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WooCommerce Plugin Customization", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We can integrate and customize WooCommerce plugin with additional functionalities to meet your demands.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We will ensure that all functionality works properly with complete optimization and documentation once the customization is complete.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-plugin-customization/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 500 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 8 Business Days and upto 4 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WooCommerce Plugin Installation & Optimization", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are specialized in WooCommerce Plugin Installation, which includes :", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Installation and Optimization of your purchased WooCommerce Plugin.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We guarantee you with 100% satisfaction with the results as per your requirement to match your goals and market demands.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-plugin-installation-optimization/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 300 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 5 Business Days and upto 3 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																
																
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("WooCommerce Payment Gateway Integration", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("Provide you with Default Payment Gateway integration such as PayPal, Bank Transfer, Credit Card and much more.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("Let us know, if you need any other type of Payment Gateway Integration with your website for your customers.", contact_bank); ?>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-payment-gateway-integration/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 400 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 5 Business Days and upto 3 revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
																<div class="service-div-settings">
																	<div class="service-div-settings-top">
																		<div class="service-div-inner-content">
																			<div class="name column-name">
																				<h3>
																					<?php _e("Complete Shopping Cart Setup", contact_bank); ?>
																				</h3>
																			</div>
																			<div class="desc column-description">
																				<ul>
																					<li>
																						<?php _e("We are specialized in setting up complete shopping cart for your website.", contact_bank); ?>
																					</li>
																					<li>
																						<?php _e("We provide you with basic uploading of files and making the database connection to a complete store set up, we have packages to meet your needs.", contact_bank); ?>
																					</li>
																					
																				</ul>
																			</div>
																		</div>
																		<div class="action-links">
																			<ul class="plugin-action-buttons-custom">
																				<li>
																					<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", contact_bank); ?>
																					</a>
																					<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/complete-shopping-cart-setup/" target="_blank"><?php _e("Read More", contact_bank); ?>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="plugin-card-bottom_settings">
																		<div class="column-downloaded">
																			<strong><?php _e("Cost of this Service is 800 Pounds.", contact_bank); ?></strong><br/>
																			<span><?php _e("The Time Frame would be 10 Business Days and upto 5 Revisions.", contact_bank); ?></span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
	jQuery(".framework_tabs .framework_tab-links a").on("click", function(e)
		{
			var currentAttrValue = jQuery(this).attr("href");
			// Show/Hide Tabs
			jQuery(".framework_tabs " + currentAttrValue).show().siblings().hide();
			// Change/remove current tab to active
			jQuery(this).parent("li").addClass("active").siblings().removeClass("active");
			e.preventDefault();
		});
	</script>
<?php 
}
?>		