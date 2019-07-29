<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExperiencesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Experiences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experiences-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Experiences', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'document',
                'format' => 'html',
                'label' => 'Tài liệu',
                'value' => function ($data) {
                    $url = Yii::GetAlias('@web/uploads/'.$data->document);
                    if ($data->document) {
                        $demo = explode('.', $data->document)[1];
                    }
                    if (isset($demo)) {
                        if ($demo == 'jpg' || $demo == 'png') {
                            return Html::img($url,['width' =>'160']);
                        }
                        else{
                            return $data->document.Html::a('<span class="glyphicon glyphicon-save"></span>',$url,['title'=>'dow']);
                        }

                    }

                },

            ],   
            // 'id',
            // 'user_id',
            'experience',
            'name_company',
            'start_date',
            'end_date',
            'description_work',
            // 'document',
                // 'created_at',
                // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view' => function($url,$model){
                        return Html::a('Xem thêm',$url,['class' => 'btn btn-xs btn-info']);
                    },
                    'update' => function($url,$model){
                        return Html::a('Cập nhật',$url,['class'=>'btn btn-xs btn-success']);
                    },
                    'delete' => function($url,$model){
                        return Html::a('Xóa bỏ',$url,[
                            'class'=>'btn btn-xs btn-danger',
                            'data'=>[
                                'confirm'=>'Chúng tôi sẽ xóa vĩnh viễn kinh nghiệm '.$model->experience.'?',
                                'method'=>'post'
                            ]
                        ]);
                    }
                ]
            ]
        ],
    ]); ?>


</div>
