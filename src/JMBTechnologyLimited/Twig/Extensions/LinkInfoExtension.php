<?php

namespace JMBTechnologyLimited\Twig\Extensions;

/**
 * Takes Link. Returns a shortened form to show to user.
 * 
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class LinkInfoExtension extends \Twig_Extension
{

    public function getFunctions()
    {
        return array();
    }

    public function getFilters()
    {
        return array(
            'linkinfo' => new \Twig_Filter_Method($this, 'linkinfo', array()),
        );
    }

    public function linkinfo($text) {
		$data = parse_url($text);
		return isset($data['host']) ? $data['host'] : $text;
    }

    public function getName()
    {
        return 'jmbtechnologylimited_linkinfo';
    }
}