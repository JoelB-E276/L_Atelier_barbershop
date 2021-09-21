<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921071318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE information ADD image_name VARCHAR(255) DEFAULT NULL, ADD image_size INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD image_alt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE opening_hours ADD image_name VARCHAR(255) DEFAULT NULL, ADD image_size INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD image_alt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE update_at updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD information_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F2EF03101 FOREIGN KEY (information_id) REFERENCES information (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F2EF03101 ON image (information_id)');
        $this->addSql('ALTER TABLE information DROP image_name, DROP image_size, DROP updated_at, DROP image_alt');
        $this->addSql('ALTER TABLE opening_hours DROP image_name, DROP image_size, DROP updated_at, DROP image_alt');
        $this->addSql('ALTER TABLE service CHANGE updated_at update_at DATETIME NOT NULL');
    }
}
