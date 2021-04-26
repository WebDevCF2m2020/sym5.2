<?php

namespace App\DataFixtures;

use App\Entity\Message;
use App\Entity\Role;
use App\Entity\Section;
use App\Entity\User;
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

        // User's datas
        $user = new User();
        $user->setUserlogin("Mikhawa");
        $user->setUsermail("michaeljpitz@gmail.com");
        $user->setUserpwd("1234");
        $user->addRoleIdrole($manager->getRepository(Role::class)->findOneBy(['roleslug' => 'admin']));
        $manager->persist($user);

        $user = new User();
        $user->setUserlogin("Michaël");
        $user->setUsermail("michael.j.pitz@gmail.com");
        $user->setUserpwd("1234");
        $user->addRoleIdrole($manager->getRepository(Role::class)->findOneBy(['roleslug' => 'moderator']));
        $manager->persist($user);

        $user = new User();
        $user->setUserlogin("Mike");
        $user->setUsermail("mi.chael.j.pitz@gmail.com");
        $user->setUserpwd("1234");
        $user->addRoleIdrole($manager->getRepository(Role::class)->findOneBy(['roleslug' => 'user']));
        $manager->persist($user);

        $manager->flush();

        // Message's datas
        for ($i = 0; $i < 20; $i++) {
            $message = new Message();
            $title = "Le titre $i";
            $message->setMessagetitle($title);
            $message->setMessageslug("le-titre-$i");
            $message->setMessagetext("Du texte $i - " . uniqid());
            $message->setMessagedate(new \DateTime());
            $sections = $manager->getRepository(Section::class)->findAll();
            $manager->persist($message);
            foreach ($sections as $item) {
                $rand = mt_rand(0,1);
                if($rand) {
                    $message->addSectionIdsection($item);

                    }
                }
            $manager->persist($message);
        }

        $manager->flush();
    }
}
