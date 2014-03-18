<?php

namespace frontend\base;
use yii\web\AccessControl;


/**
 * Class Controller
 * @package \frontend\base
 */
class Controller extends \yii\web\Controller
{
    /**
     * @var array
     */
    private $_accessRules;

    public function attachBehaviors($behaviors)
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $this->getAccessRulesInternal(),
                'denyCallback' => function ($rule) {
                        if (\Yii::$app->user->isGuest) {
                            return \Yii::$app->user->loginRequired();
                        } else {
                            return $this->redirect(['site/accessDenied']);
                        }
                    }
            ]
        ];
    }

    /**
     * Returns the list of access rules that can be used by
     * AccessControl action filter.
     *
     * If you overwrite this function in child classes it is
     * better to call parent's method and extend it's result
     * @return array
     */
    public function getAccessRules()
    {
        return [];
    }

    /**
     * @param array $rules
     */
    public function setAccessRules($rules)
    {
        $this->_accessRules = $rules;
    }

    private function getAccessRulesInternal()
    {
        if ($this->_accessRules) {
            return $this->_accessRules;
        } else {
            return $this->getAccessRules();
        }
    }
} 