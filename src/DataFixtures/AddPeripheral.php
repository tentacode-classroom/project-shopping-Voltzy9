<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Peripheral;

class AddPeripheral extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $type = new Type();
        $type->setName('Souris');
        $manager->persist($type);

        $peripheral1 = new Peripheral();
        $peripheral1->setName('Pulsfire');
        $peripheral1->setPrice(60);
        $peripheral1->setBrand('Hyper X');
        $peripheral1->setCategory($type);
        $peripheral1->setUrl('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh5gQNejLIHl54Rwx2QFphI6AQYnnmvOYKvZmVz5o_oihJMUBT5Q');

        $manager->persist($peripheral1);

        $type1 = new Type();
        $type1->setName('Clavier');
        $manager->persist($type1);

        $peripheral2 = new Peripheral();
        $peripheral2->setName('blackwindows');
        $peripheral2->setPrice(50);
        $peripheral2->setBrand('Razer');
        $peripheral2->setCategory($type1);
        $peripheral2->setUrl('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoJ2MtT8Sntqy18tTas4BS9r2bnsOlxRKZfrciDtTg4QM_1sf9SA');

        $manager->persist($peripheral2);

        $type2 = new Type();
        $type2->setName('Tapis de Souris');
        $manager->persist($type2);

        $peripheral3 = new Peripheral();
        $peripheral3->setName('BF3');
        $peripheral3->setPrice(20);
        $peripheral3->setBrand('Razer');
        $peripheral3->setCategory($type2);
        $peripheral3->setUrl('https://images-na.ssl-images-amazon.com/images/I/81DGHC9-WiL._SX355_.jpg');

        $manager->persist($peripheral3);

        $manager->flush();
    }
}
