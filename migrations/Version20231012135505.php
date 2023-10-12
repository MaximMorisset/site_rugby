<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012135505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE adhesion_club_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adhesion_club (id INT NOT NULL, date_demande VARCHAR(255) DEFAULT NULL, date_appro VARCHAR(255) DEFAULT NULL, role VARCHAR(255) DEFAULT NULL, statut_adhesion VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE adhesion_club_utilisateurs (adhesion_club_id INT NOT NULL, utilisateurs_id INT NOT NULL, PRIMARY KEY(adhesion_club_id, utilisateurs_id))');
        $this->addSql('CREATE INDEX IDX_5A036E26A3FB45C5 ON adhesion_club_utilisateurs (adhesion_club_id)');
        $this->addSql('CREATE INDEX IDX_5A036E261E969C5 ON adhesion_club_utilisateurs (utilisateurs_id)');
        $this->addSql('CREATE TABLE adhesion_club_club (adhesion_club_id INT NOT NULL, club_id INT NOT NULL, PRIMARY KEY(adhesion_club_id, club_id))');
        $this->addSql('CREATE INDEX IDX_61B81B0BA3FB45C5 ON adhesion_club_club (adhesion_club_id)');
        $this->addSql('CREATE INDEX IDX_61B81B0B61190A32 ON adhesion_club_club (club_id)');
        $this->addSql('ALTER TABLE adhesion_club_utilisateurs ADD CONSTRAINT FK_5A036E26A3FB45C5 FOREIGN KEY (adhesion_club_id) REFERENCES adhesion_club (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adhesion_club_utilisateurs ADD CONSTRAINT FK_5A036E261E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adhesion_club_club ADD CONSTRAINT FK_61B81B0BA3FB45C5 FOREIGN KEY (adhesion_club_id) REFERENCES adhesion_club (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adhesion_club_club ADD CONSTRAINT FK_61B81B0B61190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE club ADD fondateur VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD fondateur VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE adhesion_club_id_seq CASCADE');
        $this->addSql('ALTER TABLE adhesion_club_utilisateurs DROP CONSTRAINT FK_5A036E26A3FB45C5');
        $this->addSql('ALTER TABLE adhesion_club_utilisateurs DROP CONSTRAINT FK_5A036E261E969C5');
        $this->addSql('ALTER TABLE adhesion_club_club DROP CONSTRAINT FK_61B81B0BA3FB45C5');
        $this->addSql('ALTER TABLE adhesion_club_club DROP CONSTRAINT FK_61B81B0B61190A32');
        $this->addSql('DROP TABLE adhesion_club');
        $this->addSql('DROP TABLE adhesion_club_utilisateurs');
        $this->addSql('DROP TABLE adhesion_club_club');
        $this->addSql('ALTER TABLE club DROP fondateur');
        $this->addSql('ALTER TABLE utilisateurs DROP fondateur');
    }
}
