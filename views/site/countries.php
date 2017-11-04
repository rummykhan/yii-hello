<?php

use yii\helpers\Url;

?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <a href="<?= Url::to('/site/country/create') ?>" class="btn btn-primary">
            <i class="glyphicon glyphicon-plus-sign"></i> Add Country
        </a>

        <hr>

        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Population</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($countries as $index => $country) : ?>
                <tr>
                    <td><?=$index + 1?></td>
                    <td><?=$country->name?></td>
                    <td><?=$country->code?></td>
                    <td><?=$country->population?></td>
                    <td>
                        <div class="text-center">
                            <div class="btn-group">
                                <a href="/site/country/<?=$country->code?>/edit" class="btn btn-default btn-sm">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <a href="/site/country/<?=$country->code?>/delete" class="btn btn-danger btn-sm">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
