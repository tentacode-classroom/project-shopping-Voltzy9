<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181008134032 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE peripheral ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE peripheral ADD CONSTRAINT FK_32634B0912469DE2 FOREIGN KEY (category_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_32634B0912469DE2 ON peripheral (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE peripheral DROP FOREIGN KEY FK_32634B0912469DE2');
        $this->addSql('DROP INDEX IDX_32634B0912469DE2 ON peripheral');
        $this->addSql('ALTER TABLE peripheral DROP category_id');
    }
}
