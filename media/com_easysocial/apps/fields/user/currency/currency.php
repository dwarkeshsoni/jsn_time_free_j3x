<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2012 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined( '_JEXEC' ) or die( 'Unauthorized Access' );

// Include the fields library
Foundry::import( 'admin:/includes/fields/fields' );

// Include helper library
require_once( dirname( __FILE__ ) . '/helper.php' );

/**
 * Field application for Currency
 *
 * @since	1.0
 * @author	Mark Lee <mark@stackideas.com>
 */
class SocialFieldsUserCurrency extends SocialFieldItem
{
	/**
	 * Class constructor.
	 *
	 * @since	1.0
	 */
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * Displays the field input for user when they register their account.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	array
	 * @param	SocialTableRegistration
	 * @return	string	The html output.
	 *
	 * @author	Mark Lee <mark@stackideas.com>
	 */
	public function onRegister( &$post, &$registration )
	{
		// Get the currency to use.
		$dollarsLabel	= SocialFieldsUserCurrencyHelper::getLabel( $this->params , 'DOLLARS' );
		$centsLabel		= SocialFieldsUserCurrencyHelper::getLabel( $this->params , 'CENTS' );
		$unitsLabel		= SocialFieldsUserCurrencyHelper::getLabel( $this->params , 'UNIT' );

		$dollar = '';
		$cent = '';

		// Get value for this field
		if( isset( $post[$this->inputName] ) )
		{
			$data = $this->getCurrencyValue( $post[$this->inputName] );
			$dollar = $data->dollar;
			$cent = $data->cent;
		}

		// Get any errors for this field.
		$error		= $registration->getErrors( $this->inputName );

		// Push to template
		$this->set( 'error'			, $error );
		$this->set( 'unitsLabel'	, $unitsLabel );
		$this->set( 'dollarsLabel'	, $dollarsLabel );
		$this->set( 'centsLabel'	, $centsLabel );
		$this->set( 'dollar'		, $this->escape( $dollar ) );
		$this->set( 'cent'			, $this->escape( $cent ) );

		// Display the output.
		return $this->display();
	}

	/**
	 * Displays the field input for user when they edit their account.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	array
	 * @param	SocialTableRegistration
	 * @return	string	The html output.
	 *
	 * @author	Mark Lee <mark@stackideas.com>
	 */
	public function onEdit( &$post, &$user, $errors )
	{
		// Get the currency to use.
		$dollarsLabel	= SocialFieldsUserCurrencyHelper::getLabel( $this->params , 'DOLLARS' );
		$centsLabel		= SocialFieldsUserCurrencyHelper::getLabel( $this->params , 'CENTS' );
		$unitsLabel		= SocialFieldsUserCurrencyHelper::getLabel( $this->params , 'UNIT' );

		$dollar = '';
		$cent = '';

		// Get value for this field
		if( isset( $post[$this->inputName] ) )
		{
			$data = $this->getCurrencyValue( $post[$this->inputName] );
			$dollar = $data->dollar;
			$cent = $data->cent;
		}
		else
		{
			$data = Foundry::json()->decode( $this->value );
			$dollar = isset( $data->dollar ) ? $data->dollar : '';
			$cent = isset( $data->cent ) ? $data->cent : '';
		}

		$error = $this->getError( $errors );

		// Push to template
		$this->set( 'error'			, $error );
		$this->set( 'unitsLabel'	, $unitsLabel );
		$this->set( 'dollarsLabel'	, $dollarsLabel );
		$this->set( 'centsLabel'	, $centsLabel );
		$this->set( 'dollar'		, $this->escape( $dollar ) );
		$this->set( 'cent'			, $this->escape( $cent ) );

		return $this->display();
	}

	/**
	 * Displays the sample html codes when the field is added into the profile.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	array
	 * @param	SocialTableRegistration
	 * @return	string	The html output.
	 *
	 * @author	Mark Lee <mark@stackideas.com>
	 */
	public function onSample()
	{
		$dollarsLabel	= SocialFieldsUserCurrencyHelper::getLabel( $this->params , 'DOLLARS' );
		$centsLabel		= SocialFieldsUserCurrencyHelper::getLabel( $this->params , 'CENTS' );
		$unitsLabel		= SocialFieldsUserCurrencyHelper::getLabel( $this->params , 'UNIT' );

		$this->set( 'unitsLabel'	, $unitsLabel );
		$this->set( 'dollarsLabel'	, $dollarsLabel );
		$this->set( 'centsLabel'	, $centsLabel );

		return $this->display();
	}

	private function getCurrencyValue( $data )
	{
		$newData = new stdClass();

		$newData->dollar = isset( $data->dollar ) ? $data->dollar : '';
		$newData->cent = isset( $data->cent ) ? $data->cent : '';

		return $newData;
	}
}
