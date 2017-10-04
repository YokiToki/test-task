<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Counters;
use app\models\Values;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SeedController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();

        $counter = new Counters();
        for ( $i = 1; $i <= 5; $i++ )
        {
            $counter->setIsNewRecord(true);
            $counter->Counter_id = null;
            $counter->Serial_number = $i + 99;
            $counter->Name = $faker->name;
            $counter->Date_install = null;
            $counter->save(false);
        }
    }

    public function actionValues()
    {
        $faker = \Faker\Factory::create();

        $value = new Values();
        for ( $i = 1; $i <= 20; $i++ )
        {
            $value->setIsNewRecord(true);
            $value->Value_id = null;
            $value->Counter_id = $faker->numberBetween(1, 5);
            $value->Value = $faker->randomFloat($nbMaxDecimals = 3, $min = 20, $max = 300);
            $value->Date = null;
            $value->save(false);
        }
    }
}
