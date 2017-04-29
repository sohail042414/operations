<?php

namespace frontend\controllers;

use Yii;
use common\models\City;
use frontend\components\FrontendController;
use yii\filters\VerbFilter;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class GeneralController extends FrontendController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionLocations($city) {

        $locations = City::findOne(['id' => $city])->getLocations()->all();

        echo "<option>Select Location</option>";

        if (count($locations) > 0) {
            foreach ($locations as $model) {
                echo "<option value='" . $model->id . "'>" . \yii\helpers\Html::encode($model->name) . "</option>";
            }
        } else {

            echo "<option>--</option>";
        }
    }

}
