<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240311002553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE citas (id INT AUTO_INCREMENT NOT NULL, dni_id INT NOT NULL, id_tratamiento_id INT NOT NULL, id_cita INT NOT NULL, fecha DATE NOT NULL, pagado TINYINT(1) NOT NULL, activo TINYINT(1) NOT NULL, INDEX IDX_B88CF8E5DB8B8168 (dni_id), INDEX IDX_B88CF8E57970327B (id_tratamiento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tratamientos (id INT AUTO_INCREMENT NOT NULL, id_tratamiento INT NOT NULL, nombre_tratamiento VARCHAR(30) NOT NULL, precio NUMERIC(5, 2) NOT NULL, activo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, dni VARCHAR(9) NOT NULL, nombre VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, telefono VARCHAR(15) NOT NULL, activo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE citas ADD CONSTRAINT FK_B88CF8E5DB8B8168 FOREIGN KEY (dni_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE citas ADD CONSTRAINT FK_B88CF8E57970327B FOREIGN KEY (id_tratamiento_id) REFERENCES tratamientos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE citas DROP FOREIGN KEY FK_B88CF8E5DB8B8168');
        $this->addSql('ALTER TABLE citas DROP FOREIGN KEY FK_B88CF8E57970327B');
        $this->addSql('DROP TABLE citas');
        $this->addSql('DROP TABLE tratamientos');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
