<?php

/**
 * Adds Facebook Domain Insights output to SiteTree.
 *
 * @package silverstripe-seo
 * @subpackage facebook-domain-insights
 * @author Andrew Gerber <atari@graphiquesdigitale.net>
 * @version 1.0.0
 *
 */
class SEO_FacebookDomainInsights_SiteTree_DataExtension extends DataExtension
{


    /* Overload Model
    ------------------------------------------------------------------------------*/

    // none


    /* Overload Methods
    ------------------------------------------------------------------------------*/

    // none


    /* Template Methods
    ------------------------------------------------------------------------------*/

    /**
     * @param SiteConfig $config
     * @param SiteTree $owner
     * @param string $metadata
     *
     * @return void
     *
     */
    public function updateMetadata(SiteConfig $config, SiteTree $owner, &$metadata)
    {

        // Facebook App ID
        if ($config->FacebookAppID) {

            $metadata .= $owner->MarkupComment('Facebook Insights');
            $metadata .= $owner->MarkupFacebook('fb:app_id', $config->FacebookAppID, false);

            // Admins (if App ID)
            foreach ($config->FacebookAdmins() as $admin) {
                if ($admin->FacebookProfileID) {
                    $metadata .= $owner->MarkupFacebook('fb:admins', $admin->FacebookProfileID, false);
                }
            }

        }

    }

}
