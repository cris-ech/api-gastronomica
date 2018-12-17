<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181217165534 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE reservation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, restaurante_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, fecha VARCHAR(20) NOT NULL, hora VARCHAR(10) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_42C8495538B81E49 ON reservation (restaurante_id)');
        $this->addSql('DROP INDEX IDX_A0F38FD238B81E49');
        $this->addSql('CREATE TEMPORARY TABLE __temp__valoration AS SELECT id, restaurante_id, name, rate, review FROM valoration');
        $this->addSql('DROP TABLE valoration');
        $this->addSql('CREATE TABLE valoration (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, restaurante_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, rate INTEGER NOT NULL, review VARCHAR(255) DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_A0F38FD238B81E49 FOREIGN KEY (restaurante_id) REFERENCES restaurante (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO valoration (id, restaurante_id, name, rate, review) SELECT id, restaurante_id, name, rate, review FROM __temp__valoration');
        $this->addSql('DROP TABLE __temp__valoration');
        $this->addSql('CREATE INDEX IDX_A0F38FD238B81E49 ON valoration (restaurante_id)');
        $this->addSql('DROP INDEX IDX_7479C8F238B81E49');
        $this->addSql('CREATE TEMPORARY TABLE __temp__oferta AS SELECT id, restaurante_id, name, description FROM oferta');
        $this->addSql('DROP TABLE oferta');
        $this->addSql('CREATE TABLE oferta (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, restaurante_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_7479C8F238B81E49 FOREIGN KEY (restaurante_id) REFERENCES restaurante (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO oferta (id, restaurante_id, name, description) SELECT id, restaurante_id, name, description FROM __temp__oferta');
        $this->addSql('DROP TABLE __temp__oferta');
        $this->addSql('CREATE INDEX IDX_7479C8F238B81E49 ON oferta (restaurante_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP INDEX IDX_7479C8F238B81E49');
        $this->addSql('CREATE TEMPORARY TABLE __temp__oferta AS SELECT id, restaurante_id, name, description FROM oferta');
        $this->addSql('DROP TABLE oferta');
        $this->addSql('CREATE TABLE oferta (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, restaurante_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO oferta (id, restaurante_id, name, description) SELECT id, restaurante_id, name, description FROM __temp__oferta');
        $this->addSql('DROP TABLE __temp__oferta');
        $this->addSql('CREATE INDEX IDX_7479C8F238B81E49 ON oferta (restaurante_id)');
        $this->addSql('DROP INDEX IDX_A0F38FD238B81E49');
        $this->addSql('CREATE TEMPORARY TABLE __temp__valoration AS SELECT id, restaurante_id, name, rate, review FROM valoration');
        $this->addSql('DROP TABLE valoration');
        $this->addSql('CREATE TABLE valoration (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, restaurante_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, rate INTEGER NOT NULL, review VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO valoration (id, restaurante_id, name, rate, review) SELECT id, restaurante_id, name, rate, review FROM __temp__valoration');
        $this->addSql('DROP TABLE __temp__valoration');
        $this->addSql('CREATE INDEX IDX_A0F38FD238B81E49 ON valoration (restaurante_id)');
    }
}
