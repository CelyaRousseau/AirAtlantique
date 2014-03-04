<?php
namespace AirAtlantique\GeneratorBundle\Service;

use AirAtlantique\UserBundle\Entity\User;

class UtilUser
{
    public function generateUser()
    {
        $users;
        for($i=0;$i<200)
        {
            User $user = new User();
            
            $users[$i] = $user;
        }
    }
}