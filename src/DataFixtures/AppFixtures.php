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
        $role->setRolename("Admin");
        $role->setRolevalue("{'role':'ROLE_ADMIN'}");
        $role->setRolecol("");
        $manager->persist($role);

        $role = new Role();
        $role->setRolename("Moderator");
        $role->setRolevalue("{'role':'ROLE_MOD'}");
        $role->setRolecol("");
        $manager->persist($role);

        $role = new Role();
        $role->setRolename("User");
        $role->setRolevalue("{'role':'ROLE_USER'}");
        $role->setRolecol("");
        $manager->persist($role);

        $manager->flush();
    }
}
