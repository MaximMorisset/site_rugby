<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017132230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE images_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE images (id INT NOT NULL, image_club_id INT DEFAULT NULL, image_utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E01FBE6AF4095DEE ON images (image_club_id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6A6C1E3625 ON images (image_utilisateur_id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AF4095DEE FOREIGN KEY (image_club_id) REFERENCES club (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A6C1E3625 FOREIGN KEY (image_utilisateur_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE images_id_seq CASCADE');
        $this->addSql('ALTER TABLE images DROP CONSTRAINT FK_E01FBE6AF4095DEE');
        $this->addSql('ALTER TABLE images DROP CONSTRAINT FK_E01FBE6A6C1E3625');
        $this->addSql('DROP TABLE images');
    }
}
