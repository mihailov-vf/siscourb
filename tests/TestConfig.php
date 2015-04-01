<?php
$config = require 'config/application.config.php';
$config['module_listener_options']['config_glob_paths'] = array('config/autoload/{,*.}{global,local,test}.php');

return $config;
