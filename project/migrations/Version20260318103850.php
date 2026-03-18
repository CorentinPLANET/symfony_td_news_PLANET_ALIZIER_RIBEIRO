<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260318103850 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE promo (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, matine TINYINT NOT NULL, cours VARCHAR(255) NOT NULL, professeur VARCHAR(255) NOT NULL, salle VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, dates DATE NOT NULL, promo_id INT NOT NULL, INDEX IDX_5A3811FBD0C07AFF (promo_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBD0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FBD0C07AFF');
        $this->addSql('DROP TABLE promo');
        $this->addSql('DROP TABLE schedule');
    }
}
