<?php

// Get Attributes
extract(shortcode_atts(array(
	'email' => '',
    'class' => '',
    'style' => ''
), $atts));

// If the form is submitted
if ( isset($_POST['submitted']) && $_POST['submitted'] == true ) {
		
	$contactCheck = trim(htmlspecialchars($_POST['contactCheck'], ENT_QUOTES));
	$contactName = trim(htmlspecialchars($_POST['contactName'], ENT_QUOTES));
	$contactEmail = trim(htmlspecialchars($_POST['contactEmail'], ENT_QUOTES));
	$commentsText = trim(strip_tags($_POST['commentsText']));
	$sendCopy = trim(htmlspecialchars($_POST['sendCopy'], ENT_QUOTES));
		
	if ( $contactName == "" || $contactEmail == "" || $commentsText == "" ) {
			
		$error = true;
		$errormessage = __('All fields are required!', 'themes-plus');
		$contactName = "";
			
	} elseif ( filter_var( $contactEmail, FILTER_VALIDATE_EMAIL ) == false ) {
			
		$error = true;
		$errormessage = __('Please check your Email address!', 'themes-plus');
		$contactName = "";
		$contactEmail = "";
			
	} elseif ( $contactName != $contactCheck ) {
			
		$error = true;
		$errormessage = __('Please enter your name!', 'themes-plus');
		$contactName = "";
			
	} else {
			
		// If there is no error, send the email
		$subject = get_bloginfo('name') . " Contact form";
		$body = __('Name', 'themes-plus') . ": " . $contactName . "\r\n" . 
			__('Email', 'themes-plus') . ": " . $contactEmail . "\r\n" . 
			__('Message', 'themes-plus') . ":\r\n" . $commentsText . "\r\n";
		
		if( isset($sendCopy) && $sendCopy == true ) {
			$headers = "From: " . get_bloginfo('name') . "<" . preg_replace( "/(.*?)+@(.*?)+/i", "noreply@$1", get_bloginfo('admin_email') ) . ">";
			mail($contactEmail, $subject, $body, $headers); // Send a copy
		}
		
		if ( isset($email) && filter_var( $email, FILTER_VALIDATE_EMAIL ) != false ):
			$adminEmail = $email;
		else:
			$adminEmail = get_bloginfo('admin_email');
		endif;
		
		$subject =  $subject . " - " . $contactName;
		$headers = "From: " . $contactName . "<" . $contactEmail . ">";
		mail($adminEmail, $subject, $body, $headers); // Send to Admin
		
		$success = true;
			
		// Clear values: $contactName needed for confirmation!!!
		// $contactName = "";
		$contactEmail = "";
		$commentsText = "";
			
	}
		
} ?>
	
	<?php if ( isset($success) && $success == true ) : ?>
		<p class="alert alert-success"><?php echo __('Thanks, ', 'themes-plus') . $contactName . ". " . __('Your Email was successfully sent!', 'themes-plus'); ?></p>
	<?php elseif ( isset($error) && $error == true ) : ?>
		<p class="alert alert-danger"><?php echo __('There was an error sending your Email!', 'themes-plus') . " " . $errormessage; ?></p>
	<?php endif; ?>
		
	<form action="#" id="contactForm" method="post" class="row form-horizontal" role="form">
        
        <div class="<?php if ( isset($class) && $class != "" ): echo $class; else: echo 'col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3'; endif; ?>"<?php if ( isset($style) && $style != "" ): echo ' style="' . $style . '"'; endif; ?>>
            
            <input type="hidden" name="contactCheck" id="contactCheck" value="" />

            <div class="form-group">
                <input type="text" id="contactName" name="contactName" class="form-control" value="<?php if(isset($contactName)) echo $contactName; ?>" placeholder="<?php _e('Name', 'themes-plus'); ?>" required />
            </div>

            <div class="form-group">
                <input type="email" id="contactEmail" name="contactEmail" class="form-control" value="<?php if(isset($contactEmail)) echo $contactEmail; ?>" placeholder="<?php _e('Email', 'themes-plus'); ?>" required />
            </div>

            <div class="form-group">
                <textarea id="commentsText" name="commentsText" class="form-control" placeholder="<?php _e('Message', 'themes-plus'); ?>" rows="5" cols="10" required><?php if( isset($commentsText) ) { echo stripslashes($commentsText); } ?></textarea>
            </div>

            <div class="form-group">
                <div class="checkbox checkbox-custom">
                    <label>
                        <input type="checkbox" id="sendCopy" name="sendCopy" value="true"<?php if( isset($_POST['sendCopy']) && $_POST['sendCopy'] == true ) echo ' checked'; ?> /> <span><?php _e('Send a copy of this Email to yourself', 'themes-plus'); ?></span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" id="submitted" name="submitted" value="true" />
                <button type="submit" class="btn btn-default btn-lg"><?php _e('Send', 'themes-plus'); ?></button>
            </div>
            
        </div><!-- /.col -->
		
	</form>