<?php
/**
 * @package WordPress
 * @subpackage Bijouxs
 */

/*
Template Name: Contact
*/

get_header();

?>

<div id="container">
	<div id="content" role="main">
		<div class="content_box_extend">
			<div class="content_box_bottom">
				<div class="content_box_top">
					<div class="gutter">
						<h2 id="hdr_contact_bijouxs">Contact Bijouxs</h2>
						<?php if (have_posts()): ?>
							<?php while(have_posts()): the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; else: ?>
								No content yet for this page.
						<?php endif ?>
						<?php
							if (array_key_exists('contact_submit', $_POST)) {

								// expected fields
								$expected = array('contact_name', 'contact_email', 'contact_subject', 'contact_message');

								// required fields
								$required = array('contact_name', 'contact_email', 'contact_subject', 'contact_message');

								// missing fields
								$errors = array();

								$suspect = false;
								$pattern = '/Content-Type:|Bcc:|Cc:/i';

								function isSuspect($val, $pattern, &$suspect)
								{
									if (is_array($val)) {
										foreach ($val as $item) {
											isSuspect($item, $pattern, $suspect);
										}
									}
									else {
										if (preg_match($pattern, $val)) {
											$suspect = true;
										}
									}
								}

								isSuspect($_POST, $pattern, $suspect);

								if ($suspect) {
									$mail = false;
									unset($missing);
								}

								if (!empty($contact_email)) {
									$checkEmail = '/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/';
									if (!preg_match($checkEmail, $contact_email)) {
										array_push($errors, 'contact_email');
									}
								}

								else {
									foreach ($_POST as $key => $value) {
										$temp = is_array($value) ? $value : trim($value);

										if (empty($temp) && in_array($key, $required)) {
											array_push($errors, $key);
										}
										elseif (in_array($key, $expected)) {
											${$key} = $temp;
										}
									}
								}

								if (!empty($contact_name) && $contact_name == 'Name*') {
									array_push($errors, 'contact_name');
								}

								if (!empty($contact_subject) && $contact_subject == 'Subject*') {
									array_push($errors, 'contact_subject');
								}

								if (!empty($contact_email) && $contact_email == 'Email Address*') {
									array_push($errors, 'contact_email');
								}

								if (!empty($contact_message) && $contact_message == 'Message*') {
									array_push($errors, 'contact_message');
								}

								if (!$suspect && empty($errors)) {

									// build the message
									$to = 'lynn@bijouxs.com';
									$subject = 'From website: ' . $contact_subject;

									$headers = "From: $contact_name <$contact_email>\r\n";
									$headers .= "Reply-To: $contact_email\r\n";
									$headers .= "Bcc: Patrick Jackson <patrick@solidhex.com>";

									$message = "Name: $contact_name\n\n";
									$message .= "Email: $contact_email\n\n";
									$message .= wordwrap($contact_message, 70);

									$mail = mail($to, $subject, $message, $headers);

									if ($mail) {
										unset($errors);
									}
								}
							}
						?>
						<?php if ($_POST && $mail): ?>
							<p>Thanks! Your message has been sent.</p>
						<?php else: ?>
								<form action="<?php echo get_permalink(6); ?>" method="post">
									<ul id="contact_formie">
										<li>
											<input type="text" class="clear_default<?php if (isset($errors) && in_array('contact_name', $errors)) { echo " hazerror"; }?>" name="contact_name" value="Name*" id="contact_name"/>
										</li>
										<li>
											<input type="text" class="clear_default<?php if (isset($errors) && in_array('contact_email', $errors)) { echo " hazerror"; }?>" name="contact_email" value="Email Address*" id="contact_email" />
										</li>
										<li>
											<input type="text" class="clear_default<?php if (isset($errors) && in_array('contact_subject', $errors)) { echo " hazerror"; }?>" name="contact_subject" value="Subject*" id="contact_subject" />
										</li>
										<li id="message_li">
											<textarea name="contact_message" class="clear_default<?php if (isset($errors) && in_array('contact_message', $errors)) { echo " hazerror"; }?>" rows="8" cols="40">Message*</textarea>
										</li>
										<li id="controls">
											<span id="indicates_required">
												* Indicates a required field.
											</span>
											<input type="image" class="rollo" name="contact_submit" value="submit" id="contact_submit" src="<?php echo get_bloginfo('template_directory') ?>/images/submit.jpg" />
										</li>
									</ul>
								</form>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>