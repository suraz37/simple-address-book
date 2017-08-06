<?php
namespace App;

use InvalidArgumentExpection;

class Person
{
    /** @var string $firstName First Name */
    public $firstName;

    /** @var string $firstName First Name */
    public $lastName;

    /** @var string $address Person Addresses */
    protected $address = [];

    /** @var string $emails Person Emails */
    protected $emails = [];

    /** @var string $phones Person phones */
    protected $phones = [];

    /** @var string $groups Groups this person is associate */
    protected $groups = [];

    /**
     */
    public function __construct(string $firstName, string $lastName = '')
    {
        $firstName = trim($firstName);

        if (!$firstName) {
            throw new InvalidArgumentExpection('Invalid First Name');
        }

        $this->firstName = $firstName;
        $this->lastName = trim($lastName);
    }

    /**
     *
     */
    public function name(): string
    {
        $name = $this->firstName;

        if ($this->lastName) {
            $name .= " " . $this->lastName;
        }
        return $name;
    }

    /**
     * Get groups
     * @return array
     */
    public function groups(): array
    {
        return $this->groups;

    }

    /**
     * Get address
     * @return array
     */
    public function address(): array
    {
        return $this->address;
    }

    /**
     * Get emails
     * @return array
     */
    public function emails(): array
    {
        return $this->emails;
    }

    /**
     * set a Group
     *
     * @param Group $group
     *
     * @return $this
     */
    public function addGroup(Group $group)
    {
        $this->groups[] = $group;
        return $this;
    }
}

?>
