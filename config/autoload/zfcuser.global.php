<?php

/**
 * ZfcUser Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
$settings = array(
    'enable_default_entities' => false,
    
    /**
     * User Model Entity Class
     *
     * Name of Entity class to use. Useful for using your own entity class
     * instead of the default one provided. Default is ZfcUser\Entity\User.
     * The entity class should implement ZfcUser\Entity\UserInterface
     */
    'user_entity_class'       => 'Siscourb\User\Entity\User',

    /**
     * Enable registration
     *
     * Allows users to register through the website.
     *
     * Accepted values: boolean true or false
     */
    'enable_registration' => true,
    
    /**
     * Enable Username
     *
     * Enables username field on the registration form, and allows users to log
     * in using their username OR email address. Default is false.
     *
     * Accepted values: boolean true or false
     */
    'enable_username' => false,
    
    /**
     * Enable Display Name
     *
     * Enables a display name field on the registration form, which is persisted
     * in the database. Default value is false.
     *
     * Accepted values: boolean true or false
     */
    'enable_display_name' => true,

    /**
     * Modes for authentication identity match
     *
     * Specify the allowable identity modes, in the order they should be
     * checked by the Authentication plugin.
     *
     * Default value: array containing 'email'
     * Accepted values: array containing one or more of: email, username
     */
    'auth_identity_fields' => array( 'email' ),

    /**
     * Login After Registration
     *
     * Automatically logs the user in after they successfully register. Default
     * value is false.
     *
     * Accepted values: boolean true or false
     */
    'login_after_registration' => true,

    /**
     * Sets the view template for the user login widget
     *
     * Default value: 'zfc-user/user/login.phtml'
     * Accepted values: string path to a view script
     */
    'user_login_widget_view_template' => 'user/user/login.phtml',


    /**
     * Logout Redirect Route
     *
     * Upon logging out the user will be redirected to the enterd route
     *
     * Default value: 'zfcuser/login'
     * Accepted values: A valid route name within your application
     */
    'logout_redirect_route' => 'siscourb',


    /**
     * Enable user state usage
     *
     * Should user's state be used in the registration/login process?
     */
    'enable_user_state' => true,

    /**
     * Default user state upon registration
     *
     * What state user should have upon registration?
     * Allowed value type: integer
     */
    'default_user_state' => 1,

    /**
     * States which are allowing user to login
     *
     * When user tries to login, is his/her state one of the following?
     * Include null if you want user's with no state to login as well.
     * Allowed value types: null and integer
     */
    'allowed_login_states' => array( null, 1 ),
);

return array(
    'zfcuser' => $settings,
);
