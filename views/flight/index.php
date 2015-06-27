<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Flights';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Flight', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'image',
            'speed',
            // 'capacity',
            // 'registration_mark',
            // 'endurance',
            // 'cruising_level',
            // 'luggage_capacity',
            // 'created_by_id',
            // 'created_by_date',
            // 'last_modified_by_id',
            // 'last_modified_by_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
