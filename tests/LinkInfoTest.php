<?php

/*
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class LinkInfoTest extends PHPUnit_Framework_TestCase {

    function linkInfoTestProvider() {
        return array(
            array('http://www.google.com/calendar', 'www.google.com'),
        );
    }

    /**
     * @dataProvider linkInfoTestProvider
     */
    function testLinkInfo($in, $out) {
        $ext = new \JMBTechnologyLimited\Twig\Extensions\LinkInfoExtension();
        $this->assertEquals($out,  $ext->linkinfo($in));
    }

}