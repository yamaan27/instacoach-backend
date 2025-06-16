<?php
class Availability {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function add($coach_id, $date, $start, $end) {
        $stmt = $this->pdo->prepare("INSERT INTO availability (coach_id, date, start_time, end_time) VALUES (?, ?, ?, ?)");
        $stmt->execute([$coach_id, $date, $start, $end]);
        return ['success' => true];
    }

    public function getByDate($coach_id, $date) {
        $stmt = $this->pdo->prepare("SELECT * FROM availability WHERE coach_id = ? AND date = ?");
        $stmt->execute([$coach_id, $date]);
        return $stmt->fetchAll();
    }
}
