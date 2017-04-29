<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

abstract class BackendController extends \yii\web\Controller implements BECInterface {

    public $resource_id;
    public $common_behaviours = [];
    public $more_behaviours = [];

    public function getResourceId() {

        return $this->resource_id;
    }

    public function __construct($id, $module, $config = array()) {

        $this->setResourceId();
        $this->setCommonBehaviors();
        parent::__construct($id, $module, $config);
    }

    public function setCommonBehaviors() {

        $this->common_behaviours = [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => Yii::$app->Auth->canView($this->getResourceId()),
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => Yii::$app->Auth->canCreate($this->getResourceId()),
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => Yii::$app->Auth->canUpdate($this->getResourceId()),
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => Yii::$app->Auth->canDelete($this->getResourceId()),
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function behaviors() {

        return array_merge($this->common_behaviours, $this->more_behaviours);

        parent::behaviors();
    }

}
