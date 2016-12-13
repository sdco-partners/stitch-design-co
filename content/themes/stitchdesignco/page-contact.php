<?php

	$errors = array();
	$success = false;

	if ( isset($_POST['action']) && $_POST['action'] == 'contact' && !isset($_POST['hnypt'])) {


		$content = $_POST['contact'];

		if ($content['project_description'] == 'Project Description:') {
			$errors['project_description'] = 'This field is required.';
		}

		/*
		if (empty($content['projectType'])) {
			$errors['projectType'] = 'This field is required.';
		}
		*/

		if ($content['timeline'] == 'Timeline:') {
			$errors['timeline'] = 'This field is required.';
		}

		if ($content['budget'] == 'Budget:') {
			$errors['budget'] = 'This field is required.';
		}

		if ($content['email'] == 'Email:') {
			$errors['email'] = 'This field is required.';
		}

		if (empty($errors)) {

			unset($_POST['contact']);

			$to = array('inquiries@stitchdesignco.com','dev@stitchdesignco.com');

			$subject = 'Inquiry from Stitch';

			$headers = "From: Stitch Design Co <website@stitchdesignco.com>\r\n";
			$headers .= "Reply-To: ". $content['email'] . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$message = 'Description:<br>'.$content['project_description'];
			$message .= '<br><br>';
			$message .= 'Timeline: '.$content['timeline'];
			$message .= '<br><br>';
			$message .= 'Budget: '.$content['budget']; //added by bcb
			$message .= '<br><br>'; //added by bcb
			$message .= 'Email:<br>'.$content['email'];
			$message .= '<br><br>';
			$message .= 'Notes:<br>'.$content['additional_notes'];
			$message .= '<br><br>';
			$message .= 'Project Type: '.implode(', ', $content['projectType']);

			if (wp_mail($to, $subject, $message, $headers)) {
				$success = true;
			}

		}

	}
?>


<?php get_header(); ?>

<?php get_template_part('navigation') ?>
	<div id="container" style="padding-top: 206px;">
		<div id="contactContent">
			<section id="business">
				<div id="businessContent">
					<div id="businessLeft">
						<h3>Drop us a line.</h3>
						<p class="blurb">Please take a moment to let us know what brought you here – we’d love to hear more about you and the project(s) you have in mind.</p>
						<?php if ($success): ?>
							<p>Thank you! We’ll be in touch soon.</p>
						<?php else: ?>
							<form accept-charset="utf-8" id="contactForm" method="post">
								<input type="hidden" name="action" value="contact">
								<p>
									<textarea name="contact[project_description]" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">Project Description:</textarea>
									<?php if (isset($errors['project_description'])): ?>
										<br><span class="error"><?php echo $errors['project_description'] ?></span>
									<?php endif ?>
								</p>
								<div class="container">
									<div class="left">
										<h4>Project Type:</h4>
										<?php if (isset($errors['projectType'])): ?>
											<p><span class="error"><?php echo $errors['projectType'] ?></span></p>
										<?php endif ?>
										<?php
											$types = array(
												'Comprehensive Branding',
												'Branding with an existing logo',
												'Logo Only',
												'Strategy',
												'Consultation',
												'Company or Product Naming',
												'Packaging',
												'Web Design &amp; Development',
												'Print Design',
												'Copywriting',
												'Environmental Design',
												'Publication Design'
											);
										?>
										<?php $i=1;foreach ($types as $type): ?>
											<p><input type="checkbox" name="contact[projectType][]" id="projectType<?php echo $i ?>" <?php echo (in_array($type,(array)$_POST['contact']['projectType'])) ? 'checked="checked"' : '' ?> value="<?php echo $type ?>"><label for="projectType<?php echo $i ?>"><?php echo $type ?></label></p>
										<?php $i++;endforeach ?>
									</div>
									<div class="right">
										<p class="first">
											<input class="textField" type="text" name="contact[timeline]" value="<?php echo ($_POST['contact']['timeline']) ? $_POST['contact']['timeline'] : 'Timeline:' ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
											<?php if (isset($errors['timeline'])): ?>
												<br><span class="error"><?php echo $errors['timeline'] ?></span>
											<?php endif ?>
										</p>
										<p>
											<input class="textField" type="text" name="contact[budget]" value="<?php echo ($_POST['contact']['budget']) ? $_POST['contact']['budget'] : 'Budget:' ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
											<?php if (isset($errors['budget'])): ?>
												<br><span class="error"><?php echo $errors['budget'] ?></span>
											<?php endif ?>
										</p>
										<p>
											<input class="textField" type="text" name="contact[email]" value="<?php echo ($_POST['contact']['email']) ? $_POST['contact']['email'] : 'Email:' ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
											<?php if (isset($errors['email'])): ?>
												<br><span class="error"><?php echo $errors['email'] ?></span>
											<?php endif ?>
										</p>
										<p><textarea name="contact[additional_notes]" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">Additional Notes:</textarea></p>
										<p><input class="submitBtn" type="submit" name="contact[submit]" value="Submit"></p>
										<input type="hidden" id="hnypt" name="hnypt" value=":)">
									</div>
								</div>
							</form>
						<?php endif ?>
					</div>
					<div id="businessRight">
						<h4>Studio</h4>
						<p>121 Wentworth Street<br>Charleston, SC 29401</p>
						<h4 class="hr">Inquiries</h4>
						<p><a href="mailto:inquiries@stitchdesignco.com" title="inquiries@stitchdesignco.com">inquiries@stitchdesignco.com</a></p>
						<h4 class="hr">Ring</h4>
						<p>843 722 6296</p>
						<h5>For Press and Media Relations:<br>
						<a href="mailto:info@stitchdesignco.com" title="info@stitchdesignco.com">info@stitchdesignco.com</a></h5>
					</div>
				</div>
			</section>
			<section id="press">
				<div id="pressContent">
					<h2>Awards | Press</h2>
					<div id="pressRight">
						<div class="">
							<ul>
								<li>Communication Arts Design Annual</li>
								<li>PRINT Regional Design Annual</li>
								<li>HOW Magazine</li>
								<li>Communication Arts FRESH</li>
								<li>Monocle Magazine</li>
								<li>HOW Magazine - Best Work Awards</li>
								<li>Communication Arts Exhibit</li>
								<li>Graphic Exchange</li>
								<li>The Dieline</li>
								<li>Design Work Life</li>
								<li>Under Consideration - FPO</li>
							</ul>
						</div>
						<div class="">
							<ul>
								<li>Under Consideration - FPO Awards</li>
								<li>Logo Lounge 5</li>
								<li>Letterhead + Logo Design 12</li>
								<li>Design: Paper</li>
								<li>Gestalten Press: Impressive</li>
								<li>Gallery - The World’s Best Graphics Vol. 8</li>
								<li>AIGA InShow Awards</li>
								<li>Logo Lounge: Master Diary</li>
								<li>Logo Lounge 6</li>
								<li>NPR: South Carolina Business Review</li>
								<li>Post &amp; Courier</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<?php $jobs = new wp_query(array('post_type' => 'job','nopaging' => true)) ?>
			<section id="employment">
				<div id="employmentContent">
					<div id="employmentLeft">
						<h2>Jobs at Stitch</h2>
						<p>We are always looking for interesting and talented people to join our studio. We are currently looking for:</p>
						<ul>
							<?php if ( $jobs->have_posts() ) : while ( $jobs->have_posts() ) : $jobs->the_post(); ?>
								<li><a class="active" href="#<?php echo $post->post_name ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
							<?php endwhile; else: ?>
								<li><a class="active" href="#currently-no-open-positions" title="Currently No Open Positions">Currently No Open Positions</a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div id="employmentRight">
						<?php $jobIndex = 0; ?>
						<?php if ( $jobs->have_posts() ) : while ( $jobs->have_posts() ) : $jobs->the_post(); ?>
							<?php $jobIndex++; ?>
							<div class="description" id="<?php echo $post->post_name ?>" style="<?php if ($jobIndex != 1) { echo "display:none;"; } ?>">
								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>
								<p class="submit">Learn More: <a href="<?php the_field('pdf') ?>" target="_blank">Download Job Description</a></p>
								<p class="submit">Submit to: <a href="mailto:inquiries@stitchdesignco.com">inquiries@stitchdesignco.com</a></p>
							</div>
						<?php endwhile; else: ?>
							<div class="description" id="currently-no-open-positions">
								<h3>Currently No Open Positions</h3>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		</div>
<?php get_footer(); ?>
