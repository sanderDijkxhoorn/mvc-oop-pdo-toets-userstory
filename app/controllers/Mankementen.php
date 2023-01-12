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
        // var_dump($mankementen);

        // Maak de inhoud voor de tbody in de view
        $rows = '';
        foreach ($mankementen as $mankement) {

            $rows .= "<tr>
                  <td>$mankement->Datum</td>
                  <td>$mankement->Mankement</td>
                </tr>";
        }

        $data = [
            'title' => 'mankementen overzicht',
            'mankementen' => $rows,
            'InstructeurNaam' => $mankementen[0]->Naam,
            'InstructeurEmail' => $mankementen[0]->Email,
            'kenteken' => $mankementen[0]->Kenteken,
            'AutoId' => $mankementen[0]->Id
        ];
        $this->view('mankementen/index', $data);
    }

    public function new($id)
    {
        $data = [
            'title' => 'mankement toevoegen',
            'AutoId' => $id
        ];
        $this->view('mankementen/new', $data);
    }
}
