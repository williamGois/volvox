<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710200953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $pass = "\$argon2id\$v=19\$m=65536,t=4,p=1\$hYmgLclZjPjRrSxEcWGEFg\$wXtmwLWHFldH4/SsScYBBcEci1uB77KQix6TBpW+E8M";
        $role = "[\"ROLE_USER\"]";

        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES ("1", "admin@admin.com", "[\"ROLE_USER\"]", "'.$pass.'");');

    }
    

    public function down(Schema $schema) : void
    {
        $pass = "\$argon2id\$v=19\$m=65536,t=4,p=1\$hYmgLclZjPjRrSxEcWGEFg\$wXtmwLWHFldH4/SsScYBBcEci1uB77KQix6TBpW+E8M";
        $role = "[\"ROLE_USER\"]";
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES (NULL, "admin@admin.com", "", "'.$pass.'");');
    }
}
