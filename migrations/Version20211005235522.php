<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005235522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, tel BIGINT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC007A0DCED86');
        $this->addSql('DROP INDEX IDX_A0EBC007A0DCED86 ON zone');
        $this->addSql('ALTER TABLE zone DROP problem_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE zone ADD problem_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007A0DCED86 FOREIGN KEY (problem_id) REFERENCES problem (id)');
        $this->addSql('CREATE INDEX IDX_A0EBC007A0DCED86 ON zone (problem_id)');
    }
}
