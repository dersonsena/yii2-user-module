<?php

namespace dersonsena\userModule\models;

use Yii;
use dersonsena\commonClasses\ModelBase;

/**
 * This is the model class for table "grupos".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $status
 * @property integer $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property integer $usuario_ins_id
 *
 * @property User[] $users
 * @property User $userIns
 */
class Group extends ModelBase
{
    const ADMIN_GROUP = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%groups}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['status', 'deleted', 'usuario_ins_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nome'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => $this->idLabel,
            'nome' => 'Nome',
            'status' => $this->statusLabel,
            'created_at' => $this->createdAtLabel,
            'updated_at' => $this->updateAtLabel,
            'usuario_ins_id' => $this->userInsIdLabel,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(User::className(), ['grupo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIns()
    {
        return $this->hasOne(User::className(), ['id' => 'usuario_ins_id']);
    }
}
