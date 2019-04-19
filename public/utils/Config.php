<?php

      /*
      ** This Configuration file controls the whole page,
      ** and should be editted with caution!
      ** This retrieves information from the API (if available),
      ** so these are only the defaults.
      ** It is recommended to have 'site_maintenance_mode' as true,
      ** so in case of DB/API disfunctionality, the site will 
      ** remain in maintenance mode, and without any errors.
      */  

      $config = [
            //'site_maintenance_mode' =>  false,
            'maintenance_url' =>  '/views/under_maintenance/index.php',
            'timezone' =>  'Europe/Athens',
            'seconds_between_login_tries' =>  6,
            'seconds_first_login_try' => 5,
            'version' => 'v18.12.16',
            'header_title' => 'ZAZU Portal',
            'show_contact_form'=>false,

            // Default API Portal Replacements
            'nav_title' => 'KOTOULAS ENERGY S.A.',
            'header_title' => 'Kotoulas Energy S.A.',
            'footer_title' => 'by Loginet',
            'analytics_tracking_id' => '',
            'site_maintenance_mode' => false,
            'show_login_form' => true,
            'show_account_transactions' => true,
            'show_card_print_button' => false,
      ];

      

      /*
      ** DISABLED
      **
      **  Retrives config info from the database.
      ** The function is nested, because this calls ApiClient
      ** and the api cals config.
      **
      ** TODO: Find faster way to prevent function nest.
      **
      ** Caution: API request should NOT give any errors,
      ** because they will apear in the maintenance page in
      ** case of failure.
      */

      /*
      include_once 'utils/ApiClient.php';
      $api_config_client = new ApiClient();
      $api_config_client->get_filter('/zazu_portal/', 
            '(is_enabled=1)&limit=1&sort=portal_id');

      // Check API response
      if($api_config_client->get_response_code()!='200'){

            // Break the handling, API is not available
            // or portals don't exist
            //var_dump('gone_to_api_failure');
            require 'utils/Maintenance.php';
            $maintenance = new Maintenance();
            $maintenance->show_maintenance_page();

      }

      // Continue API handling
      foreach($api_config_client->get_resource() as $tmp_key=>$config_resource){
            $api_config_resource = $config_resource;
      }

      $config['nav_title']          = $api_config_resource->nav_title;
      $config['header_title']       = $api_config_resource->header_title;
      $config['footer_title']             = $api_config_resource->footer;
      $config['contact_phone1']     = $api_config_resource->contact_phone1;
      $config['contact_phone2']     = $api_config_resource->contact_phone2;
      $config['contact_email1']     = $api_config_resource->contact_email1;
      $config['contact_email2']     = $api_config_resource->contact_email2;
      $config['contact_address']    = $api_config_resource->contact_address;
      //$config['show_contact_form']  = $api_config_resource->show_contact_form;
      $config['slider_html_content']= 
            str_replace('\"', '"', $api_config_resource->slider_html_content);
      $config['deal_html_content']  = 
            str_replace('\"', '"', $api_config_resource->deal_html_content);
      $config['show_landing_deal']  = $api_config_resource->show_landing_deal;
      $config['analytics_tracking_id']
                                    = $api_config_resource->analytics_tracking_id;
      $config['site_maintenance_mode']
                                    = $api_config_resource->show_maintenance;
      $config['show_login_form']    = $api_config_resource->show_login_form;
      $config['show_account_transactions']
                                    = $api_config_resource->show_account_transactions;
      $config['show_gifts_in_landing']
                                    = $api_config_resource->show_gifts_in_landing;
      $config['show_levels_in_landing']
                                    = $api_config_resource->show_levels_in_landing;
      $config['show_landing_slider']
                                    = $api_config_resource->show_landing_slider;
      */

 ?>
