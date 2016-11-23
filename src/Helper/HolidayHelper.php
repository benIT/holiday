<?php
namespace Holiday\Helper;

class HolidayHelper
{
 	public static function callMethod($country, $method, $params)
 	{
 		$classNamePattern = 'Holiday\Country\%sHoliday';
 		if (class_exists(sprintf($classNamePattern, $country))) {
 			if (method_exists(sprintf($classNamePattern, $country), $method) && is_callable(sprintf($classNamePattern, $country), $method)) {
            	return call_user_func_array(sprintf($classNamePattern.'::%s', $country, $method), $params);
 			} else {
 				 throw new \Exception(sprintf('The required method "%s" does not exist for %s', $method, sprintf($classNamePattern, $country))); 
 			}
        } else {
        	//todo create exception
            throw new \InvalidArgumentException(sprintf('%s country does not exist.', $country));
        }
 		
 	}
}
