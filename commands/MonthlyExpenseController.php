<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Counters;
use app\models\Values;

/**
 * Эта команда считает расход по каждому счётчику за текущий месяц
 *
 */
class MonthlyExpenseController extends Controller
{
    public function actionIndex($counter_id)
    {
        $value = Values::find()
            ->select('Value')
            ->andWhere('MONTH(`Date`) = MONTH(CURRENT_DATE())')
            ->andWhere('AND YEAR(`Date`) = YEAR(CURRENT_DATE())')
            ->where(['Counter_id' => $counter_id])
            ->asArray()
            ->all();

        $result = 0;
        $count = count($value);
        $msg = "По счетчику %d расход за этот месяц составляет %g куб. м.";

        if($count > 1) {
            $result =  $value[$count-1]['Value'] - $value[0]['Value'];
        } elseif ($count == 1) {
            $result = $value[0]['Value'];
        }

        echo sprintf($msg, $counter_id, $result), PHP_EOL;
        return 0;
    }

}
