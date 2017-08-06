<?php
namespace App;

use InvalidArgumentException;

class Group
{
    /** @var string $name Name of the group */
    protected $name;

    /** @var array $members Members of the group */
    protected $members = [];

    /**
     *  Group Constructor.
     *
     * @param string $group
     */
    public function __construct(string $name)
    {
        $name = trim($name);

        if (empty($name)) {
            throw new InvalidArgumentException("Invalid Group Name", 1);

        }
        $this->name = $name;
    }

    /**
     * Add person to group
     *
     * @param array $persons
     *
     * @return $this
     */
    public function add(...$persons)
    {
        foreach ($persons as $person) {
            if (!is_a($person, Person::class)) {
                throw new InvalidArgumentException("Invalid Person", 1);
            }
            $person->addGroup($this);

            $this->members[] = $person;
        }

        return $this;
    }

    /**
     * Get Members.
     *
     * @return array
     */
    public function members(): array
    {
        return $this->members;
    }

    /**
     * Find member by first name, last name and both
     *
     * @param string
     *
     * @return array
     */
    public function findByName(string $name): array
    {
        $name = trim($name);

        if (empty($this->members) || empty($name)) {
            return [];
        }
        $pieces = array_map('trim', explode(' ', $name, 2));
        $name = strtolower(implode(' ', $pieces));

        $results = [];

        foreach ($this->members as $member) {
            if (in_array($name, array_map('strtolower', [
                $member->firstName,
                $member->lastName,
                $member->name(),
            ]))) {
                $results[] = $member;
            }
        }

        return $results;
    }
}

?>
