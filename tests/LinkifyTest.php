<?php

/*
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class LinkifyTest extends PHPUnit_Framework_TestCase {

    function linkifyTestProvider() {
        return array(
            array('Please visit http://www.google.com/calendar', 'Please visit <a href="http://www.google.com/calendar"  target="_blank">http://www.google.com/calendar</a>'),
        );
    }

    /**
     * @dataProvider linkifyTestProvider
     */
    function testLinkify($in, $out) {
        $ext = new \JMBTechnologyLimited\Twig\Extensions\LinkifyExtension();
        $this->assertEquals($out,  $ext->linkify($in));
    }

}