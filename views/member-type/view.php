<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MemberType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Member Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'role',
            'created_by_id',
            'created_by_date',
            'last_modified_by_id',
            'last_modify_ by_date',
        ],
    ]) ?>

</div>
