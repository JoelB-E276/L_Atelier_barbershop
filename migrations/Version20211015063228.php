<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211015063228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
     /*    $this->addSql('DROP TABLE subcategory');
        $this->addSql('ALTER TABLE image ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F642B8210 ON image (admin_id)'); */
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
       /*  $this->addSql('CREATE TABLE subcategory (id INT AUTO_INCREMENT NOT NULL, subcategory VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F642B8210');
        $this->addSql('DROP INDEX IDX_C53D045F642B8210 ON image');
        $this->addSql('ALTER TABLE image DROP admin_id'); */
    }
}
