<?php

function searchByName($name, $connect) {
    $sql = "SELECT * FROM student WHERE first_name LIKE :name";
    $stmt = $connect->prepare($sql);
    $stmt->execute(['name' => "%$name%"]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return !empty($result) ? $result : "Žádné výsledky";
}

function sortByAge($connect, $sortBy) {
    $orderBy = ($sortBy == 'asc') ? 'ASC' : 'DESC';
    $sql = "SELECT * FROM student ORDER BY age $orderBy";
    $stmt = $connect->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return !empty($result) ? $result : "Žádné výsledky";
}
