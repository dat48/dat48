<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<h1 class="text-center">Thông tin người dùng <?= Html::encode($this->title) ?></h1>
<div class="row">
    <div class="col-md-4">
        <img src="uploads/<?= Yii::$app->user->identity->file_images; ?>" alt="" class="img-responsive">  
    </div>
    <div class="user-view col-md-8">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Xóa nhé?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'auth_key',
                'password_hash',
                // 'password_reset_token',
                'email:email',
                'firstname',
                'lastname',
                'phonenumber',
                'birthday',
                'file_images',
                'status',
                'created_at',
                'updated_at',
                'verification_token',
            ],
        ]) ?>

    </div>
</div>
