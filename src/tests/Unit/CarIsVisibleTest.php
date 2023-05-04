<?php

namespace Tests\Unit;

use App\Util\CarIsVisible;
use PHPUnit\Framework\TestCase;

class CarIsVisibleTest extends TestCase
{
    public function testAvailableAndPublished()
    {
        $carIsVisible = new CarIsVisible();
        $this->assertTrue($carIsVisible->carIsVisible(true, 'accepted'));
    }

    public function testAvailableAndNotPublished()
    {
        $carIsVisible = new CarIsVisible();
        $this->assertFalse($carIsVisible->carIsVisible(true, 'pending'));
    }

    public function testNotAvailableAndPublished()
    {
        $carIsVisible = new CarIsVisible();
        $this->assertFalse($carIsVisible->carIsVisible(false, 'accepted'));
    }

    public function testNotAvailableAndNotPublished()
    {
        $carIsVisible = new CarIsVisible();
        $this->assertFalse($carIsVisible->carIsVisible(false, 'pending'));
    }

    public function testAvailableAndRejected()
    {
        $carIsVisible = new CarIsVisible();
        $this->assertFalse($carIsVisible->carIsVisible(true, 'rejected'));
    }

    public function testNotAvailableAndRejected()
    {
        $carIsVisible = new CarIsVisible();
        $this->assertFalse($carIsVisible->carIsVisible(false, 'rejected'));
    }
}
