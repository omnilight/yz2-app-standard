<?php

namespace backend\base;

use yii\base\Action;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\web\BadRequestHttpException;
use yz\admin\components\AuthManager;


/**
 * Class BackendController
 * @property array $accessRules
 * @package yz\admin\base
 */
class Controller extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $this->getAccessRules(),
            ]
        ];
    }

    /**
     * Returns list of the access rules for {@see AccessControl} filter behavior
     * @return array
     */
    protected function getAccessRules()
    {
        return [
            [
                'allow' => true,
                'matchCallback' => function ($rule, $action) {
                        return $this->checkAccess($rule, $action);
                    },
            ],
            [
                'allow' => false,
            ]
        ];
    }


    /**
     * Checks access to the action of the controller for currently logged user
     * @param AccessRule $rule
     * @param Action $action
     * @return bool
     */
    protected function checkAccess($rule, $action)
    {
        return \Yii::$app->user->can(AuthManager::getOperationName($this, $action->id));
    }

    /**
     * @param ActiveRecord $model
     * @param array $actions
     * @throws \yii\web\BadRequestHttpException
     * @return \yii\web\Response
     */
    protected function getCreateUpdateResponse($model, $actions = [])
    {
        $defaultActions = [
            'save_and_stay' => function () use ($model) {
                    return $this->redirect(['update', 'id' => $model->getPrimaryKey()]);
                },
            'save_and_create' => function () use ($model) {
                    return $this->redirect(['create']);
                },
            'save_and_leave' => function () use ($model) {
                    return $this->redirect(['index']);
                },
        ];

        $actions = array_merge($defaultActions, $actions);
        $actionName = \Yii::$app->request->post('__action', 'save_and_leave');

        if (isset($actions[$actionName]))
            return call_user_func($actions[$actionName]);
        else
            throw new BadRequestHttpException('Unknown action: '.$actionName);
    }
} 