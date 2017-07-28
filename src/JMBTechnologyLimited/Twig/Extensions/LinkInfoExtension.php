<?php

namespace JMBTechnologyLimited\Twig\Extensions;

/**
 * Takes Link. Returns a shortened form to show to user.
 * 
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class LinkInfoExtension extends \Twig_Extension
{

    const FILTER_NAME_LINK_INFO = 'linkinfo';

    public function getFunctions()
    {
        return array();
    }

    public function getFilters()
    {
        return array(
            static::FILTER_NAME_LINK_INFO => new \Twig_Filter_Method($this, 'linkinfo', array()),
        );
    }

    public function linkinfo($text) {
		$data = parse_url($text);
		return isset($data['host']) ? $data['host'] : $text;
    }


}