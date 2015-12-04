<?php

namespace JMBTechnologyLimited\Twig\Extensions;

/**
 *
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class TimeZoneExtension extends \Twig_Extension
{


    public function getFilters()
    {
        return array(
            'totimezone' => new \Twig_Filter_Method($this, 'totimezone'),
        );
    }

    public function getFunctions()
    {
        return array();
    }

    public function totimezone($date, $timezone) {

        if (!$date instanceof \DateTime) {
            if (ctype_digit((string) $date)) {
                $date = new \DateTime('@'.$date);
            } else {
                $date = new \DateTime($date);
            }
        } else {
            $date = clone $date;
        }

        if (!$timezone instanceof \DateTimeZone) {
            $timezone = new \DateTimeZone($timezone);
        }

        $date->setTimezone($timezone);

        return $date;

    }

    public function getName()
    {
        return 'jmbtechnologylimited_timezone';
    }
}


