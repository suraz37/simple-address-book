<?php
namespace App;

class Address
{
    protected $Address;

    public function __construct(string $address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * set Address
     *
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = trim($address);
    }
}

?>
