<?php

namespace JMBTechnologyLimited\Twig\Extensions;

/**
 * With help from https://matt.drollette.com/2012/07/user-specific-timezones-with-symfony2-and-twig-extensions/ - Thanks!
 * 
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class LocalTimeExtension extends \Twig_Extension
{


    public function getFunctions()
    {
        return array();
    }

    public function getFilters()
    {
        return array(
            'tolocaltime' => new \Twig_Filter_Method($this, 'formatDatetime', array('is_safe' => array('html'))),
            'tolocaltimeformatted' => new \Twig_Filter_Method($this, 'formatDatetimeAsFormat', array('is_safe' => array('html'))),
            'tolocaltimeformatted12or24hourclock' => new \Twig_Filter_Method($this, 'formatDatetimeAsFormat1224HourClock', array('is_safe' => array('html'))),
        );
    }

    public function formatDatetime($date, $timezone)
    {

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


    public function formatDatetimeAsFormat($date, $format=null, $timezone = null) {
		return $this->formatDatetime($date, $timezone)->format($format);
    }
	
    public function formatDatetimeAsFormat1224HourClock($date, $format12=null, $format24=null, $clock12hour=true, $timezone = null) {
		if ($clock12hour) {
			return $this->formatDatetime($date, $timezone)->format($format12);
		} else {
			return $this->formatDatetime($date, $timezone)->format($format24);
		}
    }

    public function getName()
    {
        return 'jmbtechnologylimited_localtime';
    }
}