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
        $file = new File('public/image/capture1-615adf3651076961319174.jpg',true);
        $dateTime = new \DateTimeImmutable();
        $category = new Category();

        $image->setImageFile($file); 
        $image->setImageName('test1');
        $image->setImageSize(123);
        $image->setUpdatedAt($dateTime);
        $image->setImageAlt('test2');
        $image->setCategory($category);
              
        $this->assertTrue($image->getImageFile() === $file);
        $this->assertTrue($image->getImageName() === 'test1');
        $this->assertTrue($image->getImageSize() === 123);
        $this->assertTrue($image->getUpdatedAt() === $dateTime);
        $this->assertTrue($image->getImageAlt() === 'test2');
        $this->assertTrue($image->getCategory() === $category);
    }

    public function testIsFalse()
    {
        $image = new Image();
        $file = new File('public/image/capture1-615adf3651076961319174.jpg',true);
        $dateTime = new \DateTimeImmutable();
        $category = new Category();

        $image->setImageFile($file);
        $image->setImageName('true');
        $image->setImageSize(123);
        $image->setUpdatedAt($dateTime);
        $image->setImageAlt('true');
        $image->setCategory($category);
              
        $this->assertFalse($image->getImageFile() === new File('public/image/capture2-615adf4800bb7045733282.jpg',true));
        $this->assertFalse($image->getImageName() === 'false');
        $this->assertFalse($image->getImageSize() === 1234);
        $this->assertFalse($image->getUpdatedAt() === new \DateTimeImmutable());
        $this->assertFalse($image->getImageAlt() === 'false');
        $this->assertFalse($image->getCategory() === new Category());
    }

    public function testIsEmpty()
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
