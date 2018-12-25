<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
return [
    // Retrieve list of modules used in this application.
    'modules' => [
        'Zend\Cache',
        'Zend\Serializer',
        'Zend\I18n',
        'Zend\Mvc\Plugin\FilePrg',
        'Zend\Form',
        'Zend\Hydrator',
        'Zend\InputFilter',
        'Zend\Filter',
        'Zend\Mvc\Plugin\FlashMessenger',
        'Zend\Mvc\Plugin\Identity',
        'Zend\Mvc\Plugin\Prg',
        'Zend\Session',
        'Zend\Router',
        'Zend\Validator',
        'Zend\Navigation',

        'MSBios\Session',
        'MSBios\I18n',
        'MSBios\Cache',
        'MSBios\View',
        'MSBios\Theme',
        'MSBios\Widget',
        'MSBios\Navigation',
        'MSBios\Application',
        'MSBios\Assetic',

        'MSBios\Permissions\Acl',
        'ZendDeveloperTools',
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],
        'config_cache_enabled' => false,
        'config_cache_key' => 'application.config.cache',
        'module_map_cache_enabled' => false,
        'module_map_cache_key' => 'application.module.cache',
        'cache_dir' => 'data/cache/',
    ],
];
