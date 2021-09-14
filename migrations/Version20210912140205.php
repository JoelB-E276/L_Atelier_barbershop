<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210912140205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) DEFAULT NULL, postal_code INT DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, siret VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FED5CA9E6');
        $this->addSql('DROP INDEX UNIQ_C53D045FED5CA9E6 ON image');
        $this->addSql('ALTER TABLE image DROP service_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE information');
        $this->addSql('ALTER TABLE image ADD service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C53D045FED5CA9E6 ON image (service_id)');
    }
}
