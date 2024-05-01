<?php

declare(strict_types=1);

namespace Abenmada\BackofficePlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220803192855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abenmada_backoffice_channel_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_BD0E140D7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abenmada_backoffice_channel_image ADD CONSTRAINT FK_BD0E140D7E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_channel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_channel ADD abenmada_color_primary_button VARCHAR(255) DEFAULT \'#FFFFFF\' NOT NULL, ADD abenmada_background_color_primary_button VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL, ADD abenmada_color_link VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL, ADD abenmada_color_checkbox VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL, ADD abenmada_color_header_icon VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL, ADD abenmada_background_color_header_icon VARCHAR(255) DEFAULT \'#E3F3F0\' NOT NULL, ADD abenmada_color_sortable_active_column VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL, ADD abenmada_background_color_menu VARCHAR(255) DEFAULT \'#1E212B\' NOT NULL, ADD abenmada_color_sub_item VARCHAR(255) DEFAULT \'#8E9095\' NOT NULL, ADD abenmada_color_sub_item_hover VARCHAR(255) DEFAULT \'#FFFFFF\' NOT NULL, ADD abenmada_color_sub_item_active VARCHAR(255) DEFAULT \'#FFFFFF\' NOT NULL, ADD abenmada_background_color_sub_item_active VARCHAR(255) DEFAULT \'#00B5AD\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE abenmada_backoffice_channel_image');
        $this->addSql('ALTER TABLE sylius_channel DROP abenmada_color_primary_button, DROP abenmada_background_color_primary_button, DROP abenmada_color_link, DROP abenmada_color_checkbox, DROP abenmada_color_header_icon, DROP abenmada_background_color_header_icon, DROP abenmada_color_sortable_active_column, DROP abenmada_background_color_menu, DROP abenmada_color_sub_item, DROP abenmada_color_sub_item_hover, DROP abenmada_color_sub_item_active, DROP abenmada_background_color_sub_item_active');
    }
}
