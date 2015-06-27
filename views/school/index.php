<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create School', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'about',
            'email:email',
            // 'address',
            // 'created_by_id',
            // 'created_by_date',
            // 'last_modified_by_id',
            // 'last_modified_by_date',
            // 'simulation_info',
            // 'safety_program',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
