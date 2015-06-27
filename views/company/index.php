<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company',
            'description',
            'address',
            'phone',
            // 'mobile',
            // 'email:email',
            // 'visit_us',
            // 'social_link',
            // 'title',
            // 'created_by_id',
            // 'created_by_date',
            // 'last_modified_by_id',
            // 'last_modified_by_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
