<?php
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

/**
 * By default this layout simply renders layout
 * of the admin module. But if you need some customizations
 * you can overwrite this file
 */

$this->beginContent('@yz/admin/view/layouts/base');
echo $content;
$this->endContent();
