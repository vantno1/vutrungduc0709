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

  <form method="POST" style="padding: 20px" enctype="multipart/form-data">
    <label>Name:</label>
    <input type="text" name="name" class="form-item"><br>

    <label>Guest:</label>
    <input type="number" name="guest" class="form-item"><br>

    <label>Bed:</label>
    <input type="number" name="bed" class="form-item"><br>

    <label>Bathroom:</label>
    <input type="number" name="bathroom" class="form-item"><br>

    <label>Price:</label>
    <input type="number" name="price" class="form-item"><br>

    <label>Title:</label>
    <input type="text" name="title" class="form-item"><br>

    <label>Short Description:</label>
    <input type="text" name="short_des" class="form-item"><br>

    <label>Description:</label>
    <textarea name="description" class="form-item"></textarea><br>

    <label>Image:</label>
    <input name="image" type="file" class="form-item"><br>

    <input type="submit" value="Create" name="create">
  </form>

  <?php
  include('../connect.php');

  class data
  {
    public function insert_product($name, $guest, $bed, $bathroom, $price, $title, $short_des, $description, $image)
    {
      global $conn;
      // Xử lý ảnh
      $targetDirectory = "../../images/product/"; // Đường dẫn thư mục lưu trữ ảnh (thư mục "images/product/" nằm ngoài thư mục "admin")
      $targetFileName = basename($_FILES["image"]["name"]); // Lấy tên file ảnh từ đầu vào (form upload)
      $targetFilePath = $targetDirectory . $targetFileName; // Đường dẫn đầy đủ tới file ảnh

      // Di chuyển file ảnh tải lên vào thư mục lưu trữ
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO products (name, guest, bed, bathroom, price, title, short_des, description, image) 
                    VALUES ('$name', '$guest', '$bed', '$bathroom', '$price', '$title', '$short_des', '$description', '$targetFileName')";
        $run = mysqli_query($conn, $sql);
        return $run;
      } else {
        return false; // Lỗi khi di chuyển ảnh
      }
    }
    // kiểm tra xem có bị trùng tên hay không
    public function check_product($name)
    {
      global $conn;
      $sql = "SELECT * FROM products WHERE name='$name'";
      $run = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($run);
      return $num;
    }
  }

  $get_data = new data();
  if (isset($_POST['create'])) {
    if (empty($_POST['name']) || empty($_FILES['image']['name'])) {
      echo "Bạn chưa nhập đầy đủ thông tin. Vui lòng thử lại";
    } else {
      $check = $get_data->check_product($_POST['name']);
      if ($check > 0) {
        echo "Tên đã tồn tại. Vui lòng chọn tên khác";
      } else {
        $insert = $get_data->insert_product(
          $_POST['name'],
          $_POST['guest'],
          $_POST['bed'],
          $_POST['bathroom'],
          $_POST['price'],
          $_POST['title'],
          $_POST['short_des'],
          $_POST['description'],
          $_FILES['image']['name']
        );
        if ($insert) {
          header('location:../product/view.php');
        } else {
          echo "Thêm thất bại " . $conn->error;
        }
      }
    }
  }
  ?>



</body>

</html>