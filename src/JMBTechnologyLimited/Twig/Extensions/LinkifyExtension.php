<?php

namespace JMBTechnologyLimited\Twig\Extensions;


/**
 * Based on https://github.com/fabpot/Twig-extensions/pull/64/files
 * We added  target=\"_blank\"
 *
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class LinkifyExtension extends \Twig_Extension
{

    public function getFunctions()
    {
        return array();
    }

    public function getFilters()
    {
        return array(
            'linkify' => new \Twig_Filter_Method($this, 'linkify', array('pre_escape' => 'html','is_safe' => array('html'))),
        );
    }

    public function linkify($text) {
		$text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\"  target=\"_blank\">$3</a>", $text);
		$text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\"  target=\"_blank\">$3</a>", $text);
		$text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\">$2@$3</a>", $text);
		return $text;
    }

    public function getName()
    {
        return 'jmbtechnologylimited_linkify';
    }
}