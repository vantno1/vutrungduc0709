<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/gallery.css">
    <title>Packages</title>
</head>

<body>
    <?php include('header.php'); ?>
    <!---------------------- header section end ------------------------------->

    <!-- ------------------- Section banner start ------------------------------ -->

    <?php
    include('connect.php');
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM gallery WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
        } else {
            echo "<script>window.location.href = 'index.php';</script>";
            exit;
        }
    } else {
        echo "<script>window.location.href = 'index.php';</script>";
        exit;
    }
    ?>
    <section class="banner" id="banner">
        <div class="banner-container">
            <div class="banner-image">
                <img src="images/gallery/<?php echo $row['image']; ?>" alt="">
            </div>
        </div>
    </section>

    <!-- ------------------- Section banner end ------------------------------ -->

    <!-- ------------------- Section describe start ------------------------------ -->
    <div class="describe">
        <div class="describe-icon">
            <div class="describe-icon-1" style="margin-bottom: 35px;position: fixed;top: 300px;">
                <img style="width:25px ; margin-left:1px" src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/6/6583884373d69ad9dd99f05b165ce725.svg" alt="">
                <div class="number-auto">35</div>
            </div>
            <div class="describe-icon-2" style="position: fixed;top: 450px;">
                <div class="describe-icon-2.1"> <img style="width:25px ; margin-left:16px" src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/6/6904cd2e74ef73120833cff12185a320.svg" alt=""></div>
                <div class="describe-icon-2.2"><img style="width:25px ; margin-left:16px" src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/a/a0658527086382220f22bc9af2bcd921.svg" alt=""></div>
            </div>
        </div>
        <div class="describe-content">
            <h1 class="heading">
                <span>G</span>
                <span>A</span>
                <span>L</span>
                <span>L</span>
                <span>E</span>
                <span>R</span>
                <span>Y</span>
            </h1>
            <p style="color: rgb(104, 113, 118);"><?php echo $row['created_at']; ?> - 30 min read</p>
            <h2><?php echo $row['title']; ?></h2>
            <em><?php echo $row['short_des']; ?></em>
            <!------- ------- container-1 ----------------- -->
            <div class="describe-container-1">
                <?php echo $row['description']; ?>
            </div>
       
            <!-- <div class="describe-container-2">
                <h3>2. Lưu ý gì khi đến Maldives</h3>
                <text>Theo cẩm nang du lịch Maldives, visa sẽ được cấp trực tiếp tại sân bay Male. Bạn cần xuất trình vé máy bay khứ hồi, thẻ tín dụng để chứng minh tài chính và phiếu đặt phòng nghỉ tại khách sạn hoặc resort.</text>
             
                <p>Bạn chỉ cần điền vào phiếu thông tin tại sân bay Maldives là có thể nhận được visa trong 30 ngày vi vu rồi. @Getty</p>
                <text>Tiền tệ lưu thông ở Maldives là đồng Rupiah (1 USD = 15 Rupiah). Tuy nhiên, đồng USD cũng được sử dụng rất phổ biến tại Maldives. Khi đổi tiền tệ, bạn nhớ giữ lại hóa đơn để có thể đổi ngược lại đồng USD với giá tương đương.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-3.webp" alt="">
                <p>Đồng Rupiah hoặc Đô la Mỹ đều được chấp nhận ở hầu hết các dịch vụ. @Wolrd Atlats</p>
                <text>Maldives là quốc gia Hồi giáo. Do đó, những thứ sau đây bạn phải đặc biệt thận trọng: cấm đem theo đồ uống có cồn, cấm đem thịt heo và văn hóa phẩm đồi trụy vào quốc gia này. Tại các resort, khách du lịch có thể mặc áo tắm nhưng tuyệt đối không được khỏa thân. Khi đi dạo bên ngoài, bạn nên chú trọng ăn mặc kín đáo, không nên mặc áo sát nách, hai dây, hở vai hoặc quần, váy ngắn trên đầu gối để tôn trọng văn hóa của địa phương.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-4.webp" alt="">
                <p>Trang phục kín đáo vừa giúp bạn chống nắng, vừa tôn trọng tôn giáo địa phương. @Maldives Independent</p>
                <text>Mực nước biển ở Maldives không quá sâu, nhiều chỗ cạn có thể thấy rõ đáy nhưng khi tham gia các hoạt động dưới biển như chèo thuyền kayak, snorkeling hay lặn, bạn vẫn phải tuân thủ các nguyên tắc an toàn như mặc áo phao, đeo chân nhái, bình dưỡng khí… để đảm bảo an toàn.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-5.webp" alt="">
                <p>Nhiều nơi biển trong xanh và khá cạn. @Just Fly Business </p>
                <text>
                    Thời tiết ở Maldives khá nóng, ban ngày nắng lớn nên khi bơi lội, dạo chơi, bạn đừng quên thoa một lớp kem chống nắng, sử dụng kính râm, nón hoặc dù che.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-6.webp" alt="">
                <p>Kem chống nắng là thứ không thể thiếu để bạn tự tin khám phá Maldives. @Lily Beach Resort & Spa</p>
                <text>Việc có sẵn camera dưới nước hoặc bao chống nước cho máy ảnh, điện thoại sẽ rất tuyệt vời để bạn ghi lại những hình ảnh đẹp nhất khi đang bơi lội hoặc lặn dưới làn nước trong xanh như ngọc. Bạn có thể mua các sản phẩm này ở resort nhưng giá khá là “chát”, vậy nên chuẩn bị trước vẫn tốt hơn.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-7.webp" alt="">
                <p>Trang bị ngay đồ nghề để tác nghiệp dưới nước. @lynda.com</p>
                <text>Cách chào hỏi của người dân ở Maldives rất thú vị. Nếu họ quý bạn, họ sẽ chào bằng cách thu nắm tay hoặc tông vào bụng khác một cách rất hồn nhiên, thân thiện. Đừng lấy làm ngạc nhiên nếu bạn được đón tiếp theo cách đó nhé!</text>
            </div>
            <div class="describe-container-3">
                <h3>3. Thời điểm nào là lý tưởng nhất?</h3>
                <text>Maldives nằm trong khu vực khí hậu nhiệt đới. Nền nhiệt quanh năm cực cao, hiếm khi xuống dưới 25 độ C. Thời tiết tại Maldives cũng bị ảnh hưởng sâu sắc bởi biển nên dù có nắng nóng cao điểm thì cũng không bị khô hạn, khó chịu. Nhìn chung, bạn có thể đến Maldives bất kì lúc nào có điều kiện.</text> <br>
            </div>
            <div class="describe-container-4">
                <h3>4. Đến Maldives bằng cách nào?</h3>
                <text>Việt Nam hiện tại chưa có đường bay thẳng tới Maldives. Hành trình bay của bạn buộc phải có ít nhất 1 điểm dừng. Do không phải phụ thuộc vào visa nên bạn có thể chủ động săn vé giá rẻ bằng cách cài đặt chế độ thông báo giá trên app của Traveloka. Một số hãng hàng không sau đây có đường bay đến Maldives mà bạn có thể chọn gồm: Bangkok Airways, Sri Lankan Airlines, Malaysia Airlines, Singapore Airlines…</text>
            </div>
            <div class="describe-container-5">
                <h3>5. Những trải nghiệm nhất định phải có ở Maldives?</h3>
                <strong> - Ngắm bãi biển phát sáng </strong> <br>
                <text>Tảo dinoflagellate, một nhóm sinh vật đơn bào tập trung với mật độ cao khiến cả bãi biển phát sáng trong đêm, lấp lánh như hàng ngàn vì sao trên trời. Bãi biển Vaadhoo khi màn đêm buông xuống lại phát sáng màu xanh dạ quang như dải ngân hàng huyền bí.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-8.webp" alt="">
                <p>Bãi biển phát sáng trong đêm. @DOUG PERRINE, ALAMY</p>
                <strong> - Lặn biển ngắm san hô </strong> <br>
                <text>Những rạn san hô đẹp nhất thế giới đang ẩn mình dưới làn nước trong xanh như ngọc của Maldives. Tại các khu resort đều có cung cấp dịch vụ lặn biển với dụng cụ chuyên nghiệp và hướng dẫn viên. Với độ sâu khoảng từ 1 mét trở lên, bạn đã có thể hòa mình cùng đại dương xinh đẹp, bơi lội tung tăng cùng những chú cá đuối đáng yêu.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-9.webp" alt="">
                <p>Ngay dưới chân những ngôi nhà sàn nằm nối nhau vươn ra biển, xuyên qua làn nước trong xanh, bạn cũng có thể nhìn thấy từng đàn cá đang bơi lội. @robertandsonbeachwear</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-10.webp" alt="">
                <p>Một trong những hoạt động được yêu thích nhất là khám phá hải dương xinh đẹp và kì diệu bằng các hoạt động lặn biển. @Scuba Diving Maldives Ocean Dimensions</p>
                <strong> - Du ngoạn thủ đô Male</strong><br>
                <text>Nếu đã đến Maldives, bạn không nên bỏ qua thủ đô Male. Nơi này có những nhà thờ, bảo tàng hoặc các phiên chợ nhộn nhịp của người dân địa phương. Male cũng là địa điểm lý tưởng để bạn thưởng thức ẩm thực đường phố và mua sắm những món quà lưu niệm đặc trưng Maldives.</text> <br>
                <text>Thủ đô Male không quá lớn nên mình khuyến khích các bạn đi bộ tham quan để trải nghiệm phong vị địa phương rõ nhất. Nếu có đi taxi thì dù đến điểm nào giá cũng chỉ khoảng 1 đô la Mỹ thôi, taxi tại đây không có đồng hồ tính cước.Trung tâm mua sắm Le Cute cũng là một điểm đến khá tuyệt với nhiều mặt hàng ngoại nhập từ Mỹ và châu Âu, giá khuyến mãi cực hấp dẫn.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-11.webp" alt="">
                <p>Toàn cảnh thủ đô Male xinh đẹp từ hòn đảo nhân tạo Hulhumale. @Lonely Planet</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-12.webp" alt="">
                <p>Nhà thờ Hồi giáo Grand Friday Mosque là một trong những địa danh tham quan nổi tiếng của thủ đô Male. @TablinumCarlson</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-13.webp" alt="">
                <p>Tham quan Trung tâm Triển lãm Nghệ thuật Quốc gia. @Maldives Independent</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-14.webp" alt="">
                <p>Bảo tàng Quốc gia Maldives sẽ đưa bạn du hành ngược thời gian để tìm hiểu về sự phát triển của đảo quốc này. Bảo tàng khá thú vị, được cả người lớn và trẻ em yêu thích. @Maldives Independent</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-15.webp" alt="">
                <p>Khu nhà mồ cổ bí ẩn trong lòng thành phố khiến nhiều khách du lịch hiếu kì. @Maldives Independent</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-16.webp" alt="">
                <p>Dạo quanh chợ truyền thống để thấy cảnh mua bán sầm uất và những nông sản tươi ngon nhất của miền nhiệt đới. @Catherine Poh Huay Tan</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-17.webp" alt="">
                <p>Chợ truyền thống cũng là nơi bán cá ngừ tươi ngon nhất, một trong những đặc sản chất lượng của Maldives. @Travel Croc</p>
                <strong>- Nhảy mùa cùng cá heo, cá voi</strong> <br>
                <text>Bạn đã bao giờ tưởng tượng ra viễn cảnh những chú cá heo, cá voi đang bơi lội tung tăng quanh chiếc thuyền của mình. Chúng cũng biết lắng nghe tiếng trống bodu beru, tự do bơi lội, nhảy múa cùng làn nước. Tại cẩm nang du lịch Maldives, giấc mơ của bạn hoàn toàn có thật.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-19.webp" alt="">
                <p>Bơi lội cùng những chú cá khổng lồ mà đáng yêu, thân thiện. @paul_bonnt</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-20.webp" alt="">
                <p>Thủy phi cơ có lẽ là lần đầu được tận mắt nhìn thấy đối với nhiều khách du lịch, cảm giác cũng rất phấn khích khi được bay lên từ mặt biển. @luxuryholidayofficial</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-21.webp" alt="">
                <p>Liên hệ với khách sạn hoặc resort để đặt một trước dịch vụ đặc biệt này. @transmaldivian.com</p>
                <strong> - Cho cá đuối ăn</strong> <br>
                <text>Theo ánh đèn của các resort, những chú cá đuối thường bơi lên bờ vào ban đêm. Chúng được các nhân viên resort hoặc khách du lịch cho ăn. Vừa đáng yêu, vừa thân thiện vô cùng.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-22.webp" alt="">
                <p>Những chú cá đuối đáng yêu được khách du lịch và nhân viên tại các resort chăm sóc. @Insta Stalker</p>
                <strong> - Thỏa thích bơi lội dưới làn nước xanh mát</strong> <br>
                <text>Trên các hòn đảo, người ta xây rất nhiều những ngôi là sàn lợp mái lá nối liền nhau ra giữa biển. Những hành lang bằng gỗ hoặc những chiếc cầu nhỏ xinh bắt từ nhà này sang nhà khác. Chỉ cần bước chân ra khỏi phòng nghỉ là bạn đã chạm ngay tới biển rồi.Hằng ngày, các dịch vụ của resort hay các bữa ăn cũng được nhân viên chèo thuyền nhỏ, phục vụ tận phòng. Đây là một trong những nét đặc trưng của Maldives. Ngoài ra, bạn cũng có thể thuê những chiếc thuyền kayak nhỏ để tham quan các vịnh biển xinh đẹp.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-23.webp" alt="">
                <p>Chèo thuyền Kayak trên làn nước trong xanh, êm đềm, ngắm cảnh thiên nhiên biển đảo đẹp như mơ. @Maldives Expert</p>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-24.webp" alt="">
                <p>Các thiên đường biển tại Maldives thực sự là những điểm sống ảo không góc chết, ảnh nào ảnh nấy càn quét cả mạng xã hội. @eugeerodri</p>

            </div>
            <div class="describe-container-6">
                <h3>6. Gợi ý khách sạn, resort hoặc nhà nghỉ tốt nhất tại Maldives</h3>
                <strong> - Olhuveli Beach & Spa Maldives</strong> <br>
                <text>Olhuveli Beach & Spa Maldives là một resort sang trọng với những dịch vụ tốt nhất của Maldives. Resort với hơn 164 phòng nhiều loại khác nhau, đặc biệt là những căn nhà dựng trên biển. Nơi đây cũng tổ chức các hoạt động thể thao trên biển, 2 hồ bơi lớn, bờ biển siêu đẹp và phục vụ những món ăn địa phương tươi ngon. Olhuveli Beach & Spa Maldives cũng là nơi được đề xuất cho những tuần trăng mật ngọt ngào.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-34.webp" alt="">
                <p>Olhuveli Beach & Spa Maldives là một resort sang trọng với những dịch vụ tốt nhất của Maldives. @Maldives Magazine</p>
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
                <strong> - Bandos Maldives</strong> <br>
                <text>Chỉ nằm cách sân bay Male 10 phút đi xe, Bandos Maldives là một resort lý tưởng vô cùng dành cho những du khách đam mê hoạt động lặn biển. Vị trí tọa lạc của resort cũng là nơi có những rạn san hô đẹp nhất. Resort này đã giành được nhiều giải thưởng lớn cho dịch vụ lặn cùng đội ngũ nhân viên chuyên nghiệp, thân thiện, đa ngôn ngữ.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-35.webp" alt="">
                <p>Noovilu Suites Maldives nằm gần trung tâm thành phố, trên đảo Mahibadhoo xinh đẹp. @Noovilu Suites Maldives</p>
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
                <strong> - Noovilu Suites Maldives</strong> <br>
                <text>Khách sạn có 7 phòng gọn gàng, sạch sẽ, một trong những lựa chọn thông minh nếu bạn muốn tiết kiệm chi phí cho phần lưu trú. Noovilu Suites Maldives nằm gần trung tâm thành phố, trên đảo Mahibadhoo xinh đẹp nên bạn rất dễ dàng tìm kiếm những dịch vụ cơ bản cũng như trải nghiệm những nét văn hóa đặc trưng của người dân địa phương. Từ Noovilu Suites Maldives, bạn chỉ mất vài phút là ra tới biển.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-36.webp" alt="">
                <p>Noovilu Suites Maldives nằm gần trung tâm thành phố, trên đảo Mahibadhoo xinh đẹp. @Noovilu Suites Maldives</p>
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
                <strong> - Dhevanafushi Maldives Luxury Resort, Managed by AccorHotels</strong> <br>
                <text>Đây là khu nghỉ dưỡng cao cấp tọa lạc tại Đảo san hô Gaafu Alifu. Resort cũng có một bộ sưu tập cực mê hồn những villa ven biển với đầy đủ hồ bơi, spa, massage trị liệu và đặc biệt thích hợp cho các cặp đôi lãng mạn. Dhevanafushi Maldives Luxury Resort có 2 điểm nhấn là nhà hàng Johari đẳng cấp cho những bữa ăn ngắm hoàng hôn diễm lệ trên biển và trung tâm lặn đạt chuẩn 5 sao PADI với những thiết bị tốt nhất để bạn tha hồ khám phá những rạn san hô tuyệt sắc tự nhiên.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-37.webp" alt="">
                <p>@Dhevanafushi Maldives Luxury Resort</p>
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
                <strong> - Mala Maldives Dhangethi</strong> <br>
                <text>Một nhà nghỉ thân thiện và yên bình tại Maldives, nơi bạn có thể hòa mình vào cuộc sống giản dị và gặp gỡ những người bạn đáng yêu cùng đi du lịch. Mỗi phòng nghỉ tại Mala Maldives Dhangethi đều được trang bị những tiện ích cơ bản, gọn gàng, xinh xinh với cửa sổ nhìn ra vườn. Nhà nghỉ cũng thường tổ chức những bữa tiệc BBQ trên bãi biển để kết nối những du khách đang lưu trú, tạo nên bầu không khí thân thiện, hòa đồng.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-38.webp" alt="">
                <p>Mỗi phòng nghỉ tại Mala Maldives Dhangethi đều được trang bị những tiện ích cơ bản, gọn gàng, xinh xinh.</p>
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
                <strong> - Beach Palace Maldives</strong> <br>
                <text>Thêm một lựa chọn tiết kiệm khi đến Maldives. Khách sạn này nằm ở một con đường khá yên tĩnh. Phòng nghỉ nhỏ xinh với đầy đủ tiện ích cơ bản. Trên sân thượng có một nhà hàng phục vụ các món ăn kiểu Maldives, vừa thưởng thức ẩm thực, âm nhạc, vừa ngắm hoàng hôn và gió biển.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-39.webp" alt="">
                <p>Thêm một lựa chọn tiết kiệm mà tuyệt vời khi đến Maldives. @Beach Palace Maldives</p>
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
                <strong> - Ellaidhoo Maldives by Cinnamon</strong> <br>
                <text>Còn đây là một đề xuất chanh sả đáng đồng tiền bát gạo với những dịch vụ đẳng cấp nhất. Từ phòng nghỉ, nhà hàng, hồ bơi, spa và các tiện ích khác, tất cả đều được Ellaidhoo Maldives by Cinnamon chăm chút kỹ lưỡng để nâng niu từng trải nghiệm nghỉ dưỡng của khách du lịch đến Maldives. Những căn phòng một bước ra tới biển, ban công lớn chuẩn bị sẵn ghế tựa êm ái, bạn chắc chắn có những phút giây thư giãn không thể nào tuyệt hơn.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-40.webp" alt="">
                <p>Ellaidhoo Maldives by Cinnamon chăm chút kỹ lưỡng để nâng niu từng trải nghiệm nghỉ dưỡng của khách du lịch.</p>
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
                <strong> - Dusit Thani Maldives</strong> <br>
                <text>Chanh sả đúng chuẩn Maldives với những căn phòng nối nhau ra giữa biển chuẩn nghỉ dưỡng 5 sao trên đảo Mudhdhoo, xung quanh được bao bọc bởi làn nước trong xanh và những rạn san hô đẹp tuyệt. Ngay khi hạ cánh tại sân bay Male, xe trung chuyển của khách sạn sẽ đón bạn tận nơi. Mỗi phòng nghỉ trên biển của Dusit Thani Maldives còn có hẳn hồ bơi riêng biệt.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-41.webp" alt="">
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
                <strong> - Centara Ras Fushi Resort & Spa Maldives </strong> <br>
                <text>Đây là một trong những resort sang trọng có kiến trúc đẹp nhất ở Maldives. Mọi hoạt động nghỉ dưỡng đều có đầy đủ trong resort này gồm phòng nghỉ, nhà hàng, hồ bơi, spa, lớp yoga, gym, lặn biển, lướt sóng, bóng chuyền… Thiên đường nghỉ dưỡng này chắc chắn níu chân bạn một cách ngọt ngào đến khó tả. Nếu không chọn các phòng ngoài biển, bạn cũng có thể chọn các phòng trong đất liền nhưng dù ở đâu thì không gian biển đảo xanh mát cũng ùa vào tận phòng.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-42.webp" alt="">
                <p>Đây là một trong những resort sang trọng có kiến trúc đẹp nhất ở Maldives</p>
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
                <strong> - Oceanic Village Maldives</strong> <br>
                <text>Oceanic Village Maldives thích hợp cho các chuyến đi du lịch hoặc công tác tại Maldives. Mỗi tầng của khách sạn này có 4 phòng lớn rất tiện nghi, thông thoáng và đầy đủ vật dụng cơ bản. Trên tầng thượng có một rooftop café, bồn tắm nhỏ cho cá nhân và những chiếc ghê tựa cho người thích phơi nắng. Giá của Oceanic Village Maldives cũng khá mềm, giúp bạn tiết kiệm đáng kể chi phí lưu trú.</text> <br>
                <em>Tham khảo thông tin và đặt phòng ngay tại <a href="./discovery.php"> ĐÂY.</a></em> <br>
            </div>
            <div class="describe-container-7">
                <h3>7. Thiên đường ẩm thực Maldives</h3>
                <strong> - Nước ép trái cây</strong> <br>
                <text>Giữa biển xanh trong mát rượi nhưng cái nóng của thời tiết chắc chắn khiến bạn cần ngay một ly nước trái cây mát lạnh. Thức uống bổ dưỡng, đẹp da, giải khát này bạn có thể tìm mua ở mọi nơi, rất phổ biến ở Maldives. Mỗi mùa, Maldives sẽ có một loại trái cây đặc trưng nhưng thơm ngon và sảng khoái nhất phải kể tới nước ép thơm hoặc nước dừa.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-43.webp" alt="">
                <p>Những thức uống lý tưởng trong thời tiết nắng lớn của Maldives chỉ có thể là trái cây tươi. @Aryavrit Travels</p>
                <strong> - Cà ri Riha</strong> <br>
                <text>Ẩm thực của Maldives ảnh hưởng rất nhiều bởi Ấn Độ nên vị thơm nồng của cà ri không thể thiếu trong các thực đơn. Bột cà ri truyền thống được chính người dân Maldives làm ra nấu chung với thịt gà và các loại gia vị đi kèm. Sốt cà ri cay cay, beo béo và thơm nồng thấm vào từng thớ thịt gà cho màu sắc sinh động, ngon miệng hơn khi ăn với bánh roshi, papadu hoặc cơm trắng.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-44.webp" alt="">
                <p>Một thố cà ri hấp dẫn từ hương vị tới màu sắc. @The Maldives Expert</p>
                <strong> - Mas Huni</strong> <br>
                <text>Món ăn này có thành phần chính là cá ngừ của Maldives, vừa ngọt, vừa thơm lại chắc thịt. Ngoài ra, thành phần còn có dừa beo béo, hành tây dậy mùi và cả ớt xay cay nồng. Các nguyên lệu được cắt nhỏ hoặc nghiền nát ăn kèm với bánh mì nóng giòn. Một món điểm tâm thơm ngon, phổ biến đúng điệu Maldives.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-45.webp" alt="">
                <p>Nhân cá hồi thơm ngon là điểm nhấn của món ăn này. @Maldives.com</p>
                <strong> - Garudhiya</strong> <br>
                <text>Vẫn là cá ngừ, đặc sản từ biển đảo. Món canh truyền thống này không phải ai cũng thích ăn nhưng một khi là tín đồ của cá ngừ thì thật sự thỏa mãn. Nguyên liệu chỉ có cá ngừ tươi ngon nhất, muối và nước nấu thành canh. Để tạo thêm hương vị thơm ngon mà khách du lịch có thể thưởng thức, người ta đã cho thêm ớt, cà ri và hành.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-46.webp" alt="">
                <p>Canh cá thường được ăn với cơm, đơn giản mà thấm vị. @bodukakkaa's</p>
                <strong> - Bajiya</strong> <br>
                <text>Vỏ bánh bên ngoài vàng và giọn rụm, bên trong nhân bánh là cá ngừ hun khói hoặc cá ngừ luộc vừa thơm vừa mềm. Người ta trộn thêm một chút dừa, ớt khô, xoài và hạt tiêu để món ăn thêm lạ miệng và dậy mùi. Các resort, nhà hàng thường phục vụ món này vào buổi xế chiều kèm theo một vài loại sốt đặc biệt để chấm bánh.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-47.webp" alt="">
                <p>Một phần bánh bajiya giòn rụm cho bữa xế. @maeesha_a</p>
                <strong> - Gulha</strong> <br>
                <text>Gulha là những chiếc bánh bao kiểu Maldives. Nhân bánh bên trong được làm từ cá hồi, ớt, hành tây và một số gia vị địa phương. Đặc biệt, người dân ở Maldives còn cho thêm chút chanh và nghệ vào nhân, tạo màu sắc vừa đẹp lại có hương vị độc đáo. Khác với món bánh bao bạn thường thấy của người Hoa, vỏ bánh Gulha được làm bằng bột mì nặn viên tròn rồi đem chiên trên chảo dầu lớn cho đến khi vàng ươm và giọn rụm. Cắn ngay một chiếc ngập răng, nhai rộp rộp thì sướng miệng khó mà tả được.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-48.webp" alt="">
                <p>Nguyên liệu làm món bánh gulha thơm giòn. @zettywawa's</p>
                <strong>- Fihunu Mas</strong> <br>
                <text>Đây là món cá chẽm nướng kiểu Maldives. Những con cá chẽm thật to, tươi và ngon nhất được làm sạch, nhồi vào trong bụng hỗn hợp các loại thảo mộc, gia vị đặc trưng của địa phương, bọc giấy bạc và nướng trên bếp than cho đến khi tỏa mùi thơm quyến rũ. Món ăn này mang đủ phong vị của địa phương và bí mật nằm ở hỗn hợp trong bụng cá. Bạn phải thưởng thức mới thấm hết được tinh hoa của Maldives.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-49.webp" alt="">
                <p>Da thì giòn, thịt vừa mềm vừa thấm vị. @pinkish_samy</p>
            </div>
            <div class="describe-container-8">
                <h3>8. Quà lưu niệm Maldives nên mua gì?</h3>
                <text>Đảo quốc Maldives giữ được vẻ đẹp hoang sơ, yên ả. Các sản phẩm lưu niệm phần lớn sử dụng các nguyên liệu đến từ tự nhiên, vừa giản dị nhưng vẫn mang đậm màu sắc địa phương. Bạn có thể tham quan và mua sắm quà lưu niệm ở các cửa hàng, sạp, quầy trên đảo, nhiều nhất có thể kể đến khu Majeedi Magi, Chandani Magu hoặc Thuhadhoo…</text> <br>
                <strong> - Đồ lưu niệm sơn mài</strong> <br>
                <text>Tại đảo Thuhadhoo, bạn sẽ tìm thấy những món đồ lưu niệm bằng sơn mài tinh xảo nhất được làm ra từ bàn tay của những nghệ nhân tài hòa trên đảo. Mọi vật dụng từ chén bát, bình hoa, tranh treo tường, hộp đựng trang sức, tượng …, tất cả đều rất phong phú, bắt mắt.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-50.webp" alt="">
                <p>Bình hoa lưu niệm tại các shop tại Maldives. @secretparadisemaldives</p>
                <strong> - Chiếu dệt</strong> <br>
                <text>Những chiếc chiếu được dệt rất tỉ mỉ bằng của người dân Maldives trước đây dùng để làm tặng phẩm đặc biệt trong các chuyến ngoại giao. Hiện tại, chiếu dệt đã trở thành một sản phẩm đặc trưng của các hòn đảo ở Maldives với chất liệu thiên nhiên và hoa văn đặc trưng. Chiếu dệt nhỏ gọn, có thể sử dụng làm chiếu ngồi hoặc dệt thành các tác phẩm nghệ thuật.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-51.webp" alt="">
                <p>Những tấm chiếu dệt thủ công giản dị đặc trưng của người dân ở Maldives. @Pinterest</p>
                <strong> - Dây thừng xơ dừa</strong> <br>
                <text>Những sợi dây thừng được dệt kì công từ xơ dừa khô vô cùng chắc chắn. Nó là đồ dùng không thể thiếu trong hoạt động đánh cá, chăn nuôi và dựng lều trại của người dân nơi này. Hiện nay, những sợi thừng đã được sáng tạo thành những chiếc ghế, võng đủ màu sắc hoặc vòng đeo lưu niệm.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-52.webp" alt="">
                <p>Những cọng thừng xơ dừa bền chắc. @Internet</p>
                <strong> - Gỗ chạm trổ</strong> <br>
                <text>Việc tìm thấy những sản phẩm bằng nhựa hoặc kim loại ở Maldives khá là khó. Điều này tạo nên một sự đặc biệt tại Maldives. Tại các resort, cửa hàng lưu niệm, nhà hàng, bạn sẽ thấy rất nhiều sản phẩm bằng gỗ vừa để trang trí, vừa để sử dụng. Bạn có thể mua các sản phẩm này làm quà lưu niệm rất đáng yêu mà giá cả lại phải chăng.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-53.webp" alt="">
                <p>Những chiếc mặt nạ bằng gỗ được chạm trổ tinh xảo. @Pinterest</p>
                <strong> - Mô hình chiếc thuyền Dhoni</strong> <br>
                <text>Cuộc sống của người dân ở Maldives chủ yếu gắn liền với biển và những chiếc thuyền. Mô hình chiếc thuyền Dhoni nhỏ xinh được làm một cách tỉ mỉ, tinh xảo sẽ là một món quà cực kì ý nghĩa mà mỗi khi nhìn thấy chúng, bạn sẽ nhớ tới những người dân và những khoảnh khắc thư giãn tuyệt vời nhất ở Maldives.</text>
                <img src="./images/maldives/cam-nang-du-lich-maldives-moi-nhat-2019-54.webp" alt="">
                <p>Mô hình thuyền cực xinh để nhớ về Maldives yêu dấu. @Internet</p>
                <text>Hãy lưu lại bí cẩm nang du lịch Maldives này và trải nghiệm Quốc đảo xinh đẹp theo cách riêng của bạn cùng với những thông tin hữu ích ở trên nhé!</text>
            </div> -->
        </div>
        <div class="describe-menu">
            <ul>
                <!-- <li>danh sachs muc luc</li> -->
            </ul>
        </div>
    </div>
    <!-- ------------------- Section describe end ------------------------------ -->

    <!-- ------------------- Section subcribe start ------------------------------ -->
    <div class="subcribe">
        <div class="subcribe-left" style="left:180px;position:relative">
            <h2>Luôn nhận thông tin mới nhất</h2>
            <p>Đăng ký nhận bản tin của chúng tôi để biết thêm các chương trình khuyến mãi về du lịch và phong cách sống cũng như các chương trình thú vị</p>
        </div>
        <div class="subcribe-right" style="left:250px">
            <div class="subcribe-input">
                <!-- <div class="subcribe-input-img">
                <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/4/41be2c783a998efde2181e7c2a1ccad5.svg" alt="">
             </div> -->
                <input type="email" placeholder="Điền email của bạn vào đây...">
            </div>

            <button><a href="dangky.php">Đăng ký</a></button>
        </div>
    </div>
    <!-- ------------------- Section subcribe end ------------------------------ -->


    <!-- --------------------Footer section start ------------------ -->

    <div class="footer">
        <div class="box-container">
            <div class="box">
                <h3>about us</h3>
                <p>We are a team of passionate travelers dedicated to providing you with unforgettable experiences and making your dream vacations a reality. We strive to offer exceptional journeys and ensure customer satisfaction.</p>
            </div>

            <div class="box">
                <h3>branch locations</h3>
                <a href="#">VietNam</a>
                <a href="#">India</a>
                <a href="#">USA</a>
                <a href="#">Japan</a>
                <a href="#">France</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">book</a>
                <a href="#">packages</a>
                <a href="#">services</a>
                <a href="#">gallery</a>
                <a href="#">review</a>
                <a href="#">contact</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">twitter</a>
                <a href="#">linkedin</a>
            </div>

        </div>
        <h1 class="credit">created by <span>Vu Trung Duc</span>| UDPM1K12</h1>
    </div>

    <!-- --------------------Footer section end ------------------ -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/index.js"></script>
</body>

</html>