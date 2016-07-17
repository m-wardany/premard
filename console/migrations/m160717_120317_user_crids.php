<?php

use yii\db\Migration;

class m160717_120317_user_crids extends Migration
{
    public function up()
    {
        $this->execute("
            ALTER TABLE `user` 
            ADD COLUMN `image` VARCHAR(255) NULL AFTER `updated_at`,
            ADD COLUMN `role` INT NULL AFTER `image`;
        INSERT INTO `user` ( `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `image`, `role`) VALUES
        ('admin', 'VYlOs1wI7_Qlqz91ro-elzvL5kqVXk_F', '$2y$13$3JZq9gEfnpjTKkAB8NGTWeGhQGy8NLGDvFZ6pkQdlr/jUvGGyRX7C', 'bUfxHt-K_bwnm4ouB9VsnSIi5YEkOUiV_1466937351', 'm.wardany@premait.com', 10, 1447138373, 1467542524, '5778ebfc47d45.jpg', NULL);") ;
    }

    public function down()
    {
        echo "m160717_120317_user_crids cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
