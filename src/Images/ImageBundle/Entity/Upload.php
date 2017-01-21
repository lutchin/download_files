<?php
namespace Images\ImageBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="file")
 */
class Upload
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="user_name", type="string")
     */

    private $user;


    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Please, upload the product brochure as a JPEG file.")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $imageFile;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;


        return $this;
    }


    public function getImageFile()
    {
        return $this->imageFile;
    }



    /**
     * @param string $user
     *
     * @return Upload
     */


    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }



}

