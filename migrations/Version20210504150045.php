<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504150045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message (idmessage INT UNSIGNED AUTO_INCREMENT NOT NULL, user_iduser INT UNSIGNED DEFAULT NULL, messagetitle VARCHAR(150) NOT NULL, messageslug VARCHAR(150) NOT NULL, messagetext TEXT NOT NULL, messagedate DATETIME DEFAULT CURRENT_TIMESTAMP, INDEX fk_message_user1_idx (user_iduser), UNIQUE INDEX messageslug_UNIQUE (messageslug), PRIMARY KEY(idmessage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_has_section (message_idmessage INT UNSIGNED NOT NULL, section_idsection INT UNSIGNED NOT NULL, INDEX IDX_2AFD4CCD3006427 (message_idmessage), INDEX IDX_2AFD4CCD903A5804 (section_idsection), PRIMARY KEY(message_idmessage, section_idsection)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (idrole INT UNSIGNED AUTO_INCREMENT NOT NULL, rolename VARCHAR(100) NOT NULL, roleslug VARCHAR(45) NOT NULL, rolevalue VARCHAR(60) NOT NULL, UNIQUE INDEX rolename_UNIQUE (rolename), PRIMARY KEY(idrole)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (idsection INT UNSIGNED AUTO_INCREMENT NOT NULL, sectiontitle VARCHAR(100) NOT NULL, sectionslug VARCHAR(100) NOT NULL, sectiondesc VARCHAR(500) DEFAULT NULL, UNIQUE INDEX sectionslug_UNIQUE (sectionslug), PRIMARY KEY(idsection)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (iduser INT UNSIGNED AUTO_INCREMENT NOT NULL, userlogin VARCHAR(60) NOT NULL, userpwd VARCHAR(256) NOT NULL, usermail VARCHAR(160) NOT NULL, UNIQUE INDEX userlogin_UNIQUE (userlogin), UNIQUE INDEX usermail_UNIQUE (usermail), PRIMARY KEY(iduser)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_has_role (user_iduser INT UNSIGNED NOT NULL, role_idrole INT UNSIGNED NOT NULL, INDEX IDX_EAB8B5353B0E3CD4 (user_iduser), INDEX IDX_EAB8B5352F809A7B (role_idrole), PRIMARY KEY(user_iduser, role_idrole)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F3B0E3CD4 FOREIGN KEY (user_iduser) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE message_has_section ADD CONSTRAINT FK_2AFD4CCD3006427 FOREIGN KEY (message_idmessage) REFERENCES message (idmessage)');
        $this->addSql('ALTER TABLE message_has_section ADD CONSTRAINT FK_2AFD4CCD903A5804 FOREIGN KEY (section_idsection) REFERENCES section (idsection)');
        $this->addSql('ALTER TABLE user_has_role ADD CONSTRAINT FK_EAB8B5353B0E3CD4 FOREIGN KEY (user_iduser) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE user_has_role ADD CONSTRAINT FK_EAB8B5352F809A7B FOREIGN KEY (role_idrole) REFERENCES role (idrole)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_has_section DROP FOREIGN KEY FK_2AFD4CCD3006427');
        $this->addSql('ALTER TABLE user_has_role DROP FOREIGN KEY FK_EAB8B5352F809A7B');
        $this->addSql('ALTER TABLE message_has_section DROP FOREIGN KEY FK_2AFD4CCD903A5804');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F3B0E3CD4');
        $this->addSql('ALTER TABLE user_has_role DROP FOREIGN KEY FK_EAB8B5353B0E3CD4');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE message_has_section');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_has_role');
    }
}
