<?php
use common\models\FileStorageItem;
use common\models\User;

$this->title = Yii::t('backend', 'Информация о системе');
$this->registerJs("window.paceOptions = { ajax: false }", \yii\web\View::POS_HEAD);
$this->registerJsFile('@web/js/system-information/index.js',
    ['depends' => ['\yii\web\JqueryAsset', '\backend\assets\Flot', '\yii\bootstrap\BootstrapPluginAsset']]
) ?>
<div id="system-information-index">
    <div class="row connectedSortable">
        <div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-hdd-o"></i>
                    <h3 class="box-title"><?= Yii::t('backend', 'Процессор') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?= Yii::t('backend', 'Процессор') ?></dt>
                        <dd><?php echo $provider->getCpuModel() ?></dd>

                        <dt><?= Yii::t('backend', 'Архитектура процессора') ?></dt>
                        <dd><?php echo $provider->getArchitecture() ?></dd>

                        <dt><?= Yii::t('backend', 'Кол-во ядер') ?></dt>
                        <dd><?php echo $provider->getCpuCores() ?></dd>
                    </dl>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-hdd-o"></i>
                    <h3 class="box-title"><?php echo Yii::t('backend', 'Операционная система') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?php echo Yii::t('backend', 'ОС') ?></dt>
                        <dd><?php echo $provider->getOsType() ?></dd>

                        <dt><?php echo Yii::t('backend', 'Версия ОС') ?></dt>
                        <dd><?php echo $provider->getOsRelease() ?></dd>

                        <dt><?php echo Yii::t('backend', 'Версия ядра') ?></dt>
                        <dd><?php echo $provider->getOsKernelVersion() ?></dd>
                    </dl>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-hdd-o"></i>
                    <h3 class="box-title"><?php echo Yii::t('backend', 'Время') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?php echo Yii::t('backend', 'Системная дата') ?></dt>
                        <dd><?php echo Yii::$app->formatter->asDate(time()) ?></dd>

                        <dt><?php echo Yii::t('backend', 'Системное время') ?></dt>
                        <dd><?php echo Yii::$app->formatter->asTime(time()) ?></dd>

                        <dt><?php echo Yii::t('backend', 'Часовой пояс') ?></dt>
                        <dd><?php echo date_default_timezone_get() ?></dd>
                    </dl>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-hdd-o"></i>
                    <h3 class="box-title"><?php echo Yii::t('backend', 'Сеть') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?php echo Yii::t('backend', 'Имя хоста') ?></dt>
                        <dd><?php echo $provider->getHostname() ?></dd>

                        <dt><?php echo Yii::t('backend', 'Внутренний IP') ?></dt>
                        <dd><?php echo $provider->getServerIP() ?></dd>

                        <dt><?php echo Yii::t('backend', 'Внешний IP') ?></dt>
                        <dd><?php echo $provider->getExternalIP() ?></dd>

                        <dt><?php echo Yii::t('backend', 'Порт') ?></dt>
                        <dd><?php echo $provider->getServerVariable('SERVER_PORT') ?></dd>
                    </dl>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-hdd-o"></i>
                    <h3 class="box-title"><?php echo Yii::t('backend', 'ПО') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?php echo Yii::t('backend', 'Web сервер') ?></dt>
                        <dd><?php echo $provider->getServerSoftware() ?></dd>

                        <dt><?php echo Yii::t('backend', 'Версия РHP') ?></dt>
                        <dd><?php echo $provider->getPhpVersion() ?></dd>

                        <dt><?php echo Yii::t('backend', 'Тип БД') ?></dt>
                        <dd><?php echo $provider->getDbType(Yii::$app->db->pdo) ?></dd>

                        <dt><?php echo Yii::t('backend', 'Версия БД') ?></dt>
                        <dd><?php echo $provider->getDbVersion(Yii::$app->db->pdo) ?></dd>
                    </dl>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-hdd-o"></i>
                    <h3 class="box-title"><?php echo Yii::t('backend', 'Память') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt><?php echo Yii::t('backend', 'Общая память') ?></dt>
                        <dd><?php echo Yii::$app->formatter->asSize($provider->getTotalMem()) ?></dd>

                        <dt><?php echo Yii::t('backend', 'Свободно памяти') ?></dt>
                        <dd><?php echo Yii::$app->formatter->asSize($provider->getFreeMem()) ?></dd>

                        <dt><?php echo Yii::t('backend', 'Общий Swap') ?></dt>
                        <dd><?php echo Yii::$app->formatter->asSize($provider->getTotalSwap()) ?></dd>

                        <dt><?php echo Yii::t('backend', 'Свободно Swap') ?></dt>
                        <dd><?php echo Yii::$app->formatter->asSize($provider->getFreeSwap()) ?></dd>
                    </dl>
                </div><!-- /.box-body -->
            </div>
        </div>
<!--        <div class="row">-->
<!--            <div class="col-xs-12">-->
<!--                <div id="cpu-usage" class="box box-primary">-->
<!--                    <div class="box-header">-->
<!--                        <h3 class="box-title">-->
<!--                            CPU Usage-->
<!--                        </h3>-->
<!--                        <div class="box-tools pull-right">-->
<!--                            Real time-->
<!--                            <div class="realtime btn-group" data-toggle="btn-toggle">-->
<!--                                <button type="button" class="btn btn-default btn-xs active" data-toggle="on">-->
<!--                                    On-->
<!--                                </button>-->
<!--                                <button type="button" class="btn btn-default btn-xs" data-toggle="off">-->
<!--                                    Off-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="box-body">-->
<!--                        <div class="chart" style="height: 300px;">-->
<!--                        </div>-->
<!--                    </div><!-- /.box-body-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>
