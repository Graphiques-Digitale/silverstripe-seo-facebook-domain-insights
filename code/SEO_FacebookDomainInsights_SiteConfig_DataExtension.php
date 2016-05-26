<?php

/**
 * Adds Facebook Domain Insights settings to SiteConfig.
 *
 * @package silverstripe-seo
 * @subpackage facebook-domain-insights
 * @author Andrew Gerber <atari@graphiquesdigitale.net>
 * @version 1.0.0
 *
 */

class SEO_FacebookDomainInsights_SiteConfig_DataExtension extends DataExtension {


	/* Overload Model
	------------------------------------------------------------------------------*/

	private static $db = array(
		'FacebookAppID' => 'Varchar(16)',
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

		// tab
		$tab = 'Root.SEO.FacebookDomainInsights';

		// add fields
		$fields->addFieldsToTab($tab, array(
			TextField::create('FacebookAppID', 'Facebook Application ID'), // @todo validation
			GridField::create('FacebookAdmins', 'Facebook Administrators', $owner->FacebookAdmins())
				->setConfig(GridFieldConfig_RelationEditor::create())
		));

	}

}
