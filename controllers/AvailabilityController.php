<?php
require_once '../models/Availability.php';

function addAvailability($pdo) {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['coach_id'], $data['date'], $data['start_time'], $data['end_time'])) {
        echo json_encode(['error' => 'Missing fields']);
        return;
    }

    $av = new Availability($pdo);
    echo json_encode($av->add($data['coach_id'], $data['date'], $data['start_time'], $data['end_time']));
}

function getAvailability($pdo, $coach_id, $date) {
    $av = new Availability($pdo);
    echo json_encode($av->getByDate($coach_id, $date));
}
