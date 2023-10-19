<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019072409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE etat_notification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE notification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_notification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE etat_notification (id INT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE notification (id INT NOT NULL, destinataire_id INT DEFAULT NULL, demande_adhesion_id INT DEFAULT NULL, type_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, date_creation TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BF5476CAA4F84F6E ON notification (destinataire_id)');
        $this->addSql('CREATE INDEX IDX_BF5476CA57A666A3 ON notification (demande_adhesion_id)');
        $this->addSql('CREATE INDEX IDX_BF5476CAC54C8C93 ON notification (type_id)');
        $this->addSql('CREATE INDEX IDX_BF5476CAD5E86FF ON notification (etat_id)');
        $this->addSql('CREATE TABLE type_notification (id INT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA4F84F6E FOREIGN KEY (destinataire_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA57A666A3 FOREIGN KEY (demande_adhesion_id) REFERENCES adhesion_club (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAC54C8C93 FOREIGN KEY (type_id) REFERENCES type_notification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAD5E86FF FOREIGN KEY (etat_id) REFERENCES etat_notification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE etat_notification_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE notification_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_notification_id_seq CASCADE');
        $this->addSql('ALTER TABLE notification DROP CONSTRAINT FK_BF5476CAA4F84F6E');
        $this->addSql('ALTER TABLE notification DROP CONSTRAINT FK_BF5476CA57A666A3');
        $this->addSql('ALTER TABLE notification DROP CONSTRAINT FK_BF5476CAC54C8C93');
        $this->addSql('ALTER TABLE notification DROP CONSTRAINT FK_BF5476CAD5E86FF');
        $this->addSql('DROP TABLE etat_notification');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE type_notification');
    }
}
