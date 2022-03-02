<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301183413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent_mission (agent_id INT NOT NULL, mission_id INT NOT NULL, INDEX IDX_423490963414710B (agent_id), INDEX IDX_42349096BE6CAE90 (mission_id), PRIMARY KEY(agent_id, mission_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_mission (contact_id INT NOT NULL, mission_id INT NOT NULL, INDEX IDX_A48D3BDE7A1254A (contact_id), INDEX IDX_A48D3BDBE6CAE90 (mission_id), PRIMARY KEY(contact_id, mission_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission_planque (mission_id INT NOT NULL, planque_id INT NOT NULL, INDEX IDX_DA0690F7BE6CAE90 (mission_id), INDEX IDX_DA0690F7CE8A20B (planque_id), PRIMARY KEY(mission_id, planque_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent_mission ADD CONSTRAINT FK_423490963414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agent_mission ADD CONSTRAINT FK_42349096BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_mission ADD CONSTRAINT FK_A48D3BDE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_mission ADD CONSTRAINT FK_A48D3BDBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_planque ADD CONSTRAINT FK_DA0690F7BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_planque ADD CONSTRAINT FK_DA0690F7CE8A20B FOREIGN KEY (planque_id) REFERENCES planque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cible DROP mission_cible_id');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CF6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C3B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CA6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_9067F23CF6203804 ON mission (statut_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C3B5A08D7 ON mission (speciality_id)');
        $this->addSql('CREATE INDEX IDX_9067F23CA6E44244 ON mission (pays_id)');
        $this->addSql('ALTER TABLE planque RENAME INDEX planque___fk TO IDX_4B3A04BAC54C8C93');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agent_mission');
        $this->addSql('DROP TABLE contact_mission');
        $this->addSql('DROP TABLE mission_planque');
        $this->addSql('ALTER TABLE agent CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cible ADD mission_cible_id INT NOT NULL, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name_code name_code VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom_code nom_code VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(190) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CF6203804');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C3B5A08D7');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CA6E44244');
        $this->addSql('DROP INDEX IDX_9067F23CF6203804 ON mission');
        $this->addSql('DROP INDEX IDX_9067F23C3B5A08D7 ON mission');
        $this->addSql('DROP INDEX IDX_9067F23CA6E44244 ON mission');
        $this->addSql('ALTER TABLE mission CHANGE nom_code nom_code VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nationality CHANGE name_nationality name_nationality VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE pays CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE planque CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE planque RENAME INDEX idx_4b3a04bac54c8c93 TO planque___fk');
        $this->addSql('ALTER TABLE speciality CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE statut CHANGE name_statut name_statut VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_planque CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
