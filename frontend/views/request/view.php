<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'status.title',
                'label' => 'Status'
            ],
            [
                'attribute' => 'problem.title',
                'label' => 'Problem/Issue'
            ],
            'problem_details:ntext',
            [
                'attribute' => 'customer.fullname',
                'label' => 'Customer Name'
            ],
            'contact_person_name',
            'phone',
            [
                'attribute' => 'city.name',
                'label' => 'City'
            ],
            [
                'attribute' => 'location.name',
                'label' => 'Location'
            ],
            'address:ntext',
            'installed_items_details:ntext',
            'installed_items_cost',
            'labour_cost',
            'total_cost',
            'operator_feedback:ntext',
            'admin_feedback:ntext',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
