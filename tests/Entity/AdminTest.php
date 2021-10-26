<?php

namespace App\Tests;

use App\Entity\Admin;
use App\Entity\Image;
use App\Entity\Information;
use App\Entity\OpeningHours;
use App\Entity\Service;
use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Admin();
        $image = new Image();
        $OpeningHour = new OpeningHours();
        $service = new Service();
        $information = new Information();

        $user->setUsername('true'); 
        $user->setRoles(['ROLE']);
        $user->setPassword('123');
        $user->addImage($image);
        $user->addOpeningHour($OpeningHour);
        $user->addService($service);
        $user->addInformation($information);
              
        $this->assertTrue($user->getUserIdentifier() === 'true');
        $this->assertIsArray($user->getRoles(),'ROLE');
        $this->assertTrue($user->getPassword() === '123');
        $this->assertCount(1, $user->getImages());
        $this->assertCount(1, $user->getOpeningHours());
        $this->assertCount(1, $user->getInformation());
        $this->assertCount(1, $user->getservices());
    }

     public function testIsFalse()
    {
        $user = new Admin();
        $image = new Image();
        $OpeningHour = new OpeningHours();
        $service = new Service();
        $information = new Information();

        $user->setUsername('test');
        $user->setRoles(['ROLE']);
        $user->setPassword('123');
        $user->addImage($image);
        $user->addOpeningHour($OpeningHour);
        $user->addService($service);
        $user->addInformation($information);
           
        $this->assertFalse($user->getUserIdentifier() === 'false');
        $this->assertIsArray($user->getRoles(), 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getImages() === new Image());
        $this->assertFalse($user->getOpeningHours() === new OpeningHours);
        $this->assertFalse($user->getServices() === new Service());
        $this->assertFalse($user->getInformation() === new Information());
    }

     public function testIsEmpty()
    {
        $user = new Admin();
        /**If Password is unset : return null, expected String */
        $user->setPassword('');

        $this->assertEmpty($user->getUserIdentifier());
        $this->assertIsArray($user->getRoles(),'');
        $this->assertEmpty($user->getPassword(),'');
        $this->assertEmpty($user->getImages());
        $this->assertEmpty($user->getopeningHours());
        $this->assertEmpty($user->getServices());
        $this->assertEmpty($user->getInformation());
    }  
}
