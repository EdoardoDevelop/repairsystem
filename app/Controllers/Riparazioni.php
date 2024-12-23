<?php

namespace App\Controllers;

use App\Models\RiparazioniModel;

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
            'nome' => $this->request->getPost('nome'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
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
            return redirect()->to('/inserimento')->with('message', 'Dati salvati con successo!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Errore durante il salvataggio dei dati.');
        }
    }

    public function visualizzaTutte()
    {
        $riparazioniModel = new \App\Models\RiparazioniModel();
        $dati = $riparazioniModel->getAll();
    
        return view('pages/schede_riparazioni', [
            'title' => 'Schede di riparazione',
            'dati' => $dati,
        ]);
    }
    
    public function modificaScheda($id)
    {
        $riparazioniModel = new \App\Models\RiparazioniModel();
        $dati = $riparazioniModel->find($id);

        if (!$dati) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Scheda con ID $id non trovata.");
        }

        return view('pages/modifica_scheda', [
            'title' => 'Modifica Scheda',
            'dati' => $dati,
        ]);
    }

    public function aggiornaScheda($id)
    {
        $riparazioniModel = new \App\Models\RiparazioniModel();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
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
        $riparazioniModel = new \App\Models\RiparazioniModel();
    
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
        $riparazioniModel = new \App\Models\RiparazioniModel();
        $riparazione = $riparazioniModel->find($id);

        if (!$riparazione) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Riparazione con ID $id non trovata.");
        }

        return view('pages/stampa_scheda', ['riparazione' => $riparazione]);

    }


}
