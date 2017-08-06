<?php
namespace App;

use InvalidArgumentException;

class AddressBook
{
    protected $name;

    protected $contacts = [];

    protected $groups = [];

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function contacts(): array
    {
        return $this->contacts;
    }

    public function groups(): array
    {
        return $this->groups;
    }

    /**
     * Add Group
     *
     * @param array $groups
     *
     * @return $this
     * @throws InvalidArgumentException
     */
    public function addGroup(...$groups)
    {
        foreach ($groups as $group) {
            if (!is_a($group, Group::class)) {
                throw new InvalidArgumentException('Invalid Group');
            }
            $this->groups[] = $groups;
        }
        return $this;
    }

    /**
     * Add person to contact list
     *
     * @param array $contacts
     *
     * @return $this
     * @throws InvalidArgumentException
     */
    public function addContact(...$contacts)
    {
        foreach ($contacts as $person) {
            if (!is_a($person, Person::class)) {
                throw new InvalidArgumentException('Invalid Contact');
            }
            $this->contacts[] = $person;
        }
        return $this;
    }

    public function findByName(string $name): array
    {
        $name = trim($name);

        if (empty($this->contacts) || empty($name)) {
            return [];
        }

        //trim all spaces from name and make it lowercase
        $pieces = array_map('trim', explode(' ', $name, 2));
        $name = strtolower(implode(" ", $pieces));

        $results = [];
        foreach ($this->contacts as $key => $contact) {
            if (in_array($name, array_map('strtolower', [
                $contact->firstName,
                $contact->lastName,
                $contact->name(),
            ]))) {
                $results[] = $contact;
            }
        }

        return $results;
    }

    /**
     * find  member by email.
     *
     * @param string email
     *
     * @return array
     */
    public function findByEmail(string $email): array
    {
        $email = strtolower(trim($email));

        if (empty($this->contacts) || empty($email) || strlen($email) < 3) {
            return [];
        }

        $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        $key = md5($email);

        $results = [];
        foreach ($this->contacts as $contact) {
            $emails = $contact->emails();

            if ($isValidEmail && isset($emails[key])) {
                $results[] = $contact;
            } else {
                array_map(function ($e) use ($email, $contact, &$results) {
                    if (preg_match("/^$email/", $e->getEmail()) === 1) {
                        $results[] = $contact;
                    }
                }, $emails);
            }
        }

        return $results;
    }
}
