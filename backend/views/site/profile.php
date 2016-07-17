<?php
use yii\widgets\DetailView;

$this->title = 'View profile';
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = ['label'=>'<i class="icon-user"></i> Update profile','url'=>['update-profile']];
$this->params['actions'][] = ['label'=>'<i class="icon-lock-open"></i> Change password','url'=>['change-password']];

?>

<?= DetailView::widget([
        'model' => Yii::$app->user->identity,
        'attributes' => [
            'username',
            'email',
            [
                'attribute'=>'image',
                'value'=> Yii::$app->user->identity->getThumbUploadUrl('image'),
                'format'=>'image'
            ]
        ],
]) ?>