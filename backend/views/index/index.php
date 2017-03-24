<?php
use common\models\User;

$this->title = Yii::t('backend', 'Главная');
//$this->params['breadcrumbs'][] = [
//                                'label' => '',
//                                ];
?>
<div class="row">
    <!-- /.col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua-active">
            <div class="inner">
                <h3>
                    <?php echo User::find()->count() ?>
                </h3>
                <p>
                    <?php echo Yii::t('backend', 'Регистраций') ?>
                </p>
            </div>
            <div class="icon">
                <?= \yii\helpers\Html::a('', ['/user/admin/create'])?>
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo Yii::$app->urlManager->createUrl(['/user/admin']) ?>" class="small-box-footer">
                <?php echo Yii::t('backend', 'Подробнее') ?> <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
