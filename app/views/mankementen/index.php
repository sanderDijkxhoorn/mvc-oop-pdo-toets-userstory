<h1><?= $data["title"]; ?></h1>

<h2>Naam instructeur: <?= $data['InstructeurNaam'] ?></h2>
<h2>Email instructeur: <?= $data['InstructeurEmail'] ?></h2>
<h2>Kenteken: <?= $data['kenteken'] ?></h2>


<table class="table">
  <thead>
    <th>Datum</th>
    <th>Mankement</th>
  </thead>
  <tbody>
    <?= $data['mankementen'] ?>
  </tbody>
</table>
<a href="<?= URLROOT; ?>/homepages/index">Terug</a>