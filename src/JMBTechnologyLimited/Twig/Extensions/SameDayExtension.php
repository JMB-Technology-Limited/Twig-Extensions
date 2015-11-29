<?php

namespace JMBTechnologyLimited\Twig\Extensions;

/**
 * Takes two DateTime objects.
 * Returns true if they are on the same day.
 * 
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) 2013-2015, JMB Technology Limited, http://jmbtechnology.co.uk/
*/
class SameDayExtension extends \Twig_Extension
{


    public function getFilters()
    {
        return array();
    }

    public function getFunctions()
    {
        return array(
            'sameday' => new \Twig_Function_Method($this, 'sameday'),
        );
    }

    public function sameday($date1,$date2) {
		if(get_class($date1) != 'DateTime') return false;
		if(get_class($date2) != 'DateTime') return false;
		return $date1->format('dmYe') == $date2->format('dmYe');
		
    }

    public function getName()
    {
        return 'jmbtechnologylimited_sameday';
    }
}


