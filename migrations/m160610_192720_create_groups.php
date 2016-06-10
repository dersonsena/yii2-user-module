<?php

use yii\db\Migration;

/**
 * Handles the creation for table `groups`.
 */
class m160610_192720_create_groups extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%groups}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'protected' => $this->smallInteger(1)->defaultValue(0),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'deleted' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
        ], $tableOptions);

        $now = new DateTime;

        $this->insert("{{%groups}}", [
            'name' => 'Administradores',
            'protected' => 1,
            'created_at' => $now->format('Y-m-d H:i:s'),
            'updated_at' => $now->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_groups_created_by', '{{%groups}}');
        $this->dropTable('{{%groups}}');
    }
}
