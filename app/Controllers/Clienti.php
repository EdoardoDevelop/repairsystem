<?php

namespace App\Controllers;

use App\Models\ClientiModel;
use CodeIgniter\API\ResponseTrait;

class Clienti extends BaseController
{
    use ResponseTrait;

    // Visualizza tutti i clienti
    public function visualizza()
    {
        $clientiModel = new clientiModel();
        $clienti = $clientiModel->findAll();

        return $this->respond(['status' => 'success', 'data' => $clienti]);
    }
    public function cerca()
    {
        $search = $this->request->getGet('search'); // Ottieni il termine di ricerca

        $clientiModel = new ClientiModel();

        if ($search) {
            $clienti = $clientiModel->like('nome', $search)->findAll(10); // Cerca fino a 10 risultati
        } else {
            return $this->response->setJSON([]);
        }

        // Prepara i dati per Select2
        $data = array_map(function ($cliente) {
            return [
                'id' => $cliente['id'],
                'nome' => $cliente['nome']
            ];
        }, $clienti);

        return $this->response->setJSON($data);
    }


    // Mostra il form per l'inserimento
    public function inserisci()
    {
        return view('clienti/inserisci');
    }

    // Salva un nuovo cliente
    public function salva()
    {
        $clientiModel = new clientiModel();
        $data = $this->request->getPost();

        // Validazione semplice
        if (!$this->validate([
            'nome'   => 'required|max_length[255]',
            'email'  => 'required|valid_email',
            'telefono' => 'required|max_length[15]',
        ])) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        // Salva i dati nel database
        $id = $clientiModel->insert($data);

        if ($id) {
            return $this->respondCreated(['status' => 'success', 'id' => $id, 'message' => 'Cliente creato con successo.']);
        } else {
            return $this->fail(['status' => 'error', 'message' => 'Errore durante la creazione del cliente.']);
        }
    }

    // Mostra il form per la modifica
    public function modifica($id)
    {
        $clientiModel = new clientiModel();
        $cliente = $clientiModel->find($id);

        if (!$cliente) {
            return $this->failNotFound('Cliente non trovato.');
        }

        return $this->respond(['status' => 'success', 'data' => $cliente]);
    }

    // Aggiorna i dati del cliente
    public function aggiorna($id)
    {
        $clientiModel = new clientiModel();
        $data = $this->request->getPost();

        if (!$this->validate([
            'nome'   => 'required|max_length[255]',
            'email'  => 'required|valid_email',
            'telefono' => 'required|max_length[15]',
        ])) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        if ($clientiModel->update($id, $data)) {
            return $this->respondUpdated(['status' => 'success', 'message' => 'Cliente aggiornato con successo.']);
        } else {
            return $this->fail(['status' => 'error', 'message' => 'Errore durante l\'aggiornamento del cliente.']);
        }
    }

    // Elimina un cliente
    public function elimina($id)
    {
        $clientiModel = new clientiModel();
        if ($clientiModel->delete($id)) {
            return $this->respondDeleted(['status' => 'success', 'message' => 'Cliente eliminato con successo.']);
        } else {
            return $this->fail(['status' => 'error', 'message' => 'Errore durante l\'eliminazione del cliente.']);
        }
    }
}
