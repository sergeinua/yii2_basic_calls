<?php

use yii\db\Migration;

/**
 * Handles the creation for table `news`.
 */
class m160826_041121_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->integer(11),
            'sender_num' => $this->integer(11),
            'recepient_num' => $this->integer(11),
            'time_init' => $this->integer(11),
            'time_connected' => $this->integer(11),
            'time_finished' => $this->integer(11),
            'route' => $this->integer(1),
            'comment' => $this->string(200)
        ]);

        $this->execute("
            ALTER TABLE `news`
            ADD PRIMARY KEY (`id`);
        ");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
