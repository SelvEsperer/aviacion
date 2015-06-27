<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'password',
            'first_name',
            'last_name',
            // 'middle_name',
            // 'email:email',
            // 'phone',
            // 'mobile',
            // 'address_line1',
            // 'address_line2',
            // 'address_line3',
            // 'role',
            // 'created_by_id',
            // 'created_by_date',
            // 'last_modified_by_id',
            // 'last_modified_by_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
