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
            'linkify' => new \Twig_Filter_Method($this, 'linkify', array('pre_escape' => 'html','is_safe' => array('html'))),
        );
    }

    public function linkify($text, $options=array()) {
		return $this->linkify->process($text, is_array($options) ? $options : array());
    }

    public function getName()
    {
        return 'jmbtechnologylimited_linkify';
    }
}