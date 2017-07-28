<?php

namespace JMBTechnologyLimited\Twig\Extensions;

/**
 * Takes two DateTime objects.
 * Returns true if they are on the same day.
 * 
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
*/
class SameDayExtension extends \Twig_Extension
{

    const FUNCTION_NAME_SAMEDAY = 'sameday';

    public function getFilters()
    {
        return array();
    }

    public function getFunctions()
    {
        return array(
             new \Twig_SimpleFilter(static::FUNCTION_NAME_SAMEDAY, array($this, 'sameday')),
        );
    }

    public function sameday($date1,$date2) {
		if(get_class($date1) != 'DateTime') return false;
		if(get_class($date2) != 'DateTime') return false;
		return $date1->format('dmYe') == $date2->format('dmYe');
		
    }


}


