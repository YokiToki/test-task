<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Values".
 *
 * @property integer $Value_id
 * @property integer $Counter_id
 * @property double $Value
 * @property string $Date
 */
class Values extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Counter_id', 'Value'], 'required'],
            [['Counter_id'], 'integer'],
            [['Value'], 'number'],
            [['Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Value_id' => 'Value ID',
            'Counter_id' => 'Counter ID',
            'Value' => 'Value',
            'Date' => 'Date',
        ];
    }
}
