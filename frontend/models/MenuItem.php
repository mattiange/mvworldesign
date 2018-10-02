<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%menuitem}}".
 *
 * @property string $id
 * @property string $menu_item
 * @property int $position
 * @property int $parent
 * @property int $menu_id
 * @property string $controller
 * @property string $model
 *
 * @property Menu $menu
 */
class Menuitem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%menuitem}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_item', 'position', 'menu_id', 'controller', 'model'], 'required'],
            [['position', 'parent', 'menu_id'], 'integer'],
            [['menu_item'], 'string', 'max' => 45],
            [['controller', 'model'], 'string', 'max' => 50],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'menu_item' => Yii::t('app', 'Menu Item'),
            'position' => Yii::t('app', 'Position'),
            'parent' => Yii::t('app', 'Parent'),
            'menu_id' => Yii::t('app', 'Menu ID'),
            'controller' => Yii::t('app', 'Controller'),
            'model' => Yii::t('app', 'Model'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }
}
