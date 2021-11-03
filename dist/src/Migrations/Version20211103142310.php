<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103142310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_address ADD service VARCHAR(35) DEFAULT NULL, ADD entrance VARCHAR(35) DEFAULT NULL, ADD locality VARCHAR(35) DEFAULT NULL, ADD floor VARCHAR(35) DEFAULT NULL, ADD door_code1 VARCHAR(8) DEFAULT NULL, ADD door_code2 VARCHAR(8) DEFAULT NULL, ADD intercom VARCHAR(30) DEFAULT NULL, ADD shipping_instruction VARCHAR(70) DEFAULT NULL, ADD recipient_reference VARCHAR(17) DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD coliship_product_code VARCHAR(10) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_address DROP service, DROP entrance, DROP locality, DROP floor, DROP door_code1, DROP door_code2, DROP intercom, DROP shipping_instruction, DROP recipient_reference');
        $this->addSql('ALTER TABLE sylius_shipping_method DROP coliship_product_code');
    }
}
