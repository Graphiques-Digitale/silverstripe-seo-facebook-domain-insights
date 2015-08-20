<?php

/**
 * SEO_FacebookInsights_SiteTree_DataExtension
 *
 * @todo add description
 *
 * @package silverstripe-seo
 * @subpackage facebook-insights
 * @author Andrew Gerber <atari@graphiquesdigitale.net>
 * @version 1.0.0
 *
 * @todo lots
 *
 */

class SEO_FacebookInsights_Member_DataExtension extends DataExtension {

	/* Overload Variable
	 ------------------------------------------------------------------------------*/

	private static $db = array(
		'FacebookProfileID' => 'Varchar(128)',
	);
	private static $has_one = array(
		'FacebookAdmin' => 'SiteConfig',
	);


	/* Overload Methods
	------------------------------------------------------------------------------*/

	// CMS Fields
	public function updateCMSFields(FieldList $fields) {

		// Configuration
		$tab = 'Root.SEO';

		// Author
		$fields->addFieldsToTab($tab, array(
			TextField::create('FacebookProfileID', 'Facebook Profile ID')
		));

		/**
		 * @TODO ???
		 */
		// Facebook Administrators
// 		$tab = 'Root.SSSEO.Configuration';
// 		$fields->addFieldsToTab($tab, array(
// 			GridField::create('FacebookAdmin', 'Facebook Administrator', $this->owner->FacebookAdmin())
// 				->setConfig(GridFieldConfig_RelationEditor::create())
// 		));

	}

}