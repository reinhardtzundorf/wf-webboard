<?php include "templates/include/header.php" ?>
<h1>Applicants</h1>
<?php if (isset($results['errorMessage'])) { ?>
    <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
<?php if (isset($results['statusMessage'])) { ?>
    <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>
 <table class="table table-responsive table-hover">
    <tr>
        <th>aName</th>
        <th>aSurname</th>
        <th>aEmail</th>
        <th>aGender</th>
        <th>aContactNum</th>
        <th>aFirstLanguage</th>
        <th>aDateAdded</th>
    </tr>
    <?php foreach ($results['applicants'] as $applicant) { ?>
        <tr onclick="location = 'index.php?action=editApplicant&amp;aID=<?php echo $applicant->aID ?>'">
            <td><?php echo $applicant->aName ?></td>
            <td><?php echo $applicant->aSurname ?></td>
            <td><?php echo $applicant->aEmail ?></td>
            <td><?php echo $applicant->aContactNum ?></td>
            <td><?php echo $applicant->aFirstLanguage ?></td>
            <td><?php echo $applicant->aDateAdded ?></td>
        </tr>
    <?php } ?>
</table>
<p><?php echo $results['totalRows'] ?> applicant<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
<?php include "templates/include/footer.php" ?>

