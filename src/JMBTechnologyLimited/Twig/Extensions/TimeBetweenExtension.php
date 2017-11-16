<?php

namespace JMBTechnologyLimited\Twig\Extensions;

/**
 * Takes two DateTime objects.
 * Returns string of time between them.
 *
 * With a lot of inspiration from https://github.com/twigphp/Twig-extensions/blob/fe6f308b5aa35b64ae1687f1f6f510e4e59c033e/lib/Twig/Extensions/Extension/Date.php
 * (License: https://github.com/twigphp/Twig-extensions/blob/e740ab2e3c97b54028f21f9f8314caf6fdc482d7/LICENSE )
 *
 * @license https://github.com/JMB-Technology-Limited/Twig-Extensions/blob/master/LICENSE.txt 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */
class TimeBetweenExtension extends \Twig_Extension
{

    const FUNCTION_NAME_TIMEBETWEEN = 'timebetween';

    public static $units = array(
        'y' => 'year',
        'm' => 'month',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    const LABEL_ONE = 'one';
    const LABEL_PLURAL = 's';


    public function getFilters()
    {
        return array();
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(static::FUNCTION_NAME_TIMEBETWEEN, array($this, 'timebetween')),
        );
    }

    public function timebetween($date1,$date2) {
        if(get_class($date1) != 'DateTime') return '';
        if(get_class($date2) != 'DateTime') return '';

        $diff = $date1->diff($date2);

        foreach (self::$units as $attribute => $unit) {
            $count = $diff->$attribute;
            if (0 !== $count) {
                return $this->getPluralizedInterval($count, $diff->invert, $unit);
            }
        }
        return '';
    }

    protected function getPluralizedInterval($count, $invert, $unit)
    {
        if (1 == $count) {
            return self::LABEL_ONE . " " . $unit;
        } else {
            return $count . " " . $unit. self::LABEL_PLURAL;
        }
    }


}


