<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211004071446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        /* $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FA21214B7');
        $this->addSql('DROP INDEX IDX_C53D045FA21214B7 ON image');
        $this->addSql('ALTER TABLE image ADD category_id INT NOT NULL, DROP categories_id, DROP subcategory, DROP category, CHANGE image_alt image_alt VARCHAR(255) NOT NULL'); 
        
        The following line was created manually because category_id was deleted directly in the database. Uncomment the previous lines if necessary */
        
        $this->addSql('ALTER TABLE image ADD category_id INT DEFAULT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F12469DE2 ON image (category_id)');
        $this->addSql('ALTER TABLE information ADD phone_number_link VARCHAR(255) NOT NULL, CHANGE postal_code postal_code VARCHAR(255) NOT NULL, CHANGE phone_number phone_number VARCHAR(255) NOT NULL, CHANGE siret siret VARCHAR(255) NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(255) NOT NULL, CHANGE address address VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F12469DE2');
        $this->addSql('DROP INDEX IDX_C53D045F12469DE2 ON image');
        $this->addSql('ALTER TABLE image ADD categories_id INT DEFAULT NULL, ADD subcategory VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD category VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP category_id, CHANGE image_alt image_alt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FA21214B7 FOREIGN KEY (categories_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FA21214B7 ON image (categories_id)');
        $this->addSql('ALTER TABLE information DROP phone_number_link, CHANGE address address VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE postal_code postal_code VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone_number phone_number VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE siret siret VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE city city VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
