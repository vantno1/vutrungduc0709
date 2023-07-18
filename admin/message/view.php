<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../images/icon-web.jpg" type="image/gif">
  <link rel="stylesheet" href="../../plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/fontawesome/fontawesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  </link>
  <title>Admin</title>
</head>

<body>
  <?php
  include "../adminHeader.php";
  include "../sidebar.php";
  ?>
  <div class="container-header">
    <a href="../index.php" class="link">Trang chủ</a>
  </div>
  <h2 style="font-size:25px;padding:10px 10px 0;justify-content:center;display:flex">Sửa / Xóa</h2>
  <table class="table_form">
    <tr>
      <th class="table_item">ID</th>
      <th class="table_item">Subject</th>
      <th class="table_item">Name</th>
      <th class="table_item">Email</th>
      <th class="table_item">Message</th>
      <th class="table_item">Delete</th>
    </tr>
    <?php
    include('../connect.php');
    // lấy ra mọi giá trị từ bảng contacts
    $sql = "select * from contacts";
    $result = mysqli_query($conn, $sql);
    $stt = 1;
    ?>
    <tr>
      <?php foreach ($result as $row) : ?>
        <td class="table_item"><?php echo $stt++ ?></td>
        <td class="table_item"><?php echo $row['subject']; ?></td>
        <td class="table_item"><?php echo $row['name']; ?></td>
        <td class="table_item"><?php echo $row['email']; ?></td>
        <td class="table_item"><?php echo $row['message']; ?></td>
        <td class="table_item"><a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</a></td>
    </tr>
  <?php endforeach ?>
  </table>
</body>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>