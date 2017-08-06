<?php
namespace App\tests\Unit;

use App\Person;
use App\AddressBook;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \App\AddressBook
 */
class AddressBookTest extends TestCase
{

    protected $addressBook;

    public function setUp()
    {
        $this->addressBook = new AddressBook('Book');
    }

    /**
     * @test
     *
     * @covers ::__construct
     * @covers ::getName
     * @covers ::setName
     */
    public function it_gets_and_sets_name()
    {
        $this->assertEquals('Book', $this->addressBook->getName());
        $this->addressBook = new AddressBook('');
        $this->assertEquals('', $this->addressBook->getName());

        $this->addressBook->setName('My Book');
        $this->assertEquals('My Book', $this->addressBook->getName());
    }

    /**
     * @test
     *
     * @covers ::addContact
     * @covers ::contacts
     */
    public function it_adds_a_contact()
    {
        $person1 = new Person('Person1');
        $this->addressBook->addContact($person1);
        $this->assertEquals([$person1], $this->addressBook->contacts());
    }


    /**
     * @test
     *
     * @covers ::addContact
     * @covers ::contacts
     */
    public function it_adds_multiple_contact()
    {
        $person1 = new Person('Person1');
        $person2 = new Person('Person2');
        $this->addressBook->addContact($person1, $person2);

        $this->assertEquals([$person1, $person2], $this->addressBook->contacts());
    }

}
