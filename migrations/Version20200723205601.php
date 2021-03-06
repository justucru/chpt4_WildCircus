<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200723205601 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE act DROP updated_at');
        $this->addSql('ALTER TABLE booking ADD email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE performer DROP updated_at');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE act ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE booking DROP email');
        $this->addSql('ALTER TABLE performer ADD updated_at DATETIME DEFAULT NULL');
    }
}
