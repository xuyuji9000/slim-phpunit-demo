<?php

use \Mockery as m;
use App\Demos\Tempreture;
use PHPUnit\Framework\TestCase;

class TempretureTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testGetsAverageTempretureFromThreeServiceReadings()
    {
        $service = m::mock('service');
        $service->shouldReceive('readTemp')->times(3)->andReturn(10, 12, 14);

        $tempreture = new Tempreture($service);

        $this->assertEquals(12, $tempreture->average());
    }
}
