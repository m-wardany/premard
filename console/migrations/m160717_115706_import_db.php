<?php

use yii\db\Migration;

class m160717_115706_import_db extends Migration
{
    public function up()
    {
        $this->execute(file_get_contents(__DIR__ . '/../../etc/batches/DB.sql')); 
    }

    public function down()
    {
        echo "m160717_115706_import_db cannot be reverted.\n";

        return false;
    }

}
