<?php

namespace App\Controllers;

use App\Models\RiparazioniModel;
use App\Models\ClientiModel;

class Riparazioni extends BaseController
{
    public function inserisci()
    {
        return view('pages/inserimento', [
            'title' => 'Nuova Scheda'
        ]);
    }

    public function salva()
    {
        $riparazioniModel = new RiparazioniModel();

        // Recupera i dati dal form
        $data = [
            'id_cliente' => $this->request->getPost('id_cliente'),
            'tipo_dispositivo' => $this->request->getPost('tipo_dispositivo'),
            'marca' => $this->request->getPost('marca'),
            'modello' => $this->request->getPost('modello'),
            'numero_serie' => $this->request->getPost('numero_serie'),
            'difetto' => $this->request->getPost('difetto'),
            'data_consegna' => $this->request->getPost('data_consegna'),
            'note' => $this->request->getPost('note'),
        ];

        // Salva i dati nel database
        if ($riparazioniModel->insert($data)) {
            return redirect()->to('/visualizza-schede')->with('message', 'Dati salvati con successo!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Errore durante il salvataggio dei dati.');
        }
    }

    public function visualizzaTutte()
    {
        $riparazioniModel = new RiparazioniModel();
        $dati = $riparazioniModel->getAll();
    
        return view('pages/schede_riparazioni', [
            'title' => 'Schede di riparazione',
            'dati' => $dati,
        ]);
    }
    
    public function modificaScheda($id)
    {
        $riparazioniModel = new RiparazioniModel();
        $clientiModel = new ClientiModel();

        $dati = $riparazioniModel->find($id);

        if (!$dati) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Scheda con ID $id non trovata.");
        }
        // Recupera il cliente associato alla scheda
        $cliente = $clientiModel->find($dati['id_cliente']);

        return view('pages/modifica_scheda', [
            'title' => 'Modifica Scheda',
            'dati' => $dati,
            'cliente' => $cliente,
        ]);
    }

    public function aggiornaScheda($id)
    {
        $riparazioniModel = new RiparazioniModel();

        $data = [
            'id_cliente' => $this->request->getPost('id_cliente'),
            'tipo_dispositivo' => $this->request->getPost('tipo_dispositivo'),
            'marca' => $this->request->getPost('marca'),
            'modello' => $this->request->getPost('modello'),
            'numero_serie' => $this->request->getPost('numero_serie'),
            'difetto' => $this->request->getPost('difetto'),
            'data_consegna' => $this->request->getPost('data_consegna'),
            'note' => $this->request->getPost('note'),
        ];

        if ($riparazioniModel->update($id, $data)) {
            return redirect()->to('/visualizza-schede')->with('message', 'Scheda aggiornata con successo!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Errore durante l\'aggiornamento.');
        }
    }
    public function eliminaScheda($id)
    {
        $riparazioniModel = new RiparazioniModel();
    
        // Verifica se il record esiste
        $scheda = $riparazioniModel->find($id);
        if (!$scheda) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Scheda con ID $id non trovata.");
        }
    
        // Elimina il record
        if ($riparazioniModel->delete($id)) {
            return redirect()->to('/visualizza-schede')->with('message', 'Scheda eliminata con successo!');
        } else {
            return redirect()->to('/visualizza-schede')->with('error', 'Errore durante l\'eliminazione della scheda.');
        }
    }
    public function stampaScheda($id)
    {
        $riparazioniModel = new RiparazioniModel();
        $riparazione = $riparazioniModel->find($id);

        if (!$riparazione) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Scheda con ID $id non trovata.");
        }

        return view('pages/stampa_scheda', ['riparazione' => $riparazione]);

    }


}
