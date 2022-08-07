<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Article;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');
        $dateArrondie = new DateTime(date('Y-m-d H:i:00'));
        $slugify = new Slugify();

        for($i = 1; $i < 6; $i++) {

            $article = new Article();
            $article->setTitle($faker->text(50));
            $article->setContent($faker->text(3000));
            $article->setDateCreated($dateArrondie);
            
            $slug = $slugify->slugify($article->getTitle()); 
            $article->setSlug($slug);

            $article->setPicture('galaxy-11098_1280-7dbd0b.jpg');

            $manager->persist($article);

        }

        $manager->flush();
    }
}
