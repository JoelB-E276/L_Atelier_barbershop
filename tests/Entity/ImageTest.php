<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Image;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\File\File;


class ImageTest extends TestCase
{
    public function testIsTrue()
    {
        $image = new Image();
        $file = new File('path');
        $dateTime = new \DateTimeImmutable();
        $category = new Category();

/*         $image->setImageFile($file) 
 */        $image->setImageName('test')
              ->setImageSize(123)
              ->setUpdatedAt($dateTime)
              ->setImageAlt('test2')
              ->setCategory();
              
        $this->assertTrue($image->getImageFile() === $file);
        $this->assertTrue($image->getImageName() === 'test1');
        $this->assertTrue($image->getImageSize() === 123);
        $this->assertTrue($image->getUpdatedAt()=== $dateTime);
        $this->assertTrue($image->getImageAlt()=== 'test2');
        $this->assertTrue($image->getCategory() === $category);
    }

    public function testIsFalse()
    {
        $image = new Image();
        $file = new File('path');
        $dateTime = new \DateTimeImmutable();
        $category = new Category();

        /* $image->setImageFile($file) */
           $image->setImageName('test')
              ->setImageSize(123)
              ->setUpdatedAt($dateTime)
              ->setImageAlt('test2')
              ->setCategory();
              
        $this->assertFalse($image->getImageFile() === $file);
        $this->assertFalse($image->getImageName() === 'False1');
        $this->assertFalse($image->getImageSize() === 123);
        $this->assertFalse($image->getUpdatedAt()=== new \DateTimeImmutable());
        $this->assertFalse($image->getImageAlt()=== 'false2');
        $this->assertFalse($image->getCategory() === $category);
    }

    public function testEmpty()
    {
        $image = new Image();

        $this->assertEmpty($image->getImageFile());
        $this->assertEmpty($image->getImageName());
        $this->assertEmpty($image->getImageSize());
        $this->assertEmpty($image->getUpdatedAt());
        $this->assertEmpty($image->getImageAlt());
        $this->assertEmpty($image->getCategory());


    }

}
