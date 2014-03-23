<?php
namespace Acme\AccountBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use Tech\TBundle\Entity\Tbdetusuariodatos;
use Tech\TBundle\Entity\Tbdetusuarioacceso;
use Tech\TBundle\Entity\Tbgenrol;

class Registration
{
    /**
     * @Assert\Type(type="Tech\TBundle\Entity\Tbdetusuariodatos")
     * @Assert\Valid()
     */
    protected $user;

   
    public function setUser(Tbdetusuariodatos $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}