<?php

use PHPUnit\Framework\TestCase;

/*
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class LinkifyTest extends TestCase {

    function linkifyTestProvider() {
        return array(
            // check can pass null or array
            array(null, null, 'Please visit http://www.google.com/calendar', 'Please visit <a href="http://www.google.com/calendar">http://www.google.com/calendar</a>'),
            array(array(), array(), 'Please visit http://www.google.com/calendar', 'Please visit <a href="http://www.google.com/calendar">http://www.google.com/calendar</a>'),
            // test callback
            array(array('callback' => function($url, $caption, $isEmail) {
                    return '<a href="#">No</a>';
                }), array(), 'Please visit http://www.google.com/calendar', 'Please visit <a href="#">No</a>'),
            // pass attr
            array(array('attr'=>array('target'=>'_blank')), array(), 'Please visit http://www.google.com/calendar', 'Please visit <a href="http://www.google.com/calendar" target="_blank">http://www.google.com/calendar</a>'),
            array(array(), array('attr'=>array('target'=>'_blank')), 'Please visit http://www.google.com/calendar', 'Please visit <a href="http://www.google.com/calendar" target="_blank">http://www.google.com/calendar</a>'),
        );
    }

    /**
     * @dataProvider linkifyTestProvider
     */
    function testLinkify($optionsContruct, $optionsPass, $in, $out) {
        $ext = new \JMBTechnologyLimited\Twig\Extensions\LinkifyExtension($optionsContruct);
        $this->assertEquals($out,  $ext->linkify($in, $optionsPass));
    }

}