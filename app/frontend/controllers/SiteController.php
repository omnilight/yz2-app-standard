<?php

namespace frontend\controllers;
use frontend\base\Controller;
use yii\web\ErrorAction;
use yii\web\NotFoundHttpException;
use yii\web\ViewAction;


/**
 * Class SiteController
 * @package \frontend\controllers
 */
class SiteController extends Controller
{
    public function getAccessRules()
    {
        return array_merge([
            [
                'allow' => true,
            ]
        ], parent::getAccessRules());
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::className()
            ],
            'page' => [
                'class' => ViewAction::className(),
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAccessDenied()
    {
        return $this->render('accessDenied');
    }
} 