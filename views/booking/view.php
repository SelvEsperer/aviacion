<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Booking */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">

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
            'flight_type',
            'name',
            'from_location',
            'to_location',
            'departure_date',
            'arrival_date',
            'person',
            'age',
            'last_name',
            'first_name',
            'middle_name',
            'passport_number',
            'date_of_birth',
            'company_name',
            'agent_name',
            'contact_number',
            'email_address:email',
            'country',
            'street_address',
            'state',
            'city',
            'zipcode',
            'created_by_id',
            'created_by_date',
            'last_modified_by_id',
            'last_modified_by_date',
        ],
    ]) ?>

</div>
