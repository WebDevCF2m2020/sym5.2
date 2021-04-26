<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Role's datas
        $role = new Role();
        $role->setRolename("Administrator");
        $role->setRoleslug("admin");
        $role->setRolevalue("{'role':'ROLE_ADMIN'}");
        $manager->persist($role);

        $role = new Role();
        $role->setRolename("Moderator");
        $role->setRoleslug("moderator");
        $role->setRolevalue("{'role':'ROLE_MOD'}");
        $manager->persist($role);

        $role = new Role();
        $role->setRolename("User");
        $role->setRoleslug("user");
        $role->setRolevalue("{'role':'ROLE_USER'}");
        $manager->persist($role);


        $manager->flush();
    }
}
