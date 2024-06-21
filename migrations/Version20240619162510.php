<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619162510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson_type CHANGE nb_lesson duration_in_minutes INT NOT NULL');
        $this->addSql('ALTER TABLE lessons_remaining ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE lessons_remaining ADD CONSTRAINT FK_65F88255C54C8C93 FOREIGN KEY (type_id) REFERENCES lesson_type (id)');
        $this->addSql('CREATE INDEX IDX_65F88255C54C8C93 ON lessons_remaining (type_id)');
        $this->addSql('ALTER TABLE package ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE package ADD CONSTRAINT FK_DE686795C54C8C93 FOREIGN KEY (type_id) REFERENCES lesson_type (id)');
        $this->addSql('CREATE INDEX IDX_DE686795C54C8C93 ON package (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson_type CHANGE duration_in_minutes nb_lesson INT NOT NULL');
        $this->addSql('ALTER TABLE lessons_remaining DROP FOREIGN KEY FK_65F88255C54C8C93');
        $this->addSql('DROP INDEX IDX_65F88255C54C8C93 ON lessons_remaining');
        $this->addSql('ALTER TABLE lessons_remaining DROP type_id');
        $this->addSql('ALTER TABLE package DROP FOREIGN KEY FK_DE686795C54C8C93');
        $this->addSql('DROP INDEX IDX_DE686795C54C8C93 ON package');
        $this->addSql('ALTER TABLE package DROP type_id');
    }
}
