<?php
    require_once 'db.php';

    $sql = "SELECT id, author, title, comment, date FROM guestbook";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td class="small"><form action="delete.php" method="POST"><button type="submit" value="'.$row['id'].'"name="delete">Delete</button></form></td>';
            echo '<td class="small"><form action="update.php" method="GET"><button type="submit" value="'.$row['id'].'" name="update">Update</button></form></td>';
            echo '<td class="small">'.$row['author'].'</td>';
    		echo '<td class="small">'.$row['title'].'</td>';
    		echo '<td class="small">'.$row['comment'].'</td>';
    		echo '<td class="small">'.$row['date'].'</td>';
    		echo '</tr>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>
