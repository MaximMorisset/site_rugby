<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010061446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE terrain_club (terrain_id INT NOT NULL, club_id INT NOT NULL, PRIMARY KEY(terrain_id, club_id))');
        $this->addSql('CREATE INDEX IDX_428B80258A2D8B41 ON terrain_club (terrain_id)');
        $this->addSql('CREATE INDEX IDX_428B802561190A32 ON terrain_club (club_id)');
        $this->addSql('ALTER TABLE terrain_club ADD CONSTRAINT FK_428B80258A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE terrain_club ADD CONSTRAINT FK_428B802561190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateurs DROP fonction');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE terrain_club DROP CONSTRAINT FK_428B80258A2D8B41');
        $this->addSql('ALTER TABLE terrain_club DROP CONSTRAINT FK_428B802561190A32');
        $this->addSql('DROP TABLE terrain_club');
        $this->addSql('ALTER TABLE utilisateurs ADD fonction VARCHAR(255) DEFAULT NULL');
    }
}
