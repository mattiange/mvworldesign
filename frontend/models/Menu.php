<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "mvwd_menu".
 *
 * @property int $id
 * @property string $name
 *
 * @property Menuitem[] $menuitems
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mvwd_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuitems()
    {
        return $this->hasMany(Menuitem::className(), ['menu_id' => 'id']);
    }
}
