<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MemberType */

$this->title = 'Create Member Type';
$this->params['breadcrumbs'][] = ['label' => 'Member Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
