<?php

use yii\db\Migration;

/**
 * Handles the creation for table `users`.
 */
class m160610_192731_create_users extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'name' => $this->string(60)->notNull(),
            'email' => $this->string(60)->notNull(),
            'password' => $this->string(60)->notNull(),
            'token' => $this->string(100)->defaultValue(null),
            'auth_key' => $this->string(100)->defaultValue(null),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'deleted' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer()
        ], $tableOptions);

        $now = new DateTime;

        $this->insert("{{%users}}", [
            'group_id' => 1,
            'name' => 'Administrador',
            'email' => 'admin@admin.com.br',
            'password' => Yii::$app->security->generatePasswordHash('123456'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => $now->format('Y-m-d H:i:s'),
            'updated_at' => $now->format('Y-m-d H:i:s')
        ]);

        $this->addForeignKey('fk_user_created_by', '{{%users}}', 'created_by', '{{%users}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_user_group_id', '{{%users}}', 'group_id', '{{%groups}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_groups_created_by', '{{%groups}}', 'created_by', '{{%users}}', 'id', 'CASCADE', 'CASCADE');

        $this->update('{{%users}}', ['created_by' => 1], ['id' => 1]);
        $this->update('{{%groups}}', ['created_by' => 1], ['id' => 1]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_user_created_by', '{{%users}}');
        $this->dropForeignKey('fk_user_group_id', '{{%users}}');
        $this->dropForeignKey('fk_groups_created_by', '{{%groups}}');
        $this->update('{{%groups}}', ['created_by' => null], ['id' => 1]);

        $this->dropTable('{{%users}}');
    }
}
