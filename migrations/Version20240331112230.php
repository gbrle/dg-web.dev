<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240331112230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de la table daily_stand_up_note';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE daily_stand_up_note (
            id INT AUTO_INCREMENT NOT NULL, 
            title VARCHAR(255) NOT NULL, 
            content LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE daily_stand_up_note');
    }
}
