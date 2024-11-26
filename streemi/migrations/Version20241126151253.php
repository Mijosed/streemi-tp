<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241126151253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C63379586');
        $this->addSql('DROP INDEX IDX_9474526C63379586 ON comment');
        $this->addSql('ALTER TABLE comment DROP comments_id');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE comment ADD comments_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C63379586 FOREIGN KEY (comments_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_9474526C63379586 ON comment (comments_id)');
    }
}
