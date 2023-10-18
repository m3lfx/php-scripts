<?php
include('../include/header.php');
?>
<body>
    <?php
        include('../include/config.php');
        $query = "SELECT *  FROM albums ORDER BY album_id DESC";
        $result = mysqli_query($conn, $query);
        ?>
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="id">Id</th>
      <th scope="name">Album name</th>
      <th>genre</th>
      <th>date released</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<th scope='row'>{$row['album_id']}</th>";
    echo "<td>{$row['title']}</td>";
    echo "<td>{$row['genre']}</td>";
    echo "<td>{$row['date_released']}</td>";
    echo "<td><a href='edit.php?id={$row['album_id']}'><i class=\"fa-solid fa-pencil\" color='blue'></i></a><a href='delete.php?id={$row['album_id']}'><i class=\"fa-solid fa-trash\" style='color: red'></i></a></td>";
     echo "</tr>";
  }
  ?>
  </tbody>
</table>
</body>
</html>