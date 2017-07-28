<?php

use PHPUnit\Framework\TestCase;

/*
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class SameDayTest extends TestCase {

    function sameDayTestProvider() {
        return array(
            array(new DateTime('2015-01-01 10:00:00'), new DateTime('2015-01-01 12:00:00'), true),
            array(new DateTime('2015-01-01 10:00:00'), new DateTime('2015-01-02 12:00:00'), false),
        );
    }

    /**
     * @dataProvider sameDayTestProvider
     */
    function testSameDay($in1, $in2, $out) {
        $ext = new \JMBTechnologyLimited\Twig\Extensions\SameDayExtension();
        $this->assertEquals($out,  $ext->sameday($in1, $in2));
    }

}