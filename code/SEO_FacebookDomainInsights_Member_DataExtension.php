<?php

/**
 * Adds Facebook Domain Insight data to Member.
 *
 * @package silverstripe-seo
 * @subpackage facebook-domain-insights
 * @author Andrew Gerber <atari@graphiquesdigitale.net>
 * @version 1.0.0
 *
 */
class SEO_FacebookDomainInsights_Member_DataExtension extends DataExtension
{

    /* Overload Variable
     ------------------------------------------------------------------------------*/

    private static $db = array(
        'FacebookProfileID' => 'Varchar(16)',
    );
    private static $has_one = array(
        'FacebookAdmin' => 'SiteConfig',
    );


    /* Overload Methods
    ------------------------------------------------------------------------------*/

    // updateCMSFields
    public function updateCMSFields(FieldList $fields)
    {

        // configuration
        $tab = 'Root.SEO';

        // author
        $fields->addFieldsToTab($tab, array(
            TextField::create('FacebookProfileID', 'Facebook Profile ID') // @todo validation
        ));

        // remove FacebookAdmin from user profile
        $fields->removeByName('FacebookAdminID');

    }

}
