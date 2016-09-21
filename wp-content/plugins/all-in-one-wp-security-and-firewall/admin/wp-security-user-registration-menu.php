<?php

class AIOWPSecurity_User_Registration_Menu extends AIOWPSecurity_Admin_Menu
{
    var $menu_page_slug = AIOWPSEC_USER_REGISTRATION_MENU_SLUG;
    
    /* Specify all the tabs of this menu in the following array */
    var $menu_tabs = array(
        'tab1' => 'Manual Approval',
        );

    var $menu_tabs_handler = array(
        'tab1' => 'render_tab1',
        );
    
    function __construct() 
    {
        $this->render_menu_page();
    }
    
    function get_current_tab() 
    {
        $tab_keys = array_keys($this->menu_tabs);
        $tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $tab_keys[0];
        return $tab;
    }

    /*
     * Renders our tabs of this menu as nav items
     */
    function render_menu_tabs() 
    {
        $current_tab = $this->get_current_tab();

        echo '<h2 class="nav-tab-wrapper">';
        foreach ( $this->menu_tabs as $tab_key => $tab_caption ) 
        {
            $active = $current_tab == $tab_key ? 'nav-tab-active' : '';
            echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->menu_page_slug . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';	
        }
        echo '</h2>';
    }
    
    /*
     * The menu rendering goes here
     */
    function render_menu_page() 
    {
        $tab = $this->get_current_tab();
        ?>
        <div class="wrap">
        <div id="poststuff"><div id="post-body">
        <?php 
        $this->render_menu_tabs();
        //$tab_keys = array_keys($this->menu_tabs);
        call_user_func(array(&$this, $this->menu_tabs_handler[$tab]));
        ?>
        </div></div>
        </div><!-- end of wrap -->
        <?php
    }
    
    function render_tab1()
    {
        global $aiowps_feature_mgr;
        global $aio_wp_security;
        include_once 'wp-security-list-registered-users.php'; //For rendering the AIOWPSecurity_List_Table
        $user_list = new AIOWPSecurity_List_Registered_Users();

        if(isset($_POST['aiowps_save_user_registration_settings']))//Do form submission tasks
        {
            $nonce=$_REQUEST['_wpnonce'];
            if (!wp_verify_nonce($nonce, 'aiowpsec-user-registration-settings-nonce'))
            {
                $aio_wp_security->debug_logger->log_debug("Nonce check failed on save user registration settings!",4);
                die("Nonce check failed on save user registration settings!");
            }

            //Save settings
            $aio_wp_security->configs->set_value('aiowps_enable_manual_registration_approval',isset($_POST["aiowps_enable_manual_registration_approval"])?'1':'');

            //Commit the config settings
            $aio_wp_security->configs->save_config();
            
            //Recalculate points after the feature status/options have been altered
            $aiowps_feature_mgr->check_feature_status_and_recalculate_points();

            $this->show_msg_updated(__('Settings were successfully saved', 'aiowpsecurity'));
        }
        
        if(isset($_REQUEST['action'])) //Do list table form row action tasks
        {
            if($_REQUEST['action'] == 'approve_acct'){ //Delete link was clicked for a row in list table
                $user_list->approve_selected_accounts(strip_tags($_REQUEST['user_id']));
            }
            
            if($_REQUEST['action'] == 'delete_acct'){ //Unlock link was clicked for a row in list table
                $user_list->delete_selected_accounts(strip_tags($_REQUEST['user_id']));
            }
        }


        ?>
        <h2><?php _e('User Registration Settings', 'aiowpsecurity')?></h2>
        <form action="" method="POST">
        <?php wp_nonce_field('aiowpsec-user-registration-settings-nonce'); ?>            
        <div class="postbox">
        <h3><label for="title"><?php _e('Manually Approve New Registrations', 'aiowpsecurity'); ?></label></h3>
        <div class="inside">
        <div class="aio_blue_box">
            <?php
            echo '<p>'.__('If your site allows people to create their own accounts via the WordPress registration form, then you can minimize SPAM or bogus registrations by manually approving each registration.', 'aiowpsecurity').
            '<br />'.__('This feature will automatically set a newly registered account to "pending" until the administrator activates it. Therefore undesirable registrants will be unable to log in without your express approval.', 'aiowpsecurity').
            '<br />'.__('You can view all accounts which have been newly registered via the handy table below and you can also perform bulk activation/deactivation/deletion tasks on each account.', 'aiowpsecurity').'</p>';
            ?>
        </div>
        <?php
        //Display security info badge
        $aiowps_feature_mgr->output_feature_details_badge("manually-approve-registrations");
        if (AIOWPSecurity_Utility::is_multisite_install() && get_current_blog_id() != 1)
        {
           //Hide config settings if MS and not main site
           AIOWPSecurity_Utility::display_multisite_message();
        }
        else
        {
        ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php _e('Enable manual approval of new registrations', 'aiowpsecurity')?>:</th>                
                <td>
                <input name="aiowps_enable_manual_registration_approval" type="checkbox"<?php if($aio_wp_security->configs->get_value('aiowps_enable_manual_registration_approval')=='1') echo ' checked="checked"'; ?> value="1"/>
                <span class="description"><?php _e('Check this if you want to automatically disable all newly registered accounts so that you can approve them manually.', 'aiowpsecurity'); ?></span>
                </td>
            </tr>            
        </table>
        <?php } //End if statement ?>
        <input type="submit" name="aiowps_save_user_registration_settings" value="<?php _e('Save Settings', 'aiowpsecurity')?>" class="button-primary" />
        </div></div>
        </form>
        <div class="postbox">
        <h3><label for="title"><?php _e('Approve Registered Users', 'aiowpsecurity'); ?></label></h3>
        <div class="inside">
            <?php
            //Fetch, prepare, sort, and filter our data...
            $user_list->prepare_items();
            ?>
            <form id="tables-filter" method="get" onSubmit="return confirm('Are you sure you want to perform this bulk operation on the selected entries?');">
            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
            <!-- Now we can render the completed list table -->
            <?php $user_list->display(); ?>
        </div></div>
        <?php
    }
        
} //end class