<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../images/icon-web.jpg" type="image/gif">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  </link>
  <title>Admin</title>
</head>

<body>
  <?php include('../adminHeader.php') ?>
  <div class="container-header">
    <a href="create.php" class="link">Thêm</a>
    <a href="view.php" class="link">Sửa/Xóa</a>
  </div>

  <h2 class="header-content">Thêm sản phẩm</h2>

  <form action="" method="POST" style="padding: 20px" enctype="multipart/form-data">
    Country: <input type="text" name="country" class="form-item"><br>
    Place: <input type="text" name="place" class="form-item"><br>
    Short Description: <input type="text" name="short_des" class="form-item"><br>
    Price: <input type="number" name="price" class="form-item"><br>
    Old Price: <input type="number" name="oprice" class="form-item"><br>
    Image: <input name="image" type="file" class="form-item" required><br>
    <label style="align-items:center;display:flex">Description:
      <textarea type="text" name="des" style="width:450px;height:150px; margin-bottom:5px;"></textarea>
    </label><br>
    <input type="submit" value="Create" name="create">
  </form>


  <?php
  include('../connect.php');

  class data
  {
    public function in_product($country, $place, $short_des, $des, $price, $oprice, $img)
    {
      global $conn;
      // Xử lý ảnh
      $targetDirectory = "../../images/places/"; // Đường dẫn thư mục lưu trữ ảnh (thư mục "images/place/" nằm ngoài thư mục "admin")
      $targetFileName = basename($_FILES["image"]["name"]); // Lấy tên file ảnh từ đầu vào (form upload)
      $targetFilePath = $targetDirectory . $targetFileName; // Đường dẫn đầy đủ tới file ảnh

      // Di chuyển file ảnh tải lên vào thư mục lưu trữ
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO places (country, place, short_des, description, price, old_price, image) 
                    VALUES ('$country', '$place', '$short_des', '$des', '$price', '$oprice', '$targetFileName')";
        $run = mysqli_query($conn, $sql);
        return $run;
      } else {
        return false; // Lỗi khi di chuyển ảnh
      }
    }
    // kiểm tra xem có bị trùng tên hay không
    public function select_product($country)
    {
      global $conn;
      $sql = "SELECT * FROM places WHERE country='$country'";
      $run = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($run);
      return $num;
    }
  }

  $get_data = new data();
  if (isset($_POST['create'])) {
    if (empty($_POST['country']) || empty($_POST['price'])) {
      echo "Bạn chưa nhập thông tin sản phẩm. Vui lòng thử lại";
    } else {
      $select = $get_data->select_product($_POST['country']);
      if ($select > 0) {
        echo "Sản phẩm đã tồn tại. Hãy chọn sản phẩm khác";
      } else {
        $insert = $get_data->in_product(
          $_POST['country'],
          $_POST['place'],
          $_POST['short_des'],
          $_POST['des'],
          $_POST['price'],
          $_POST['oprice'],
          $_FILES['image']['name']
        );
        if ($insert) {
          header('location:../place/view.php');
        } else {
          echo "Thêm thất bại " . $conn->error;
        }
      }
    }
  }
  ?>

</body>

</html>