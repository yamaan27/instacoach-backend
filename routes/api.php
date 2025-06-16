<?php

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$request = explode('?', $request)[0];

switch ($request) {
    case '/register':
        require_once '../controllers/AuthController.php';
        if ($method === 'POST') register($pdo);
        break;

    case '/login':
        require_once '../controllers/AuthController.php';
        if ($method === 'POST') login($pdo);
        break;

    case '/availability/add':
            require_once '../controllers/AvailabilityController.php';
            if ($method === 'POST') addAvailability($pdo);
            break;
        
    case (preg_match('#^/availability/(\d+)/(\d{4}-\d{2}-\d{2})$#', $request, $matches) ? true : false):
            require_once '../controllers/AvailabilityController.php';
            if ($method === 'GET') getAvailability($pdo, $matches[1], $matches[2]);
            break;
    case '/session/book':
                require_once '../controllers/SessionController.php';
                if ($method === 'POST') bookSession($pdo);
                break;
            
    case (preg_match('#^/session/(\d+)/(coach|client)$#', $request, $m) ? true : false):
                require_once '../controllers/SessionController.php';
                if ($method === 'GET') getSessions($pdo, $m[1], $m[2]);
                break;
    case '/review/submit':
                    require_once '../controllers/ReviewController.php';
                    if ($method === 'POST') submitReview($pdo);
                    break;
                
    case (preg_match('#^/review/coach/(\d+)$#', $request, $m) ? true : false):
                    require_once '../controllers/ReviewController.php';
                    if ($method === 'GET') getCoachReviews($pdo, $m[1]);
                    break;
                   

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
        break;
}
