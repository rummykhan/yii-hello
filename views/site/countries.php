<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($countries as $index => $country) { ?>
                <tr>
                    <td><?=$index + 1?></td>
                    <td><?=$country->name?></td>
                    <td><?=$country->code?></td>
                    <td>Actions</td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    </div>
</div>
