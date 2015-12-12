<?php

require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'JMBTechnologyLimited'
    . DIRECTORY_SEPARATOR . 'Twig' . DIRECTORY_SEPARATOR . 'Extensions' . DIRECTORY_SEPARATOR . 'LinkifyExtension.php';
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'JMBTechnologyLimited'
    . DIRECTORY_SEPARATOR . 'Twig' . DIRECTORY_SEPARATOR . 'Extensions' . DIRECTORY_SEPARATOR . 'LinkInfoExtension.php';
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'JMBTechnologyLimited'
    . DIRECTORY_SEPARATOR . 'Twig' . DIRECTORY_SEPARATOR . 'Extensions' . DIRECTORY_SEPARATOR . 'SameDayExtension.php';
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'JMBTechnologyLimited'
    . DIRECTORY_SEPARATOR . 'Twig' . DIRECTORY_SEPARATOR . 'Extensions' . DIRECTORY_SEPARATOR . 'TimeZoneExtension.php';

use JMBTechnologyLimited\Twig\Extensions\LinkifyExtension;


/**
 * Based on https://github.com/fabpot/Twig-extensions/pull/64/files
 * We added  target=\"_blank\"
 *
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 */

foreach(array(
    array(
        'extensions'=>array(new LinkifyExtension()),
        'name'=>'linkify',
    ),
        ) as $data) {

    $loader = new Twig_Loader_Filesystem(array(__DIR__ . DIRECTORY_SEPARATOR . 'templates'));
    $twig = new Twig_Environment($loader, array(
    ));
    foreach($data['extensions'] as $ext) {
        $twig->addExtension($ext);
    }
    file_put_contents(__DIR__. DIRECTORY_SEPARATOR. 'out'. DIRECTORY_SEPARATOR. $data['name']. '.html', $twig->render($data['name'].'.html.twig'));
}
