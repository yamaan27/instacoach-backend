<?php
class Review {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function submit($session_id, $reviewer_id, $rating, $comment) {
        $stmt = $this->pdo->prepare("INSERT INTO reviews (session_id, reviewer_id, rating, comment) VALUES (?, ?, ?, ?)");
        $stmt->execute([$session_id, $reviewer_id, $rating, $comment]);
        return ['success' => true];
    }

    public function getByCoach($coach_id) {
        $stmt = $this->pdo->prepare("SELECT r.*, u.name FROM reviews r JOIN sessions s ON r.session_id = s.id JOIN users u ON r.reviewer_id = u.id WHERE s.coach_id = ?");
        $stmt->execute([$coach_id]);
        return $stmt->fetchAll();
    }
}
