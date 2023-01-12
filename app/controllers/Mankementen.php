<?php
class Mankementen extends Controller
{

  public function __construct()
  {
    $this->mankementModel = $this->model('Mankement');
  }

  public function index()
  {
    $mankementen = $this->mankementModel->getMankementen();

    // Vardumpie
    var_dump($mankementen);

    // Maak de inhoud voor de tbody in de view
    $rows = '';
    foreach ($mankementen as $mankement) {
      $dateTimeObj = new DateTimeImmutable($mankement->DatumTijd, new DateTimeZone('Europe/Amsterdam'));
      $date = $dateTimeObj->format('d-m-Y');
      $time = $dateTimeObj->format('H:i');

      $rows .= "<tr>
                  <td>$date</td>
                  <td>$time</td>
                  <td>$mankement->LENA</td>
                  <td>$mankement->mankementinfo</td>
                  <td>$mankement->Onderwerp</td>
                  <td>
                    <a href='" . URLROOT . "/mankementen/update/$mankement->mankementId' class='btn btn-primary'>
                      <img src='" . URLROOT . "/img/b_sbrowse.png' alt='table picture' style='width:20px; height:20px;'>
                    </a>
                  </td>
                  <td>
                    <a href='" . URLROOT . "/mankementen/delete/$mankement->mankementId' class='btn btn-primary'>
                      <img src='" . URLROOT . "/img/page_delete.png' alt='cross delete picture' style='width:20px; height:20px;'>
                    </a>
                  </td>
                </tr>";
    }

    $data = [
      'title' => 'mankementen overzicht',
      'mankementen' => $rows,
      'instructeurName' => $mankementen[0]->INNA
    ];
    $this->view('mankementen/index', $data);
  }

}