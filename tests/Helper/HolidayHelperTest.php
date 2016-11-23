<?php
namespace Holiday\Tests\Helper;

use Holiday\Helper\HolidayHelper;

class HolidayHelperTest extends \PHPUnit_Framework_TestCase
{
    public function testHelper()
    {
        $this->assertNotNull(HolidayHelper::callMethod('France', 'getHolidays', [2016]));
        $this->assertTrue(HolidayHelper::callMethod('France', 'isClosedDay', [new \DateTime(sprintf('%d-%d-%d', 2016, 12, 25))]));
    }
    
    public function testHelperException()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        $this->assertTrue(HolidayHelper::callMethod('FOOBAR', 'isClosedDay', [new \DateTime(sprintf('%d-%d-%d', 2016, 12, 25))]));
    }
}
