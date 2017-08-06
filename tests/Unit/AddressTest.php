<?php

namespace App\Tests\Unit;

use App\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    protected $address;

    public function setup()
    {
        $this->address = new Address('Sathorn, Soi Saunphlu');
    }

    /**
     * @test
     *
     * @covers ::__construct
     * @covers ::getAddress
     * @covers ::setAddress
     */
    public function it_sets_and_get_address()
    {
        $this->assertEquals('Sathorn, Soi Saunphlu', $this->address->getAddress());
        $this->address->setAddress('Bangkok, Thailand');
        $this->assertEquals('Bangkok, Thailand', $this->address->getAddress());

    }

}
