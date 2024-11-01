<?php

declare(strict_types=1);

namespace Abenmada\BackofficePlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Postgres ready!
 *
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241101104421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE abenmada_backoffice_channel_image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE abenmada_backoffice_channel_image (id INT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AD748F1B7E3C61F9 ON abenmada_backoffice_channel_image (owner_id)');
        $this->addSql('ALTER TABLE abenmada_backoffice_channel_image ADD CONSTRAINT FK_AD748F1B7E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_color_primary_button VARCHAR(255) DEFAULT \'#FFFFFF\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_background_color_primary_button VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_color_link VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_color_checkbox VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_color_header_icon VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_background_color_header_icon VARCHAR(255) DEFAULT \'#E3F3F0\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_color_sortable_active_column VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_background_color_menu VARCHAR(255) DEFAULT \'#1E212B\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_color_sub_item VARCHAR(255) DEFAULT \'#8E9095\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_color_sub_item_hover VARCHAR(255) DEFAULT \'#FFFFFF\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_color_sub_item_active VARCHAR(255) DEFAULT \'#FFFFFF\' NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_background_color_sub_item_active VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE abenmada_backoffice_channel_image_id_seq CASCADE');
        $this->addSql('ALTER TABLE abenmada_backoffice_channel_image DROP CONSTRAINT FK_AD748F1B7E3C61F9');
        $this->addSql('DROP TABLE abenmada_backoffice_channel_image');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_color_primary_button');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_background_color_primary_button');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_color_link');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_color_checkbox');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_color_header_icon');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_background_color_header_icon');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_color_sortable_active_column');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_background_color_menu');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_color_sub_item');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_color_sub_item_hover');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_color_sub_item_active');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_background_color_sub_item_active');
    }
}
