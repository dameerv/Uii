<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231111050342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql( 'INSERT INTO "manager" (id, first_name, last_name, birthdate) VALUES ' . $this->getManagersValues());
        $this->addSql( 'INSERT INTO "order" (id, name, manager_id) VALUES ' . $this->getOrdersValues());
    }

    private function getManagersValues(): string
    {
        $managersData = [
            [
                'first_name' => 'Иван',
                'last_name'  => 'Иванов',
                'birth_date' => '1995-11-11',
            ],
            [
                'first_name' => 'Петр',
                'last_name'  => 'Петров',
                'birth_date' => '1997-05-11',
            ],
            [
                'first_name' => 'Сидор',
                'last_name'  => 'Сидоров',
                'birth_date' => '1985-01-01',
            ],
            [
                'first_name' => 'Мария',
                'last_name'  => 'Иванов',
                'birth_date' => '1979-12-11',
            ],
            [
                'first_name' => 'Дарья',
                'last_name'  => 'Кукушкина',
                'birth_date' => '1998-12-02',
            ],
            [
                'first_name' => 'Сергей',
                'last_name'  => 'Сергеев',
                'birth_date' => '1995-10-15',
            ],
            [
                'first_name' => 'Артем',
                'last_name'  => 'Артемов',
                'birth_date' => '1981-12-01',
            ],
            [
                'first_name' => 'Артур',
                'last_name'  => 'Пирожков',
                'birth_date' => '1984-02-03',
            ],
            [
                'first_name' => 'Юлия',
                'last_name'  => 'Сорокина',
                'birth_date' => '1979-02-07',
            ],
            [
                'first_name' => 'Марина',
                'last_name'  => 'Кравец',
                'birth_date' => '1986-01-08',
            ],
        ];

        $valuesArray = [];
        foreach ($managersData as $key => $manager) {
            $valuesArray[] = sprintf(
                '(%u, \'%s\', \'%s\', \'%s\')',
                ++$key,
                $manager['first_name'],
                $manager['last_name'],
                $manager['birth_date']
            );
        }

        return implode(',', $valuesArray);
    }

    private function getOrdersValues(): string
    {
        $valuesArray = [];
        for ($i = 1; $i <= 50; $i++) {
            $valuesArray[] = sprintf('(%u, \'%s\', %u)', $i, 'order' . $i, rand(1, 10));
        }

        return implode(',', $valuesArray);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
    }
}
