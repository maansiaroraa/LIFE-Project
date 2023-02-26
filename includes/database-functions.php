<?php

// Constants.
const SERVER_NAME = 'rmit.australiaeast.cloudapp.azure.com';
const DB_NAME = 's3885529_wp_a2';
const USERNAME = 's3885529_wp_a2';
const PASSWORD = 'IDontKnow@01072002';

const DNS = 'mysql:host=' . SERVER_NAME . ';dbname=' . DB_NAME;

function createConnection() {
    return new PDO(DNS, USERNAME, PASSWORD);
}
function prepareAndExecute($query, $params = null) {
    $pdo = createConnection();
    $statement = $pdo->prepare($query);
    $statement->execute($params);

    return $statement;
}

function prepareExecuteAndFetchAll($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function prepareExecuteAndFetch($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function insertUser($user) {
    $pdo = createConnection();

    $statement = $pdo->prepare(
        'insert into user
        (firstname, lastname, email, confirmemail, phone, birthyear, studentStatus, employmentStatus, password) values
        (:firstname, :lastname, :email, :confirmemail, :phone, :birthyear, :studentStatus, :employmentStatus, :password)');

    return $statement->execute($user);
}

function getUsers() {
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from user');

    $statement->execute();

    return $statement->fetchAll();
}

function getUser($email) {
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from user where email = :email');

    $statement->execute(['email' => $email]);

    return $statement->fetch();
}

function getServices() {
    return prepareExecuteAndFetchAll('select * from service');
}

function getService($id) {
    return prepareExecuteAndFetch('select * from service where service_id = :id', ['id' => $id]);
}

function getServiceInstructions($id) {
    return prepareExecuteAndFetchAll('select * from service_instruction where service_id = :id', ['id' => $id]);
}

function getServiceInstruction($id, $type) {
    return prepareExecuteAndFetch(
        'select * from service_instruction where service_id = :id and service_type = :type',
        ['id' => $id, 'type' => $type]);
}

function insertActivity($activity) {
    return prepareAndExecute(
        'insert into user_service
        (email, service_id, service_type, date_performed, duration_minutes) values
        (:email, :service_id, :service_type, now(), :duration_minutes)', $activity);
}

function getMealInstructions($id) {
    return prepareExecuteAndFetchAll('select * from meal where service_id = :id', ['id' => $id]);
}

function getMealInstruction($id, $type, $meal_id) {
    return prepareExecuteAndFetch(
        'select * from meal where service_id = :id and diet_type = :type and meal_id = :meal_id',
        ['id' => $id, 'type' => $type, 'meal_id' => $meal_id]);
}

function insertMeal($activity) {
    return prepareAndExecute(
        'insert into user_meal
        (email, meal_id, diet_type, meal_date) values
        (:email, :meal_id, :diet_type, now())', $activity);
}
