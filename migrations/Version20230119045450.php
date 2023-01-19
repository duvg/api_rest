<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230119045450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates `user` table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE `user` (
                id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                password VARCHAR(100) DEFAULT NULL,
                telephone VARCHAR(10) DEFAULT NULL,
                address VARCHAR(150) DEFAULT NULL,
                avatar VARCHAR(255) DEFAULT NULL,
                token VARCHAR(100) DEFAULT NULL,
                active TINYINT(1) NOT NULL,
                reset_password_token VARCHAR(100) DEFAULT NULL,
                created_by INT(11) NULL, 
                created_at DATETIME NOT NULL,
                updated_at DATETIME NOT NULL,
                INDEX IDX_user_id (created_by),
                CONSTRAINT FK_created_by FOREIGN KEY (created_by) REFERENCES `user` (id) ON UPDATE NO ACTION ON DELETE CASCADE
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE user');
    }
}
