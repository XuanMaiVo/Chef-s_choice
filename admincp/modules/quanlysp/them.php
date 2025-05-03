<p>Thêm sản phẩm</p>
 <table style="border: 1px solid black; width: 50%; border-collapse: collapse;">
<form method="POST" action="/chef-choices/admincp/modules/quanlysp/xuly.php" enctype="multipart/form-data"><!--Đường dẫn trực tiếp-->
  <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" name="tensanpham" ></td>
    </tr>

    <tr>
      <td >Mã sp</td>
      <td><input type="text" name="masp" ></td>
    </tr>

    <tr>
      <td >Giá sp</td>
      <td><input type="text" name="giasp" ></td>
    </tr>

    <tr>
      <td >Số lượng</td>
      <td><input type="text" name="soluong" ></td>
    </tr>

    <tr>
      <td >Hình ảnh</td>
      <td><input type="file" name="hinhanh" ></td>
    </tr>

    <tr>
      <td>Tóm tắt</td>
      <td><textarea rows="10" width="100%" name="tomtat" style="resize:none"></textarea></td>
    </tr>

    <tr>
      <td>Nội dung</td>
      <td><textarea rows="10" name="noidung"></textarea></td>
    </tr>

    <tr>
      <td >Tình trạng</td>
      <td>
        <select name="tinhtrang">
          <option value="1">Kích hoạt</option>
          <option value="0">Ẩn</option>
        </select>
      </td>
    </tr>

    <tr>
      <td></td>
      <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"><!--nút--></td>
    </tr>
  </form>
  </table>