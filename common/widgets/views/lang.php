<?php
    if (Yii::$app->language == 'ru-RU'):
         echo \yii\helpers\Html::a('Go to English', ['/lang/set?lang=en']);
    else:
        echo \yii\helpers\Html::a('Перейти на русский', ['/lang/set?lang=ru']);
    endif;