<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722120116 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE act (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, duration INT NOT NULL, picture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE act_performer (act_id INT NOT NULL, performer_id INT NOT NULL, INDEX IDX_74111850D1A55B28 (act_id), INDEX IDX_741118506C6B33F3 (performer_id), PRIMARY KEY(act_id, performer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, name VARCHAR(255) NOT NULL, nb_tickets INT NOT NULL, INDEX IDX_E00CEDDE71F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, address LONGTEXT NOT NULL, date DATE NOT NULL, time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_act (event_id INT NOT NULL, act_id INT NOT NULL, INDEX IDX_BE23309771F7E88B (event_id), INDEX IDX_BE233097D1A55B28 (act_id), PRIMARY KEY(event_id, act_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE performer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, biography LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE act_performer ADD CONSTRAINT FK_74111850D1A55B28 FOREIGN KEY (act_id) REFERENCES act (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE act_performer ADD CONSTRAINT FK_741118506C6B33F3 FOREIGN KEY (performer_id) REFERENCES performer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE event_act ADD CONSTRAINT FK_BE23309771F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_act ADD CONSTRAINT FK_BE233097D1A55B28 FOREIGN KEY (act_id) REFERENCES act (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE act_performer DROP FOREIGN KEY FK_74111850D1A55B28');
        $this->addSql('ALTER TABLE event_act DROP FOREIGN KEY FK_BE233097D1A55B28');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE71F7E88B');
        $this->addSql('ALTER TABLE event_act DROP FOREIGN KEY FK_BE23309771F7E88B');
        $this->addSql('ALTER TABLE act_performer DROP FOREIGN KEY FK_741118506C6B33F3');
        $this->addSql('DROP TABLE act');
        $this->addSql('DROP TABLE act_performer');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_act');
        $this->addSql('DROP TABLE performer');
        $this->addSql('DROP TABLE user');
    }
}
