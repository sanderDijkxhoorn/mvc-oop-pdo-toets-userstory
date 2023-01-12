<h1><?= $data["title"]; ?></h1>

<h2>Naam instructeur: <?= $data['InstructeurNaam'] ?></h2>
<h2>Email instructeur: <?= $data['InstructeurEmail'] ?></h2>
<h2>Kenteken: <?= $data['kenteken'] ?>-<?= $data['Type'] ?></h2>

<a href="<?= URLROOT; ?>/mankementen/new/<?= $data['AutoId'] ?>">Mankement toevoegen</a>


<a href="<?= URLROOT; ?>/homepages/index">Terug</a>