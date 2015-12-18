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
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 */

########################################################################################## Linkify


class LinkifyExtensionInNewWindow extends LinkifyExtension {

    const TWIG_EXTENSION_NAME = 'jmbtechnologylimited_linkifynew';
    const FILTER_NAME_LINKIFY = 'linkifynew';
}


$loader = new Twig_Loader_Filesystem(array(__DIR__ . DIRECTORY_SEPARATOR . 'templates'));
$twig = new Twig_Environment($loader, array(
));
$twig->addExtension(new LinkifyExtension());
$twig->addExtension(new LinkifyExtensionInNewWindow(array('attr'=>array('_target'=>'blank'))));
file_put_contents(__DIR__. DIRECTORY_SEPARATOR. 'out'. DIRECTORY_SEPARATOR. 'linkify.html', $twig->render('linkify.html.twig'));

