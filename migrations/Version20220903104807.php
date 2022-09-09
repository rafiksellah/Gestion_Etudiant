<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220903104807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE infos ADD domaine_detude_id INT DEFAULT NULL, ADD location_university_id INT DEFAULT NULL, ADD nationality_id INT DEFAULT NULL, ADD program_id INT DEFAULT NULL, ADD university_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE infos ADD CONSTRAINT FK_EECA826DD3D466CD FOREIGN KEY (domaine_detude_id) REFERENCES domaine_detude (id)');
        $this->addSql('ALTER TABLE infos ADD CONSTRAINT FK_EECA826D9AE6F377 FOREIGN KEY (location_university_id) REFERENCES location_university (id)');
        $this->addSql('ALTER TABLE infos ADD CONSTRAINT FK_EECA826D1C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
        $this->addSql('ALTER TABLE infos ADD CONSTRAINT FK_EECA826D3EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
        $this->addSql('ALTER TABLE infos ADD CONSTRAINT FK_EECA826D309D1878 FOREIGN KEY (university_id) REFERENCES university (id)');
        $this->addSql('CREATE INDEX IDX_EECA826DD3D466CD ON infos (domaine_detude_id)');
        $this->addSql('CREATE INDEX IDX_EECA826D9AE6F377 ON infos (location_university_id)');
        $this->addSql('CREATE INDEX IDX_EECA826D1C9DA55 ON infos (nationality_id)');
        $this->addSql('CREATE INDEX IDX_EECA826D3EB8070A ON infos (program_id)');
        $this->addSql('CREATE INDEX IDX_EECA826D309D1878 ON infos (university_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE infos DROP FOREIGN KEY FK_EECA826DD3D466CD');
        $this->addSql('ALTER TABLE infos DROP FOREIGN KEY FK_EECA826D9AE6F377');
        $this->addSql('ALTER TABLE infos DROP FOREIGN KEY FK_EECA826D1C9DA55');
        $this->addSql('ALTER TABLE infos DROP FOREIGN KEY FK_EECA826D3EB8070A');
        $this->addSql('ALTER TABLE infos DROP FOREIGN KEY FK_EECA826D309D1878');
        $this->addSql('DROP INDEX IDX_EECA826DD3D466CD ON infos');
        $this->addSql('DROP INDEX IDX_EECA826D9AE6F377 ON infos');
        $this->addSql('DROP INDEX IDX_EECA826D1C9DA55 ON infos');
        $this->addSql('DROP INDEX IDX_EECA826D3EB8070A ON infos');
        $this->addSql('DROP INDEX IDX_EECA826D309D1878 ON infos');
        $this->addSql('ALTER TABLE infos DROP domaine_detude_id, DROP location_university_id, DROP nationality_id, DROP program_id, DROP university_id');
    }
}
