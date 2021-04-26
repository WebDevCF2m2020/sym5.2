<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\Section;
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

        // Section's datas
        $section = new Section();
        $section->setSectiontitle("Belgique");
        $section->setSectionslug("belgique");
        $section->setSectiondesc("Les actualités en Belgique");
        $manager->persist($section);

        $section = new Section();
        $section->setSectiontitle("International");
        $section->setSectionslug("international");
        $section->setSectiondesc("Les actualités internationales");
        $manager->persist($section);

        $section = new Section();
        $section->setSectiontitle("Sport");
        $section->setSectionslug("sport");
        $section->setSectiondesc("Les actualités sportives");
        $manager->persist($section);

        $section = new Section();
        $section->setSectiontitle("Art");
        $section->setSectionslug("art");
        $section->setSectiondesc("Les actualités culturelles et artistiques");
        $manager->persist($section);

        $manager->flush();
    }
}
