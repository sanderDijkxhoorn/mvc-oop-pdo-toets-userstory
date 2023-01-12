<h1><?= $data["title"]; ?></h1>

<h2>Naam instructeur: <?= $data['InstructeurNaam'] ?></h2>
<h2>Email instructeur: <?= $data['InstructeurEmail'] ?></h2>
<h2>Kenteken: <?= $data['kenteken'] ?>-<?= $data['Type'] ?></h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Datum</th>
            <th scope="col">Mankement</th>
        </tr>
    </thead>
    <tbody>
        <?= $data['mankementen'] ?>
    </tbody>
</table>

<a href="<?= URLROOT; ?>/mankementen/new/<?= $data['AutoId'] ?>">Mankement toevoegen</a>

<br>

<a href="<?= URLROOT; ?>/homepages/index">Terug</a>