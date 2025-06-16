<?php
class Session {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function book($coach_id, $client_id, $date, $time) {
        $stmt = $this->pdo->prepare("INSERT INTO sessions (coach_id, client_id, date, time, status) VALUES (?, ?, ?, ?, 'pending')");
        $stmt->execute([$coach_id, $client_id, $date, $time]);
        return ['success' => true];
    }

    public function listForUser($user_id, $role) {
        $column = $role === 'coach' ? 'coach_id' : 'client_id';
        $stmt = $this->pdo->prepare("SELECT * FROM sessions WHERE $column = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }
}
