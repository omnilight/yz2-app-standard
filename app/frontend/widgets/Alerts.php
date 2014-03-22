<?php

namespace frontend\widgets;

use yii\bootstrap\Alert;
use yii\bootstrap\Widget;
use yz\Yz;


/**
 * Class Alerts
 * @package \frontend\widgets
 */

/**
 * Class Alerts
 *
 * Alerts widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * - \Yii::$app->getSession()->setFlash('error', 'This is the message');
 * - \Yii::$app->getSession()->setFlash('success', 'This is the message');
 * - \Yii::$app->getSession()->setFlash('info', 'This is the message');
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 * @package \frontend\widgets
 */
class Alerts extends Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
     */
    public $alertTypes = [
        Yz::FLASH_ERROR => 'alert-danger',
        Yz::FLASH_SUCCESS => 'alert-success',
        Yz::FLASH_INFO => 'alert-info',
        Yz::FLASH_WARNING => 'alert-warning'
    ];

    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];

    public function init()
    {
        parent::init();

        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $message) {
            if (isset($this->alertTypes[$type])) {
                /* initialize css class for each alert box */
                $this->options['class'] = $this->alertTypes[$type] . $appendCss;

                /* assign unique id to each alert box */
                $this->options['id'] = $this->getId() . '-' . $type;

                echo Alert::widget([
                    'body' => $message,
                    'closeButton' => $this->closeButton,
                    'options' => $this->options,
                ]);

                $session->removeFlash($type);
            }
        }
    }
} 