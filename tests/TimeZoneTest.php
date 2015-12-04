<?php

/*
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class TimeZoneTest extends PHPUnit_Framework_TestCase {

    function timeZoneTestProvider() {
        return array(
            array(new DateTime('2015-01-01 10:00:00', new \DateTimeZone('Europe/London')), 'Europe/Berlin', '2015-01-01T11:00:00+01:00'),
            array(new DateTime('2015-07-01 10:00:00', new \DateTimeZone('Europe/London')), 'Europe/Berlin', '2015-07-01T11:00:00+02:00'),
        );
    }

    /**
     * @dataProvider timeZoneTestProvider
     */
    function testTimeZone($inDateTime, $inTimeZone, $outString) {
        $ext = new \JMBTechnologyLimited\Twig\Extensions\TimeZoneExtension();
        $out = $ext->totimezone($inDateTime, $inTimeZone);
        $this->assertEquals($inTimeZone,  $out->getTimezone()->getName());
        $this->assertEquals($outString, $out->format("c"));
    }

}