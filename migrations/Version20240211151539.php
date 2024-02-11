<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211151539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, countries VARCHAR(255) NOT NULL, release_date DATE NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE album_band (id_album_id INT NOT NULL, id_band_id INT NOT NULL, INDEX IDX_2CD414AB41EC475A (id_album_id), INDEX IDX_2CD414AB97364267 (id_band_id), PRIMARY KEY(id_album_id, id_band_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE album_cover (id_album_id INT NOT NULL, id_cover_id INT NOT NULL, INDEX IDX_FBB0CCE341EC475A (id_album_id), INDEX IDX_FBB0CCE3C2FCCA7C (id_cover_id), PRIMARY KEY(id_album_id, id_cover_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE album_gender (id_album_id INT NOT NULL, id_gender_id INT NOT NULL, INDEX IDX_153C37F541EC475A (id_album_id), INDEX IDX_153C37F5873D1CC7 (id_gender_id), PRIMARY KEY(id_album_id, id_gender_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE album_label (id_album_id INT NOT NULL, id_label_id INT NOT NULL, INDEX IDX_781F1ACE41EC475A (id_album_id), INDEX IDX_781F1ACE6362C3AC (id_label_id), PRIMARY KEY(id_album_id, id_label_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE album_list (id_album_id INT NOT NULL, id_list_id INT NOT NULL, INDEX IDX_20C34E5841EC475A (id_album_id), INDEX IDX_20C34E58E333BFFB (id_list_id), PRIMARY KEY(id_album_id, id_list_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE album_part (id_album_id INT NOT NULL, id_parts_id INT NOT NULL, INDEX IDX_2D04C68641EC475A (id_album_id), INDEX IDX_2D04C6861E5A1CA8 (id_parts_id), PRIMARY KEY(id_album_id, id_parts_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE album_style (id_album_id INT NOT NULL, id_style_id INT NOT NULL, INDEX IDX_4505F24C41EC475A (id_album_id), INDEX IDX_4505F24CEA168CE1 (id_style_id), PRIMARY KEY(id_album_id, id_style_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE artist_band (id_artists_id INT NOT NULL, id_band_id INT NOT NULL, INDEX IDX_F4612474F12AD0D0 (id_artists_id), INDEX IDX_F461247497364267 (id_band_id), PRIMARY KEY(id_artists_id, id_band_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE artists (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE band (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE cover (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE liste (id INT AUTO_INCREMENT NOT NULL, list_name VARCHAR(255) NOT NULL, id_user_id INT NOT NULL, UNIQUE INDEX UNIQ_FCF22AF479F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE parts (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, duration VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE users_list (id_user_id INT NOT NULL, id_list_id INT NOT NULL, INDEX IDX_8B41B61679F37AE5 (id_user_id), INDEX IDX_8B41B616E333BFFB (id_list_id), PRIMARY KEY(id_user_id, id_list_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE album_band ADD CONSTRAINT FK_2CD414AB41EC475A FOREIGN KEY (id_album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album_band ADD CONSTRAINT FK_2CD414AB97364267 FOREIGN KEY (id_band_id) REFERENCES band (id)');
        $this->addSql('ALTER TABLE album_cover ADD CONSTRAINT FK_FBB0CCE341EC475A FOREIGN KEY (id_album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album_cover ADD CONSTRAINT FK_FBB0CCE3C2FCCA7C FOREIGN KEY (id_cover_id) REFERENCES cover (id)');
        $this->addSql('ALTER TABLE album_gender ADD CONSTRAINT FK_153C37F541EC475A FOREIGN KEY (id_album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album_gender ADD CONSTRAINT FK_153C37F5873D1CC7 FOREIGN KEY (id_gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE album_label ADD CONSTRAINT FK_781F1ACE41EC475A FOREIGN KEY (id_album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album_label ADD CONSTRAINT FK_781F1ACE6362C3AC FOREIGN KEY (id_label_id) REFERENCES label (id)');
        $this->addSql('ALTER TABLE album_list ADD CONSTRAINT FK_20C34E5841EC475A FOREIGN KEY (id_album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album_list ADD CONSTRAINT FK_20C34E58E333BFFB FOREIGN KEY (id_list_id) REFERENCES liste (id)');
        $this->addSql('ALTER TABLE album_part ADD CONSTRAINT FK_2D04C68641EC475A FOREIGN KEY (id_album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album_part ADD CONSTRAINT FK_2D04C6861E5A1CA8 FOREIGN KEY (id_parts_id) REFERENCES parts (id)');
        $this->addSql('ALTER TABLE album_style ADD CONSTRAINT FK_4505F24C41EC475A FOREIGN KEY (id_album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album_style ADD CONSTRAINT FK_4505F24CEA168CE1 FOREIGN KEY (id_style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE artist_band ADD CONSTRAINT FK_F4612474F12AD0D0 FOREIGN KEY (id_artists_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE artist_band ADD CONSTRAINT FK_F461247497364267 FOREIGN KEY (id_band_id) REFERENCES band (id)');
        $this->addSql('ALTER TABLE liste ADD CONSTRAINT FK_FCF22AF479F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_list ADD CONSTRAINT FK_8B41B61679F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_list ADD CONSTRAINT FK_8B41B616E333BFFB FOREIGN KEY (id_list_id) REFERENCES liste (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album_band DROP FOREIGN KEY FK_2CD414AB41EC475A');
        $this->addSql('ALTER TABLE album_band DROP FOREIGN KEY FK_2CD414AB97364267');
        $this->addSql('ALTER TABLE album_cover DROP FOREIGN KEY FK_FBB0CCE341EC475A');
        $this->addSql('ALTER TABLE album_cover DROP FOREIGN KEY FK_FBB0CCE3C2FCCA7C');
        $this->addSql('ALTER TABLE album_gender DROP FOREIGN KEY FK_153C37F541EC475A');
        $this->addSql('ALTER TABLE album_gender DROP FOREIGN KEY FK_153C37F5873D1CC7');
        $this->addSql('ALTER TABLE album_label DROP FOREIGN KEY FK_781F1ACE41EC475A');
        $this->addSql('ALTER TABLE album_label DROP FOREIGN KEY FK_781F1ACE6362C3AC');
        $this->addSql('ALTER TABLE album_list DROP FOREIGN KEY FK_20C34E5841EC475A');
        $this->addSql('ALTER TABLE album_list DROP FOREIGN KEY FK_20C34E58E333BFFB');
        $this->addSql('ALTER TABLE album_part DROP FOREIGN KEY FK_2D04C68641EC475A');
        $this->addSql('ALTER TABLE album_part DROP FOREIGN KEY FK_2D04C6861E5A1CA8');
        $this->addSql('ALTER TABLE album_style DROP FOREIGN KEY FK_4505F24C41EC475A');
        $this->addSql('ALTER TABLE album_style DROP FOREIGN KEY FK_4505F24CEA168CE1');
        $this->addSql('ALTER TABLE artist_band DROP FOREIGN KEY FK_F4612474F12AD0D0');
        $this->addSql('ALTER TABLE artist_band DROP FOREIGN KEY FK_F461247497364267');
        $this->addSql('ALTER TABLE liste DROP FOREIGN KEY FK_FCF22AF479F37AE5');
        $this->addSql('ALTER TABLE users_list DROP FOREIGN KEY FK_8B41B61679F37AE5');
        $this->addSql('ALTER TABLE users_list DROP FOREIGN KEY FK_8B41B616E333BFFB');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE album_band');
        $this->addSql('DROP TABLE album_cover');
        $this->addSql('DROP TABLE album_gender');
        $this->addSql('DROP TABLE album_label');
        $this->addSql('DROP TABLE album_list');
        $this->addSql('DROP TABLE album_part');
        $this->addSql('DROP TABLE album_style');
        $this->addSql('DROP TABLE artist_band');
        $this->addSql('DROP TABLE artists');
        $this->addSql('DROP TABLE band');
        $this->addSql('DROP TABLE cover');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE label');
        $this->addSql('DROP TABLE liste');
        $this->addSql('DROP TABLE parts');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_list');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
