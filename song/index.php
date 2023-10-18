<?php
include('../include/header.php');
include('../include/config.php');

//song album artist

$sql = "SELECT s.song_id, s.title AS `song title`, ar.name, al.title AS `album title`, s.description FROM artists ar INNER JOIN albums al ON (ar.artist_id = al.artists_artist_id) INNER JOIN songs s ON (s.albums_album_id = al.album_id)";
$result = mysqli_query($conn, $sql);
// $artists = mysqli_fetch_assoc($result);
// var_dump($artists);
?>
<body>
<a href="create.php" class="btn btn-primary btn-lg " role="button" aria-disabled="true">Add song</a></p>
    <table  class="table table-striped table-bordered">
    <thead>
    <tr>
     
      <th scope="name">songs</th>
      <th>artist name</th>
      <th>album name</th>
      <th>song description</th>
      <th>Action</th>
    </tr>
  </thead>
    <?php
         while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>{$row['song title']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['album title']}</td>";
            echo "<td>{$row['description']}</td>";
          
            
            echo "<td><a href='edit.php?id={$row['song_id']}'><i class='fa-regular fa-pen-to-square' style='color: blue'></i></a><a href='delete.php?id={$row['song_id']}'><i class='fa-solid fa-trash' style='color: red'></i></a></td>";
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>