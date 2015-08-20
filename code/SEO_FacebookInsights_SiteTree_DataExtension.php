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

class SEO_FacebookInsights_SiteTree_DataExtension extends DataExtension {


	/* Overload Variable
	------------------------------------------------------------------------------*/

	// none


	/* Overload Methods
	------------------------------------------------------------------------------*/

	// CMS Fields
// 	public function updateCMSFields(FieldList $fields) {}


	/* Template Methods
	------------------------------------------------------------------------------*/

	/**
	 * @name Metadata
	 */
	public function updateMetadata(&$metadata, $owner, $config) {

		// variables
// 		$config = SiteConfig::current_site_config();
// 		$owner = $this->owner;

		// Facebook App ID
		if ($config->FacebookAppID) {

			$metadata .= $owner->MarkupHeader('Facebook Insights');
			$metadata .= $owner->MarkupFacebook('fb:app_id', $config->FacebookAppID, false);

			// Admins (if App ID)
			foreach ($config->FacebookAdmins() as $admin) {
				if ($admin->FacebookProfileID) {
					$metadata .= $owner->MarkupFacebook('fb:admins', $admin->FacebookProfileID, false);
				}
			}

		}

		// return
		return $metadata;

	}

}