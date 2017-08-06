<?php

namespace App\Tests\Email;

use App\Email;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\Email
 */
class EmailTest extends TestCase
{
    protected $email;

    public function setUp()
    {
        $this->email = new Email('suraz37@gmail.com');
    }

    /**
     * @test
     *
     * @covers ::__construct
     * @covers ::getEmail
     */
    public function is_sets_and_gets_an_email()
    {
        $this->assertEquals('suraz37@gmail.com', $this->email->getEmail());
    }

    /**
     * @test
     *
     * @covers ::__construct
     * @covers ::isValid
     *
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid email.
     */
    public function it_throws_exception_for_invalid_email()
    {
        new Email('invalid');
    }
}
