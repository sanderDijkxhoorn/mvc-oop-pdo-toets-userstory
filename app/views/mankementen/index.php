<h1><?= $data["title"]; ?></h1>

<h2>Kenteken: <?= $data['kenteken'] ?>-<?= $data['Type'] ?></h2>

<div class="form-group">
    <label for="Mankement">Mankement</label>
    <input type="text" name="Mankement" class="form-control form-control-lg" value="<?= $data['Mankement']; ?>">

    <span class="invalid-feedback"><?= $data['Mankement_err']; ?></span>
</div>

<div class="row">
    <div class="col">
        <a href="<?= URLROOT; ?>/mankementen/add/<?= $data['AutoId'] ?>">
            <input type="submit" value="Toevoegen" class="btn btn-success btn-block">
        </a>
    </div>
</div>

<a href="<?= URLROOT; ?>/homepages/index">Terug</a>