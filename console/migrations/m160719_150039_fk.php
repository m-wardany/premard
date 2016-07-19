<?php

use yii\db\Migration;

class m160719_150039_fk extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `premard`.`home_slider` 
            DROP FOREIGN KEY `fk_home_slider_1`;
            ALTER TABLE `premard`.`home_slider` 
            ADD CONSTRAINT `fk_home_slider_1`
              FOREIGN KEY (`page_id`)
              REFERENCES `premard`.`page` (`id`)
              ON DELETE SET NULL
              ON UPDATE SET NULL;");
        $this->execute("ALTER TABLE `premard`.`portfolio` 
            DROP FOREIGN KEY `fk_portfolio_1`;
            ALTER TABLE `premard`.`portfolio` 
            ADD CONSTRAINT `fk_portfolio_1`
              FOREIGN KEY (`page_id`)
              REFERENCES `premard`.`page` (`id`)
              ON DELETE SET NULL
              ON UPDATE SET NULL;
            ");
    }

    public function down()
    {
        echo "m160719_150039_fk cannot be reverted.\n";

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
