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

      $rows .= "<tr>
                  <td>$mankement->Id</td>
                  <td>$mankement->AutoId</td>
                  <td>$mankement->Datum</td>
                  <td>$mankement->Mankement</td>
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