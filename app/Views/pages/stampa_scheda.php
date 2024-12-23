<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Riparazione #<?= $riparazione['id']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body onload="window.print();">
    <h1>Scheda Riparazione #<?= $riparazione['id']; ?></h1>
    <p><strong>Cliente:</strong> <?= $riparazione['nome']; ?></p>
    <p><strong>Telefono:</strong> <?= $riparazione['telefono']; ?></p>
    <p><strong>Dispositivo:</strong> <?= $riparazione['tipo_dispositivo']; ?></p>
    <p><strong>Difetto:</strong> <?= $riparazione['difetto']; ?></p>
    <p><strong>Data Consegna:</strong> <?= $riparazione['data_consegna']; ?></p>
</body>
</html>
