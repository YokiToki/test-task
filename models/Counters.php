<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Counters".
 *
 * @property integer $Counter_id
 * @property string $Serial_number
 * @property string $Name
 * @property string $Date_install
 */
class Counters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Counters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Serial_number'], 'required'],
            [['Date_install'], 'safe'],
            [['Serial_number', 'Name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Counter_id' => 'Counter ID',
            'Serial_number' => 'Serial Number',
            'Name' => 'Name',
            'Date_install' => 'Date Install',
        ];
    }
}
