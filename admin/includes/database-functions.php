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