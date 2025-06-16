<?php
require_once '../models/Session.php';

function bookSession($pdo) {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['coach_id'], $data['client_id'], $data['date'], $data['time'])) {
        echo json_encode(['error' => 'Missing fields']);
        return;
    }

    $s = new Session($pdo);
    echo json_encode($s->book($data['coach_id'], $data['client_id'], $data['date'], $data['time']));
}

function getSessions($pdo, $user_id, $role) {
    $s = new Session($pdo);
    echo json_encode($s->listForUser($user_id, $role));
}
