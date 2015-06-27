<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Booking', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'flight_type',
            'name',
            'from_location',
            'to_location',
            // 'departure_date',
            // 'arrival_date',
            // 'person',
            // 'age',
            // 'last_name',
            // 'first_name',
            // 'middle_name',
            // 'passport_number',
            // 'date_of_birth',
            // 'company_name',
            // 'agent_name',
            // 'contact_number',
            // 'email_address:email',
            // 'country',
            // 'street_address',
            // 'state',
            // 'city',
            // 'zipcode',
            // 'created_by_id',
            // 'created_by_date',
            // 'last_modified_by_id',
            // 'last_modified_by_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
