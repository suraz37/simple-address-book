<?php
namespace App;

use InvalidArgumentException;

class Email
{
    /** @var string $email */
    protected $Email;

    /**
     *  Email Constructor.
     *
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = strtolower(trim($email));

        if (!$this->isValid()) {
            throw new InvalidArgumentException("Invalid email.", 1);
        }
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * set Email
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = trim($email);
    }


    /**
     * Check if email is valid.
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

?>
