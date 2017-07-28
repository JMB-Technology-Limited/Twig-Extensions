<?php

namespace JMBTechnologyLimited\Twig\Extensions;


/**
 *
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class LinkifyExtension extends \Twig_Extension
{

    const FILTER_NAME_LINKIFY = 'linkify';

    protected $linkify;

    function __construct($options = array())
    {
        $this->linkify = new \Misd\Linkify\Linkify(is_array($options) ? $options : array());
    }

    public function getFunctions()
    {
        return array();
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(static::FILTER_NAME_LINKIFY, array($this, 'linkify'), array('pre_escape' => 'html','is_safe' => array('html'))),
        );
    }

    public function linkify($text, $options=array()) {
		return $this->linkify->process($text, is_array($options) ? $options : array());
    }


}