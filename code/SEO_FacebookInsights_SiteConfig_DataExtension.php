<?php

/**
 * SEO_FacebookInsights_SiteConfig_DataExtension
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

class SEO_FacebookInsights_SiteConfig_DataExtension extends DataExtension {


	/* Overload Model
	------------------------------------------------------------------------------*/

	private static $db = array(
		'FacebookAppID' => 'Varchar(128)',
	);
	private static $has_many = array(
		'FacebookAdmins' => 'Member',
	);


	/* Overload Methods
	------------------------------------------------------------------------------*/

	// CMS Fields
	public function updateCMSFields(FieldList $fields) {

		// owner
		$owner = $this->owner;

		//// Facebook Insights

		$tab = 'Root.SEO.FacebookInsights';

		// add
		$fields->addFieldsToTab($tab, array(
			TextField::create('FacebookAppID', 'Facebook Application ID'),
			GridField::create('FacebookAdmins', 'Facebook Administrators', $owner->FacebookAdmins())
				->setConfig(GridFieldConfig_RelationEditor::create())
		));

	}

}