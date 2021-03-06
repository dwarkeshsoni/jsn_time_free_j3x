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
<div data-field-terms>
	<div>
		<textarea class="full-width es-terms-field small" disabled="disabled" data-field-terms-textbox><?php echo $params->get( 'message' , JText::_( 'PLG_FIELDS_TERMS_CONDITION_MESSAGE_TERMS' ) );?></textarea>
	</div>
	<div class="mt-5 terms-checkbox">
		<label class="checkbox" for="terms-<?php echo $inputName;?>">
			<input type="checkbox" id="terms-<?php echo $inputName;?>" name="<?php echo $inputName;?>" data-field-terms-checkbox /> <?php echo JText::_( 'PLG_FIELDS_TERMS_ACCEPT_TERMS' );?>
		</label>
	</div>
</div>
