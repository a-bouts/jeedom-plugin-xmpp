<?php
/**
 *
 */

/**
 * XmppAutoload SPL autoloader.
 * @param string $classname The name of the class to load
 */

function XmppAutoload($classname)
{
    $filename = dirname(__FILE__).DIRECTORY_SEPARATOR.str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
    if (is_readable($filename)) {
        require $filename;
    }
}

if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    //SPL autoloading was introduced in PHP 5.1.2
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('XmppAutoload', true, true);
    } else {
        spl_autoload_register('XmppAutoload');
    }
} else {
    /**
     * Fall back to traditional autoload for old PHP versions
     * @param string $classname The name of the class to load
     */
    function __autoload($classname)
    {
        XmppAutoload($classname);
    }
}
