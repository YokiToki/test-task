<?php

namespace app\controllers;

use \app\models\Values;

class ValuesController extends \yii\web\Controller
{
    /**
     * Вносит показания в базу данных
     *
     * @return Values
     */
    public function actionIndex($counter_id)
    {
        $value = Values::find()
            ->where(['Counter_id' => $counter_id])
            ->orderBy('Value_id DESC')
            ->one();

        if (!is_null($value) && \Yii::$app->request->post('Value') <= $value->Value) {
            throw new \yii\web\ForbiddenHttpException('Вы уже внесли эти показания или они меньше предыдущих');
        }

        $value = new Values;
        $value->Counter_id = $counter_id;
        $value->load(\Yii::$app->getRequest()->getBodyParams(), '');

        if ($value->save() === false && !$value->hasErrors()) {
            throw new \yii\web\ServerErrorHttpException('Ошибка внесения показаний');
        }

        return $value;
    }

    /**
     * Удаляет показания по переданному counter_id и идентефикатору показаний
     *
     * @param int $counter_id
     * @return array
     */
    public function actionDelete($counter_id)
    {
        $value = Values::find()
            ->where(['Counter_id' => $counter_id])
            ->andWhere(['Value_id' => \Yii::$app->request->post('Value_id')])
            ->one();

        if (is_null($value)) {
            throw new \yii\web\BadRequestHttpException('Нет показаний для удаления');
        }

        if ($value->delete() === false && !$value->hasErrors()) {
            throw new \yii\web\ServerErrorHttpException('Ошибка удаления показаний');
        }

        return $value;
    }

    /**
     * Обновляет информацию в последних переданных показаниях по counter_id
     *
     * @param int $counter_id
     * @return array
     */
    public function actionUpdate($counter_id)
    {
        $value = Values::find()
            ->where(['Counter_id' => $counter_id])
            ->orderBy('Value_id DESC')
            ->one();

        if(is_null($value)) {
            throw new \yii\web\NotFoundHttpException('Показания не ныйдены');
        }

        if (\Yii::$app->request->post('Value') <= $value->Value) {
            throw new \yii\web\ForbiddenHttpException('Показания не могут быть меньше предыдущих');
        }

        $value->load(\Yii::$app->getRequest()->getBodyParams(), '');

        if ($value->save() === false && !$value->hasErrors()) {
            throw new \yii\web\ServerErrorHttpException('Ошибка обновления показаний');
        }

        return $value;
    }

}
