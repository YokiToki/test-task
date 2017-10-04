<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Counters;

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
            $counter->Serial_number = $faker->numberBetween(100,120);
            $counter->Name = $faker->name;
            $counter->Date_install = null;
            $counter->save(false);
        }
    }
}
