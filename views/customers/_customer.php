<?php
use yii\widgets\DetailView;

echo DetailView::widget([
   'model' => $model,
   'attributes' => [
       ['attribute' => 'name'],
       ['attribute' => 'birth_date', 'value' => $model->birth_date->format('d-m-Y')],
       'notes:text',
       ['label' => 'PhoneNumber', 'attribute' => 'phones.0.number']
   ]
]);
