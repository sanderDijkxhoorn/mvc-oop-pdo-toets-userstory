<!-- If success is set then show success message -->
<?php if (isset($data['success'])) {
?>
    <div class="alert alert-success">
        <?= $data['success'] ?>
    </div>
<?php
}
?>

<h1><?= $data["title"]; ?></h1>

<h2>Kenteken: <?= $data['kenteken'] ?>-<?= $data['Type'] ?></h2>

<form method="POST">
    <label for="Mankement">Mankement</label>
    <input type="text" name="Mankement" class="form-control form-control-lg" value="<?= $data['Mankement']; ?>">

    <br>

    <a href="<?= URLROOT; ?>/mankementen/new/<?= $data['AutoId'] ?>">
        <input type="submit" value="Toevoegen" class="btn btn-success btn-block">
    </a>
</form>



<a href="<?= URLROOT; ?>/homepages/index">Terug</a>