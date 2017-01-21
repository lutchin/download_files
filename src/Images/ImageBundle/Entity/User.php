<?php


namespace Images\ImageBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }




    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {

        $this->username = $username;


        return $this;
    }




    public function __construct()
    {
        parent::__construct();

        // your own logic
    }




}