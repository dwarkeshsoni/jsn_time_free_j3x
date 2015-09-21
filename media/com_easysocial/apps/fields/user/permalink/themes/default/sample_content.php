<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2013 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined( '_JEXEC' ) or die( 'Unauthorized Access' );
?>
<div data-field-permalink>
	<div class="input-append">
		<input type="text" class="input input-xlarge validation keyup length-4 required"
			name="username" value=""
			autocomplete="off"
			placeholder="<?php echo JText::_( 'PLG_FIELDS_PERMALINK_PLACEHOLDER' ); ?>" />

		<button type="button" class="btn" <?php if( !$params->get( 'check_permalink' ) ) { ?>style="display: none;"<?php } ?> data-check-permalink><?php echo JText::_( 'PLG_FIELDS_PERMALINK_CHECK_BUTTON' );?></button>
	</div>
</div>
