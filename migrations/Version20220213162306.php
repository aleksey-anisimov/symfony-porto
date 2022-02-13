<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220213162306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accounting_section_account_container_account (id VARCHAR(255) NOT NULL, owner_id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, deleted BOOLEAN NOT NULL, type VARCHAR(255) NOT NULL, balance INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AC2CD0CE7E3C61F9 ON accounting_section_account_container_account (owner_id)');
        $this->addSql('CREATE TABLE accounting_section_account_container_owner (id VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE accounting_section_transaction_container_account (id VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE accounting_section_transaction_container_transaction (id VARCHAR(255) NOT NULL, source_account_id VARCHAR(255) NOT NULL, source_destination_id VARCHAR(255) NOT NULL, comment VARCHAR(255) NOT NULL, value INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_77ADF8B3E7DF2E9E ON accounting_section_transaction_container_transaction (source_account_id)');
        $this->addSql('CREATE INDEX IDX_77ADF8B322150DE5 ON accounting_section_transaction_container_transaction (source_destination_id)');
        $this->addSql('CREATE TABLE blog_section_article_container_article (id VARCHAR(255) NOT NULL, author_id VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, text TEXT NOT NULL, disabled BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2C4AD12EF675F31B ON blog_section_article_container_article (author_id)');
        $this->addSql('CREATE TABLE blog_section_article_container_author (id VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE blog_section_comment_container_article (id VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE blog_section_comment_container_author (id VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE blog_section_comment_container_comment (id VARCHAR(255) NOT NULL, author_id VARCHAR(255) NOT NULL, article_id VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_516D6724F675F31B ON blog_section_comment_container_comment (author_id)');
        $this->addSql('CREATE INDEX IDX_516D67247294869C ON blog_section_comment_container_comment (article_id)');
        $this->addSql('CREATE TABLE security_section_security_user_container_security_user (id VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_container_user (id VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE accounting_section_account_container_account ADD CONSTRAINT FK_AC2CD0CE7E3C61F9 FOREIGN KEY (owner_id) REFERENCES accounting_section_account_container_owner (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE accounting_section_transaction_container_transaction ADD CONSTRAINT FK_77ADF8B3E7DF2E9E FOREIGN KEY (source_account_id) REFERENCES accounting_section_transaction_container_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE accounting_section_transaction_container_transaction ADD CONSTRAINT FK_77ADF8B322150DE5 FOREIGN KEY (source_destination_id) REFERENCES accounting_section_transaction_container_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE blog_section_article_container_article ADD CONSTRAINT FK_2C4AD12EF675F31B FOREIGN KEY (author_id) REFERENCES blog_section_article_container_author (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE blog_section_comment_container_comment ADD CONSTRAINT FK_516D6724F675F31B FOREIGN KEY (author_id) REFERENCES blog_section_comment_container_author (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE blog_section_comment_container_comment ADD CONSTRAINT FK_516D67247294869C FOREIGN KEY (article_id) REFERENCES blog_section_comment_container_article (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE accounting_section_account_container_account DROP CONSTRAINT FK_AC2CD0CE7E3C61F9');
        $this->addSql('ALTER TABLE accounting_section_transaction_container_transaction DROP CONSTRAINT FK_77ADF8B3E7DF2E9E');
        $this->addSql('ALTER TABLE accounting_section_transaction_container_transaction DROP CONSTRAINT FK_77ADF8B322150DE5');
        $this->addSql('ALTER TABLE blog_section_article_container_article DROP CONSTRAINT FK_2C4AD12EF675F31B');
        $this->addSql('ALTER TABLE blog_section_comment_container_comment DROP CONSTRAINT FK_516D67247294869C');
        $this->addSql('ALTER TABLE blog_section_comment_container_comment DROP CONSTRAINT FK_516D6724F675F31B');
        $this->addSql('DROP TABLE accounting_section_account_container_account');
        $this->addSql('DROP TABLE accounting_section_account_container_owner');
        $this->addSql('DROP TABLE accounting_section_transaction_container_account');
        $this->addSql('DROP TABLE accounting_section_transaction_container_transaction');
        $this->addSql('DROP TABLE blog_section_article_container_article');
        $this->addSql('DROP TABLE blog_section_article_container_author');
        $this->addSql('DROP TABLE blog_section_comment_container_article');
        $this->addSql('DROP TABLE blog_section_comment_container_author');
        $this->addSql('DROP TABLE blog_section_comment_container_comment');
        $this->addSql('DROP TABLE security_section_security_user_container_security_user');
        $this->addSql('DROP TABLE user_container_user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
