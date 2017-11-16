<?php

use PHPUnit\Framework\TestCase;

/*
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class TimeBetweenTest extends TestCase {

    function timeBetweenTestProvider() {
        $utc = new \DateTimeZone('UTC');
        return array(
            array(new DateTime('2015-01-01 10:00:00', $utc), new DateTime('2015-01-01 12:00:00', $utc), '2 hours'),
            array(new DateTime('2015-01-01 10:00:00', $utc), new DateTime('2015-01-02 12:00:00', $utc), 'one day'),
            array(new DateTime('2015-01-01 10:00:00', $utc), new DateTime('2015-01-01 10:30:00', $utc), '30 minutes'),
            array(new DateTime('2015-01-01 10:00:00', $utc), new DateTime('2015-02-01 10:30:00', $utc), 'one month'),
            array(new DateTime('2015-01-01 10:00:00', $utc), new DateTime('2016-02-01 10:30:00', $utc), 'one year'),
        );
    }

    /**
     * @dataProvider timeBetweenTestProvider
     */
    function testTimeBetween($in1, $in2, $out) {
        $ext = new \JMBTechnologyLimited\Twig\Extensions\TimeBetweenExtension();
        $this->assertEquals($out,  $ext->timebetween($in1, $in2));
    }

    /**
     *
     * It shouldn't matter in which order you pass the dates.
     * @dataProvider timeBetweenTestProvider
     */
    function testTimeBetweenReversed($in1, $in2, $out) {
        $ext = new \JMBTechnologyLimited\Twig\Extensions\TimeBetweenExtension();
        $this->assertEquals($out,  $ext->timebetween($in2, $in1));
    }

}
