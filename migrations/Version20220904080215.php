<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220904080215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stuednt_residance (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE infos ADD student_residance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE infos ADD CONSTRAINT FK_EECA826DE6B3CA19 FOREIGN KEY (student_residance_id) REFERENCES stuednt_residance (id)');
        $this->addSql('CREATE INDEX IDX_EECA826DE6B3CA19 ON infos (student_residance_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE infos DROP FOREIGN KEY FK_EECA826DE6B3CA19');
        $this->addSql('DROP TABLE stuednt_residance');
        $this->addSql('DROP INDEX IDX_EECA826DE6B3CA19 ON infos');
        $this->addSql('ALTER TABLE infos DROP student_residance_id');
    }
}
