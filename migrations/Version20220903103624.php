<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220903103624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domaine_detude DROP FOREIGN KEY FK_F6B203F8544A4CCA');
        $this->addSql('DROP INDEX IDX_F6B203F8544A4CCA ON domaine_detude');
        $this->addSql('ALTER TABLE domaine_detude DROP infos_id');
        $this->addSql('ALTER TABLE location_university DROP FOREIGN KEY FK_19528433544A4CCA');
        $this->addSql('DROP INDEX IDX_19528433544A4CCA ON location_university');
        $this->addSql('ALTER TABLE location_university DROP infos_id');
        $this->addSql('ALTER TABLE nationality DROP FOREIGN KEY FK_8AC58B70544A4CCA');
        $this->addSql('DROP INDEX IDX_8AC58B70544A4CCA ON nationality');
        $this->addSql('ALTER TABLE nationality DROP infos_id');
        $this->addSql('ALTER TABLE program DROP FOREIGN KEY FK_92ED7784544A4CCA');
        $this->addSql('DROP INDEX IDX_92ED7784544A4CCA ON program');
        $this->addSql('ALTER TABLE program DROP infos_id');
        $this->addSql('ALTER TABLE university DROP FOREIGN KEY FK_A07A85EC544A4CCA');
        $this->addSql('DROP INDEX IDX_A07A85EC544A4CCA ON university');
        $this->addSql('ALTER TABLE university DROP infos_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domaine_detude ADD infos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE domaine_detude ADD CONSTRAINT FK_F6B203F8544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('CREATE INDEX IDX_F6B203F8544A4CCA ON domaine_detude (infos_id)');
        $this->addSql('ALTER TABLE location_university ADD infos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location_university ADD CONSTRAINT FK_19528433544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('CREATE INDEX IDX_19528433544A4CCA ON location_university (infos_id)');
        $this->addSql('ALTER TABLE nationality ADD infos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nationality ADD CONSTRAINT FK_8AC58B70544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('CREATE INDEX IDX_8AC58B70544A4CCA ON nationality (infos_id)');
        $this->addSql('ALTER TABLE program ADD infos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE program ADD CONSTRAINT FK_92ED7784544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('CREATE INDEX IDX_92ED7784544A4CCA ON program (infos_id)');
        $this->addSql('ALTER TABLE university ADD infos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE university ADD CONSTRAINT FK_A07A85EC544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('CREATE INDEX IDX_A07A85EC544A4CCA ON university (infos_id)');
    }
}
