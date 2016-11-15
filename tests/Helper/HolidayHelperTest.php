<?php
namespace Holiday\Tests\Helper;

use Holiday\Helper\HolidayHelper;

class HolidayHelperTest extends \PHPUnit_Framework_TestCase
{
    public function testHelper()
    {
        $this->assertNotNull(HolidayHelper::getHolidays('France', 2016));
        $this->assertTrue(HolidayHelper::IsClosedDay('France', new \DateTime(sprintf('%d-%d-%d', 2016, 12, 25))));
    }
    
    public function testHelperException()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        $this->assertTrue(HolidayHelper::IsClosedDay('FOOBAR', new \DateTime(sprintf('%d-%d-%d', 2016, 12, 25))));
    }
}
