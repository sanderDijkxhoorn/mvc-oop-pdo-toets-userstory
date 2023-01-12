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
            'AutoId' => $mankementen[0]->Id,
            'Type' => $mankementen[0]->Type
        ];

        $this->view('mankementen/index', $data);
    }

    public function new($id)
    {
        // Check if GET or POST

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $mankementen = $this->mankementModel->getMankementen();

            $data = [
                'title' => 'mankementen toevoegen',
                'InstructeurNaam' => $mankementen[0]->Naam,
                'InstructeurEmail' => $mankementen[0]->Email,
                'kenteken' => $mankementen[0]->Kenteken,
                'AutoId' => $mankementen[0]->Id,
                'Type' => $mankementen[0]->Type
            ];

            $this->view('mankementen/new', $data);
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $_POST['AutoId'] = $id;

                $worked = $this->mankementModel->addMankement($_POST);

                if ($worked) {
                    $mankementen = $this->mankementModel->getMankementen();

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
                        'AutoId' => $mankementen[0]->Id,
                        'Type' => $mankementen[0]->Type,
                        'Success' => 'Mankement toegevoegd'
                    ];
                } else {
                    $data = [
                        'title' => 'mankementen overzicht',
                        'mankementen' => $rows,
                        'InstructeurNaam' => $mankementen[0]->Naam,
                        'InstructeurEmail' => $mankementen[0]->Email,
                        'kenteken' => $mankementen[0]->Kenteken,
                        'AutoId' => $mankementen[0]->Id,
                        'Type' => $mankementen[0]->Type,
                        'Error' => 'Mankement toevoegen fout gegaan'
                    ];
                }
                $this->view('mankementen/index', $data);
            } catch (PDOException $e) {
                echo 'Er is iets misgegaan tijdens het toevoegen van een mankement';
                header('Refresh: 2; url=' . URLROOT . '/mankementen/index');
            }
        }
    }
}
