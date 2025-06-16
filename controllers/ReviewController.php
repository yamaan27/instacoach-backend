<?php
require_once '../models/Review.php';

function submitReview($pdo) {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($data['session_id'], $data['reviewer_id'], $data['rating'], $data['comment'])) {
        echo json_encode(['error' => 'Missing fields']);
        return;
    }

    $r = new Review($pdo);
    echo json_encode($r->submit($data['session_id'], $data['reviewer_id'], $data['rating'], $data['comment']));
}

function getCoachReviews($pdo, $coach_id) {
    $r = new Review($pdo);
    echo json_encode($r->getByCoach($coach_id));
}
