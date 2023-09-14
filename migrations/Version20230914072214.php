<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230914072214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE club_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE entrainement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE equipe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE equipe_match_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE equipement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE matchs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE poste_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE stats_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE terrain_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE utilisateurs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE club (id INT NOT NULL, equipe_match_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B8EE3872E8B1536D ON club (equipe_match_id)');
        $this->addSql('CREATE TABLE entrainement (id INT NOT NULL, date_heure TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, lieu TEXT NOT NULL, annule BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE equipe (id INT NOT NULL, nom_equipe VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE equipe_match (id INT NOT NULL, matchs_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2057538F88EB7468 ON equipe_match (matchs_id)');
        $this->addSql('CREATE TABLE equipement (id INT NOT NULL, club_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, nbr INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B8B4C6F361190A32 ON equipement (club_id)');
        $this->addSql('CREATE TABLE matchs (id INT NOT NULL, terrain_id INT DEFAULT NULL, date_heure TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, equipe_club VARCHAR(255) NOT NULL, adveradversaire VARCHAR(255) NOT NULL, lieu TEXT NOT NULL, prix INT NOT NULL, amicale BOOLEAN NOT NULL, annule BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6B1E60418A2D8B41 ON matchs (terrain_id)');
        $this->addSql('CREATE TABLE poste (id INT NOT NULL, nom VARCHAR(255) NOT NULL, titulaire BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE poste_utilisateurs (poste_id INT NOT NULL, utilisateurs_id INT NOT NULL, PRIMARY KEY(poste_id, utilisateurs_id))');
        $this->addSql('CREATE INDEX IDX_75B073CBA0905086 ON poste_utilisateurs (poste_id)');
        $this->addSql('CREATE INDEX IDX_75B073CB1E969C5 ON poste_utilisateurs (utilisateurs_id)');
        $this->addSql('CREATE TABLE stats (id INT NOT NULL, utilisateurs_id INT DEFAULT NULL, points_marque INT DEFAULT NULL, nbr_essai INT DEFAULT NULL, points_marque_pieds INT DEFAULT NULL, plaquage INT DEFAULT NULL, plaquage_reussi INT DEFAULT NULL, plaquage_rate INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_574767AA1E969C5 ON stats (utilisateurs_id)');
        $this->addSql('CREATE TABLE terrain (id INT NOT NULL, entrainement_id INT DEFAULT NULL, lieu TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C87653B1A15E8FD ON terrain (entrainement_id)');
        $this->addSql('CREATE TABLE utilisateurs (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, annee_naissance DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EE7927C74 ON utilisateurs (email)');
        $this->addSql('CREATE TABLE utilisateurs_equipe (utilisateurs_id INT NOT NULL, equipe_id INT NOT NULL, PRIMARY KEY(utilisateurs_id, equipe_id))');
        $this->addSql('CREATE INDEX IDX_9A8DD1D1E969C5 ON utilisateurs_equipe (utilisateurs_id)');
        $this->addSql('CREATE INDEX IDX_9A8DD1D6D861B89 ON utilisateurs_equipe (equipe_id)');
        $this->addSql('CREATE TABLE utilisateurs_club (utilisateurs_id INT NOT NULL, club_id INT NOT NULL, PRIMARY KEY(utilisateurs_id, club_id))');
        $this->addSql('CREATE INDEX IDX_5360D5FA1E969C5 ON utilisateurs_club (utilisateurs_id)');
        $this->addSql('CREATE INDEX IDX_5360D5FA61190A32 ON utilisateurs_club (club_id)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872E8B1536D FOREIGN KEY (equipe_match_id) REFERENCES equipe_match (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE equipe_match ADD CONSTRAINT FK_2057538F88EB7468 FOREIGN KEY (matchs_id) REFERENCES matchs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F361190A32 FOREIGN KEY (club_id) REFERENCES club (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E60418A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE poste_utilisateurs ADD CONSTRAINT FK_75B073CBA0905086 FOREIGN KEY (poste_id) REFERENCES poste (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE poste_utilisateurs ADD CONSTRAINT FK_75B073CB1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AA1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE terrain ADD CONSTRAINT FK_C87653B1A15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateurs_equipe ADD CONSTRAINT FK_9A8DD1D1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateurs_equipe ADD CONSTRAINT FK_9A8DD1D6D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateurs_club ADD CONSTRAINT FK_5360D5FA1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateurs_club ADD CONSTRAINT FK_5360D5FA61190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE club_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE entrainement_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE equipe_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE equipe_match_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE equipement_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE matchs_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE poste_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE stats_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE terrain_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE utilisateurs_id_seq CASCADE');
        $this->addSql('ALTER TABLE club DROP CONSTRAINT FK_B8EE3872E8B1536D');
        $this->addSql('ALTER TABLE equipe_match DROP CONSTRAINT FK_2057538F88EB7468');
        $this->addSql('ALTER TABLE equipement DROP CONSTRAINT FK_B8B4C6F361190A32');
        $this->addSql('ALTER TABLE matchs DROP CONSTRAINT FK_6B1E60418A2D8B41');
        $this->addSql('ALTER TABLE poste_utilisateurs DROP CONSTRAINT FK_75B073CBA0905086');
        $this->addSql('ALTER TABLE poste_utilisateurs DROP CONSTRAINT FK_75B073CB1E969C5');
        $this->addSql('ALTER TABLE stats DROP CONSTRAINT FK_574767AA1E969C5');
        $this->addSql('ALTER TABLE terrain DROP CONSTRAINT FK_C87653B1A15E8FD');
        $this->addSql('ALTER TABLE utilisateurs_equipe DROP CONSTRAINT FK_9A8DD1D1E969C5');
        $this->addSql('ALTER TABLE utilisateurs_equipe DROP CONSTRAINT FK_9A8DD1D6D861B89');
        $this->addSql('ALTER TABLE utilisateurs_club DROP CONSTRAINT FK_5360D5FA1E969C5');
        $this->addSql('ALTER TABLE utilisateurs_club DROP CONSTRAINT FK_5360D5FA61190A32');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE entrainement');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE equipe_match');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE matchs');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE poste_utilisateurs');
        $this->addSql('DROP TABLE stats');
        $this->addSql('DROP TABLE terrain');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE utilisateurs_equipe');
        $this->addSql('DROP TABLE utilisateurs_club');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
