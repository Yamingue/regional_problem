<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005235142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE problem_zone (problem_id INT NOT NULL, zone_id INT NOT NULL, INDEX IDX_7AE4D745A0DCED86 (problem_id), INDEX IDX_7AE4D7459F2C3FAB (zone_id), PRIMARY KEY(problem_id, zone_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE problem_zone ADD CONSTRAINT FK_7AE4D745A0DCED86 FOREIGN KEY (problem_id) REFERENCES problem (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE problem_zone ADD CONSTRAINT FK_7AE4D7459F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE problem ADD compagnie_id INT NOT NULL, ADD create_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE problem ADD CONSTRAINT FK_D7E7CCC852FBE437 FOREIGN KEY (compagnie_id) REFERENCES compagnie (id)');
        $this->addSql('CREATE INDEX IDX_D7E7CCC852FBE437 ON problem (compagnie_id)');
        $this->addSql('ALTER TABLE zone ADD problem_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007A0DCED86 FOREIGN KEY (problem_id) REFERENCES problem (id)');
        $this->addSql('CREATE INDEX IDX_A0EBC007A0DCED86 ON zone (problem_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE problem_zone');
        $this->addSql('ALTER TABLE problem DROP FOREIGN KEY FK_D7E7CCC852FBE437');
        $this->addSql('DROP INDEX IDX_D7E7CCC852FBE437 ON problem');
        $this->addSql('ALTER TABLE problem DROP compagnie_id, DROP create_at');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC007A0DCED86');
        $this->addSql('DROP INDEX IDX_A0EBC007A0DCED86 ON zone');
        $this->addSql('ALTER TABLE zone DROP problem_id');
    }
}
