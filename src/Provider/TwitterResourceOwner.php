<?php namespace SpireGG\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class TwitterResourceOwner implements ResourceOwnerInterface
{
    /**
     * @var  int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;
    
    /**
     * @var string
     */
    protected $username;

    /**
     * @var  string
     */
    protected $email;

    /**
     * TwitterResourceOwner constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes, $id)
    {
        $this->id = $id;
        $this->email = $attributes['email'];
        $this->name = $attributes['name'];
        $this->username = $attributes['login'];
    }

    /**
     * Get the contents of the user as a key-value array.
     *
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}
