<?php
require_once '../models/User.php';

function register($pdo) {
    header("Content-Type: application/json"); 
    $data = json_decode(file_get_contents('php://input'), true);

    if (
        !isset($data['name']) ||
        !isset($data['email']) ||
        !isset($data['password']) ||
        !isset($data['role']) ||
        empty(trim($data['name'])) ||
        empty(trim($data['email'])) ||
        empty(trim($data['password'])) ||
        empty(trim($data['role']))
    ) {
        http_response_code(400); 
        echo json_encode(['error' => 'All fields (name, email, password, role) are required.']);
        exit;
    }

    $user = new User($pdo);
    $result = $user->create($data['name'], $data['email'], $data['password'], $data['role']);

    http_response_code(201);
    echo json_encode($result);
}

function login($pdo) {
    header("Content-Type: application/json");
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['email'], $data['password']) || empty(trim($data['email'])) || empty(trim($data['password']))) {
        http_response_code(400);
        echo json_encode(['error' => 'Email and password are required.']);
        exit;
    }

    $user = new User($pdo);
    $result = $user->authenticate($data['email'], $data['password']);

    if (!$result) {
        http_response_code(401);
        echo json_encode(['error' => 'Invalid credentials']);
        exit;
    }

    http_response_code(200);
    echo json_encode($result);
}
