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
            [['Serial_number'], 'unique'],
            [['Serial_number', 'Name'], 'required'],
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

    public function getValues()
    {
        return $this->hasMany(Values::className(), ['Counter_id' => 'Counter_id']);
    }

    public function deleteWithValues() {
        if($this->delete()) {
            return Values::deleteAll(['Counter_id' => $this->Counter_id]);
        }

        return false;
    }
}
