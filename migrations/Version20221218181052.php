<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221218181052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formule (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(60) NOT NULL, description VARCHAR(255) NOT NULL, prix NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formule_plat (formule_id INT NOT NULL, plat_id INT NOT NULL, INDEX IDX_6BA65CA22A68F4D1 (formule_id), INDEX IDX_6BA65CA2D73DB560 (plat_id), PRIMARY KEY(formule_id, plat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, nom_menu VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_formule (id INT AUTO_INCREMENT NOT NULL, menu_id_id INT NOT NULL, formule_id_id INT NOT NULL, INDEX IDX_E8878126EEE8BD30 (menu_id_id), INDEX IDX_E8878126D9B357CE (formule_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat (id INT AUTO_INCREMENT NOT NULL, type_id_id INT NOT NULL, category_id_id INT NOT NULL, titre VARCHAR(60) NOT NULL, description VARCHAR(255) NOT NULL, prix NUMERIC(10, 2) NOT NULL, INDEX IDX_2038A207714819A0 (type_id_id), INDEX IDX_2038A2079777D11E (category_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom_type VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id_id INT NOT NULL, nom VARCHAR(60) NOT NULL, prenom VARCHAR(60) NOT NULL, email VARCHAR(100) NOT NULL, convives INT DEFAULT NULL, INDEX IDX_8D93D64988987678 (role_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formule_plat ADD CONSTRAINT FK_6BA65CA22A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formule_plat ADD CONSTRAINT FK_6BA65CA2D73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_formule ADD CONSTRAINT FK_E8878126EEE8BD30 FOREIGN KEY (menu_id_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE menu_formule ADD CONSTRAINT FK_E8878126D9B357CE FOREIGN KEY (formule_id_id) REFERENCES formule (id)');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207714819A0 FOREIGN KEY (type_id_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A2079777D11E FOREIGN KEY (category_id_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64988987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formule_plat DROP FOREIGN KEY FK_6BA65CA22A68F4D1');
        $this->addSql('ALTER TABLE formule_plat DROP FOREIGN KEY FK_6BA65CA2D73DB560');
        $this->addSql('ALTER TABLE menu_formule DROP FOREIGN KEY FK_E8878126EEE8BD30');
        $this->addSql('ALTER TABLE menu_formule DROP FOREIGN KEY FK_E8878126D9B357CE');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207714819A0');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A2079777D11E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64988987678');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE formule');
        $this->addSql('DROP TABLE formule_plat');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_formule');
        $this->addSql('DROP TABLE plat');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
