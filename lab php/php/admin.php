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
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../javascript.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="admin.php">Home</a></li>
      <li><a href="logout.php">Sign out</a></li>
    </ul>
    <form class="navbar-form navbar-left">
      <div class="input-group">
        <input type="text" id="search" class="form-control" placeholder="Search" name="search" autocomplete="off">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
</nav>

<div class="container">
<h4>Guestbook</h4>

<div class="row mt">
  <div class="col-lg-12">
    <div class="content-panel tablesearch">

      <section id="unseen">
        <table id="resultTable" class="table table-bordered table-hover table-condensed">
          <thead>
            <tr>
        
              <th class="small">Author</th>
              <th class="small">Title</th>
              <th class="small">Comment</th>
              <th class="small">Date</th>
        
            </tr>
          </thead>
          <tbody>
            <script type="text/javascript">
              $('#resultTable').dataTable({
                "searching": false,
                "info": false,
                "lengthChange": false,
                "bSort": false});
            </script>
          </tbody>
        </table>
      </section>

    </div>
  </div>
</div>
<div class="main-table">
    <section id="unseen">
        <table id="resultTable-topsearch" class="table table-bordered table-hover table-condensed" data-page-length='4'>
            <thead>
              <tr>
                <th class="small"></th>
                <th class="small"></th>
                <th class="small">Author</th>
                <th class="small">Title</th>
                <th class="small">Comment</th>
                <th class="small">Date</th>
              </tr>
            </thead>

            <tbody><?php include 'findall.php' ?>
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
</div>
</body>
</html>
