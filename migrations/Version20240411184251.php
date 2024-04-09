<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240411184251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajout dans metadata des champs created_by, updated_by, deleted_by';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE daily_stand_up_note ADD created_by INT DEFAULT NULL, ADD updated_by INT DEFAULT NULL, ADD deleted_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE daily_stand_up_note ADD CONSTRAINT FK_CFB37653DE12AB56 FOREIGN KEY (created_by) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE daily_stand_up_note ADD CONSTRAINT FK_CFB3765316FE72E1 FOREIGN KEY (updated_by) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE daily_stand_up_note ADD CONSTRAINT FK_CFB376531F6FA0AF FOREIGN KEY (deleted_by) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_CFB37653DE12AB56 ON daily_stand_up_note (created_by)');
        $this->addSql('CREATE INDEX IDX_CFB3765316FE72E1 ON daily_stand_up_note (updated_by)');
        $this->addSql('CREATE INDEX IDX_CFB376531F6FA0AF ON daily_stand_up_note (deleted_by)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE daily_stand_up_note DROP FOREIGN KEY FK_CFB37653DE12AB56');
        $this->addSql('ALTER TABLE daily_stand_up_note DROP FOREIGN KEY FK_CFB3765316FE72E1');
        $this->addSql('ALTER TABLE daily_stand_up_note DROP FOREIGN KEY FK_CFB376531F6FA0AF');
        $this->addSql('DROP INDEX IDX_CFB37653DE12AB56 ON daily_stand_up_note');
        $this->addSql('DROP INDEX IDX_CFB3765316FE72E1 ON daily_stand_up_note');
        $this->addSql('DROP INDEX IDX_CFB376531F6FA0AF ON daily_stand_up_note');
        $this->addSql('ALTER TABLE daily_stand_up_note DROP created_by, DROP updated_by, DROP deleted_by');
    }
}
