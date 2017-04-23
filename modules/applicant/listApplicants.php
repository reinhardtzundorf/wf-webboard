<?php include "./include/header.php" ?>
<h1>Applicants</h1>

<?php if (isset($results['errorMessage'])) { ?>
    <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

<?php if (isset($results['statusMessage'])) { ?>
    <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Applicants</h3>
                        </div>
                        <div class="col col-xs-6 text-right">
                            <button type="button" class="btn btn-sm btn-primary btn-create">Add Applicant</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>
                            <th><em class="fa fa-cog"></em></th>
                            <th class="hidden-xs">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rating</th>
                        </tr>
                        </thead>
                        
                        <!-- Start listing the 'Applicants' in the table, row per row -->
                        <?php foreach ($results['applicants'] as $applicant) { ?>
                            <tbody>
                                <tr>
                                    <td class="hidden-xs"><?php echo $applicant->aID; ?></td>
                                    <td><?php echo $applicant->aName + $applicant->aSurname ?></td>
                                    <td><?php echo $applicant->aContactNum ?></td>
                                    <td><?php echo $applicant->aEmail ?></td>
                                    <td><?php echo "Rating"; ?></td>
                                </tr>
                                <tr>
                                    <td><img src="res/img/applicantProfile.png" class="img-responsive"/></td>
                                    <td colspan="4"><?php echo $applicant->aDescription ?></td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                        <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col col-xs-4">Page 1 of 5</div>
                        <div class="col col-xs-8">
                            <ul class="pagination hidden-xs pull-right">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul>
                            <ul class="pagination visible-xs pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <p><?php echo $results['totalRows'] ?> applicant<?php echo ($results['totalRows'] != 1) ? 's' : '' ?> in total.</p>
</div>
<?php require "./include/footer.php"; ?>

