<?php

use yii\helpers\Url;

?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=Url::to('/blog/home')?>">Brand</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--<ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
            </ul>-->

            <ul class="nav navbar-nav navbar-right">

                <?php if (Yii::$app->user->isGuest) : ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Login <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=Url::to('/blog/auth/login')?>">Login</a></li>
                            <li><a href="<?=Url::to('/blog/auth/register')?>">Register</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?=Yii::$app->user->identity->name?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=Url::to('/blog/posts/mine')?>">My Posts</a></li>
                            <li><a href="<?=Url::to('/blog/posts/create')?>">Write a Post</a></li>
                            <li><a href="<?=Url::to('/blog/auth/logout')?>">Logout</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>