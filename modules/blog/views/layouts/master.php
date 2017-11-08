<?php

/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php $this->beginPage(); ?>
<html>
<head>
    <title><?=$this->title?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php $this->beginBody(); ?>
<div class="container">
    <?= $this->render('../includes/navbar') ?>
    <?=$content?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
