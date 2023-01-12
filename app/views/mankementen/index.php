<h1><?= $data["title"]; ?></h1>

<h2>Naam instructeur: Voorbeeld</h2>
<h2>Naam instructeur: Voorbeeld</h2>
<h2>Naam instructeur: Voorbeeld</h2>


<table class="table">
  <thead>
    <th>Id</th>
    <th>AutoId</th>
    <th>Datum</th>
    <th>Mankement</th>
    <th>Update</th>
    <th>Delete</th>
  </thead>
  <tbody>
    <?= $data['mankementen'] ?>
  </tbody>
</table>
<a href="<?= URLROOT; ?>/homepages/index">Terug</a>