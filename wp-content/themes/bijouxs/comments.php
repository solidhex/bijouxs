<?php
/**
 * @package WordPress
 * @subpackage Bijouxs
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=twentyten_comment'); ?>
	</ol>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>
	
<h3 id="reply-title">Leave A Comment</h3>	

<div id="respond">

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p id="logged_in">You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p id="logged_in">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<p>
<input type="text" name="author" id="author" class="txt <?php if (esc_attr($comment_author) == '') { echo "clear_default"; } else { echo "skipme"; } ?>" value="<?php if ( esc_attr($comment_author) != '') { echo esc_attr($comment_author); } else { echo "Name*"; } ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
</p>

<p>
<input type="text" class="txt <?php if (esc_attr($comment_author_email) == '') { echo "clear_default"; } else { echo "skipme"; } ?>" name="email" id="email" value="<?php if ( esc_attr($comment_author_email) != '') { echo esc_attr($comment_author_email); } else { echo "Email Address* (won’t be published)"; } ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
</p>

<p>
<input type="text" class="txt <?php if (esc_attr($comment_author_url) == '') { echo "clear_default"; } else { echo "skipme"; } ?>" name="url" id="url" value="<?php if ( esc_attr($comment_author_url) != '') { echo esc_attr($comment_author_url); } else { echo "Website (optional)"; } ?>" size="22" tabindex="3" />
</p>

<?php endif; ?>

<textarea name="comment" class="clear_default" id="comment" cols="10" rows="10" tabindex="4">Comment*</textarea>
<div class="reqd_fields">* Indicates a required field.</div>
<input type="image" name="submit" class="rollo" value="Submit Comment" src="<?php echo get_bloginfo('template_directory') ?>/images/submit_comment.jpg" id="submit" />
<?php comment_id_fields(); ?>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
