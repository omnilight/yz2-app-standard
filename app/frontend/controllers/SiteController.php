<?php

namespace frontend\controllers;
use frontend\base\Controller;
use yii\web\NotFoundHttpException;


/**
 * Class SiteController
 * @package \frontend\controllers
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Renders page
     * @param $name
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionPage($name)
    {
        $viewFile = $this->findViewFile('pages/'.$name) . '.php';
        if (file_exists($viewFile))
            return $this->render('pages/'.$name);
        else
            throw new NotFoundHttpException();
    }

    public function actionAccessDenied()
    {
        return $this->render('accessDenied');
    }
} 