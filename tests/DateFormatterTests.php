<?php

use PHPUnit\Framework\TestCase;
use IW\Workshop\DateFormatter;
use DateTime;

class DateFormatterTests extends TestCase{
    public function testGetPartOfDay(): void {
        
        //tests for Morning
        $this->assertEquals("Morning", DateFormatter::getPartOfDay(new Datetime("2020-07-06 7:15:24")));
        $this->assertEquals("Morning", DateFormatter::getPartOfDay(new Datetime("2020-07-06 6:00:00")));
        $this->assertEquals("Morning", DateFormatter::getPartOfDay(new Datetime("2020-07-06 11:59:59")));
        
        //tests for afternoon
        $this->assertEquals("Afternoon", DateFormatter::getPartOfDay(new Datetime("2020-07-06 12:00:00")));
        $this->assertEquals("Afternoon", DateFormatter::getPartOfDay(new Datetime("2020-07-06 15:15:24")));
        $this->assertEquals("Afternoon", DateFormatter::getPartOfDay(new Datetime("2020-07-06 17:59:59")));
        
        //tests for evening
        $this->assertEquals("Evening", DateFormatter::getPartOfDay(new Datetime("2020-07-06 18:00:00")));
        $this->assertEquals("Evening", DateFormatter::getPartOfDay(new Datetime("2020-07-06 20:15:24")));
        $this->assertEquals("Evening", DateFormatter::getPartOfDay(new Datetime("2020-07-06 23:59:59")));
        
        //tests for night
        $this->assertEquals("Night", DateFormatter::getPartOfDay(new Datetime("2020-07-06 00:00:00")));
        $this->assertEquals("Night", DateFormatter::getPartOfDay(new Datetime("2020-07-06 4:15:24")));
        $this->assertEquals("Night", DateFormatter::getPartOfDay(new Datetime("2020-07-06 5:59:59")));
    }
}