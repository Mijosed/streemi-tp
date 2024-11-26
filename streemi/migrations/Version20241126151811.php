<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20241126151811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF675F31B');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBF2AF943');
        $this->addSql('DROP INDEX IDX_9474526CF675F31B ON comment');
        $this->addSql('ALTER TABLE comment CHANGE parent_comment_id parent_comment_id INT DEFAULT NULL, CHANGE content content LONGTEXT NOT NULL, CHANGE author_id publisher_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C40C86FCE FOREIGN KEY (publisher_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_9474526C40C86FCE ON comment (publisher_id)');
    }

    public function down(Schema $schema): void
    {
        
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C40C86FCE');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBF2AF943');
        $this->addSql('DROP INDEX IDX_9474526C40C86FCE ON comment');
        $this->addSql('ALTER TABLE comment CHANGE parent_comment_id parent_comment_id INT NOT NULL, CHANGE content content VARCHAR(255) NOT NULL, CHANGE publisher_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id)');
        $this->addSql('CREATE INDEX IDX_9474526CF675F31B ON comment (author_id)');
    }
}
