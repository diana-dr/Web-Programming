<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <script src="javascript.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="client.php">Home</a></li>
      <li><a href="../html/insert.html" id="add">Add new entry</a></li>
      <li><a href="logout.php">Sign out</a></li>
    </ul>
</nav>

<div class="container">
  <h3>Guestbook</h3>
  <section id="unseen">
        <table id="resultTable-topsearch" class="table table-bordered table-hover table-condensed" data-page-length='4'>
            <thead>
              <tr>
          
                <th class="small">Author</th>
                <th class="small">Title</th>
                <th class="small">Comment</th>
                <th class="small">Date</th>
          
              </tr>
            </thead>
          
            <tbody>
            <?php
              require_once 'db.php';

              $sql = "SELECT id, author, title, comment, date FROM guestbook";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo '<tr>';
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
            <script type="text/javascript">
              $('#resultTable-topsearch').dataTable({
                "searching": false,
                "info": false,
                "lengthChange": false,
                "bSort": false});
            </script>
            </tbody>
        </table>
    </section>
</div>

</body>
</html>
