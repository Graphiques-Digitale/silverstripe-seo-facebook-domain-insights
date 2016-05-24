<?php

/**
 * @todo Adds Facebook Domain Insights output to SiteTree.
 *
 * @package silverstripe-seo
 * @subpackage facebook-domain-insights
 * @author Andrew Gerber <atari@graphiquesdigitale.net>
 * @version 1.0.0
 *
 */

class SEO_FacebookDomainInsights_SiteTree_DataExtension extends DataExtension {


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
	 * @param SiteConfig $config
	 * @param SiteTree $owner
	 * @param string $metadata
	 *
	 * @return string
	 *
	 */
	public function updateMetadata(SiteConfig $config, SiteTree $owner, &$metadata) {

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
