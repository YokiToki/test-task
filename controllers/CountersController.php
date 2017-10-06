<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;
use app\models\Counters;


class CountersController extends \yii\rest\Controller
{
    /**
     * Возвращает все счетчики
     *
     * @return ActiveDataProvider
     */
    public function actionIndex()
    {
        $counter = new ActiveDataProvider([
            'query' => Counters::find()->asArray(),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        if ($counter->totalCount < 1) {
            throw new \yii\web\NotFoundHttpException('В базе данных нет счетчиков');
        }

        return $counter;
    }

    /**
     * Возвращает счетчик по передпнному counter_id со всеми показаниями
     *
     * @param int $counter_id
     * @return array
     */
    public function actionView($counter_id)
    {
        $counter = Counters::find()
            ->where(['Counter_id' => $counter_id])
            ->with('values')
            ->asArray()
            ->all();

        if (count($counter) < 1) {
            throw new \yii\web\NotFoundHttpException('Такого счетчика нет в базе данных');
        }

        return $counter;
    }

    /**
     * Создает новый счетчик
     *
     * @return Counters
     */
    public function actionCreate()
    {
        $counter = new Counters;
        $counter->load(\Yii::$app->getRequest()->getBodyParams(), '');

        if ($counter->save() === false && !$counter->hasErrors()) {
            throw new \yii\web\ServerErrorHttpException('Ошибка создания счетчика');
        }

        return $counter;
    }

    /**
     * Удаляет счетчик по передпнному counter_id со всеми показаниями
     *
     * @param int $counter_id
     * @return Counters
     */
    public function actionDelete($counter_id)
    {
        $counter = Counters::findOne($counter_id);

        if(is_null($counter)) {
            throw new \yii\web\NotFoundHttpException('Счетчик не найден');
        }

        if ($counter->deleteWithValues() === false && !$counter->hasErrors()) {
            throw new \yii\web\ServerErrorHttpException('Ошибка удаления счетчика');
        }

        return $counter;
    }

    /**
     * Обновляет переданную информацию о счетчике по counter_id
     *
     * @param int $counter_id
     * @return Counters
     */
    public function actionUpdate($counter_id)
    {
        $counter = Counters::findOne($counter_id);

        if(is_null($counter)) {
            throw new \yii\web\NotFoundHttpException('Счетчик не найден');
        }

        $counter->load(\Yii::$app->getRequest()->getBodyParams(), '');

        if ($counter->save() === false && !$counter->hasErrors()) {
            throw new \yii\web\ServerErrorHttpException('Ошибка обновления счетчика');
        }

        return $counter;
    }

}
