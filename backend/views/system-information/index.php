<?php
use common\models\FileStorageItem;
use common\models\User;

$this->title = 'System Information';
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
                    <h3 class="box-title">Processor</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt>Processor</dt>
                        <dd><?php echo $provider->getCpuModel() ?></dd>

                        <dt>Processor Architecture</dt>
                        <dd><?php echo $provider->getArchitecture() ?></dd>

                        <dt>Number of cores</dt>
                        <dd><?php echo $provider->getCpuCores() ?></dd>
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
