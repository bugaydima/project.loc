<?php
use app\components\AvatarWidget;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= AvatarWidget::widget(['size' => 100,])?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => Yii::t('layout', 'Пользователи'),
                        'icon' => 'fa fa-users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Управление', 'icon' => 'fa fa-table', 'url' => ['/user/admin'],],
                            ['label' => 'Создать пользователя', 'icon' => 'fa fa-user-plus', 'url' => ['/user/admin/create'],],
                        ],
                    ],
                    ['label' => Yii::t('layout', 'Профиль'), 'icon' => 'fa fa-child', 'url' => ['/user/settings/profile']],
                    ['label' => Yii::t('layout', 'Информация о системе'), 'icon' => 'fa fa-server', 'url' => ['/system-information/']],
                    [
                        'label' => 'RBAC',
                        'icon' => 'fa fa-registered',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Назначение', 'icon' => 'fa fa-circle-thin', 'url' => ['/rbac/assignment/'],],
                            ['label' => 'Роли', 'icon' => 'fa fa-circle-thin', 'url' => ['/rbac/role'],],
                            ['label' => 'Разрешения', 'icon' => 'fa fa-circle-thin', 'url' => ['/rbac/permission'],],
                            ['label' => 'Маршруты', 'icon' => 'fa fa-circle-thin', 'url' => ['/rbac/route'],],
                            ['label' => 'Правила', 'icon' => 'fa fa-circle-thin', 'url' => ['/rbac/rule'],],
                            ['label' => 'Меню', 'icon' => 'fa fa-circle-thin', 'url' => ['/rbac/menu'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
