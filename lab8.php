<?php
// URL для отримання даних
$url = "http://lab.vntu.org/api-server/lab8.php?user=student&pass=p@ssw0rd";

// Отримуємо JSON-дані через file_get_contents
$json_data = file_get_contents($url);

// Перевірка на помилки при отриманні даних
if ($json_data === false) {
    die("Не вдалося отримати дані.");
}

// Перетворюємо JSON у масив
$data = json_decode($json_data, true);

// Перевірка на помилки при декодуванні JSON
if ($data === null) {
    die("Не вдалося декодувати JSON.");
}

// Об'єднуємо всі записи про людей в один масив
$people = array_merge($data[0], $data[1]);

// Виводимо дані у вигляді HTML-таблиці
echo "<table border='1'>";
echo "<tr><th>Ім'я</th><th>Прихильність</th><th>Звання</th><th>Локація</th></tr>";

foreach ($people as $person) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($person['name']) . "</td>";
    echo "<td>" . htmlspecialchars($person['affiliation']) . "</td>";
    echo "<td>" . htmlspecialchars($person['rank']) . "</td>";
    echo "<td>" . htmlspecialchars($person['location']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
