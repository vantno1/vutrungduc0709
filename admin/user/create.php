<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <style>
    .link {
      text-decoration: none;
      padding: 10px;
      font-size: 20px;
      font-family: 600;
      color: black;
    }

    .form-item {
      width: 250px;
      margin-bottom: 5px
    }
  </style>
</head>

<body>
  <a href="create.php" class="link">Thêm</a>
  <a href="view.php" class="link">Sửa/Xóa</a>
  <a href="../index.php" class="link">Trang chủ</a>
  <h2 style="font-size:25px;padding:10px 10px 0;justify-content:center;display:flex">Thêm người dùng</h2>

  <form action="" method="POST" style="padding: 20px">
    Email: <input type="text" name="name" class="form-item"></br>
    Price: <input type="number" name="price" class="form-item"> </br>
    Image: <input name="img" class="form-item"> </br>
    Image2: <input name="img2" class="form-item"> </br>
    Data_item: <input name="dataitem" class="form-item"> </br>
    Description: <input name="des" class="form-item"> </br>
    <input type="submit" value="Create" name="create">
    <?php
    include('../connect.php');
    class data
    {
      public function in_product($name, $price, $img, $img2, $des, $dataitem)
      {
        global $conn;
        $sql = "insert into products(Name,Price,Image,Image2,Description,Data_item) values('$name','$price','$img','$img2','$des','$dataitem')";
        $run = mysqli_query($conn, $sql);
        return $run;
      }
      // kiểm tra xem có bị trùng tên hay không
      public function select_product($name)
      {
        global $conn;
        $sql = "select * from products where Name='$name'";
        $run = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($run);
        return $num;
      }
    }
    error_reporting(0);
    $get_data = new data();
    if (isset($_POST['create']))
      if (empty($_POST['name']) || empty($_POST['price'])) {
        echo "Bạn chưa nhập thông tin sản phẩm. Vui lòng thử lại";
      } else {
        $select = $get_data->select_product($_POST['name']);
        if ($select > 0)
          echo "Sản phẩm đã tồn tại.Hãy chọn sản phẩm khác";
        else {
          $insert = $get_data->in_product(
            $_POST['name'],
            $_POST['price'],
            $_POST['img'],
            $_POST['img2'],
            $_POST['des'],
            $_POST['dataitem'],
          );
          //Thông báo quá trình lưu
          if ($insert)
            header('location:../view.php');
          else
            echo "Có lỗi xảy ra.>";
        }
      }
    ?>

  </form>
</body>

</html>