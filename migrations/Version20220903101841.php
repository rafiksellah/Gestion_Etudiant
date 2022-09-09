<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220903101841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C966544A4CCA');
        $this->addSql('DROP INDEX IDX_5373C966544A4CCA ON country');
        $this->addSql('ALTER TABLE country DROP infos_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country ADD infos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C966544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('CREATE INDEX IDX_5373C966544A4CCA ON country (infos_id)');
    }
}
