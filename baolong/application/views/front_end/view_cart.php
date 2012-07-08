<div id="shopping-cart">
	<div id="title">
		<h4>
			<span>Giỏ hàng</span>
		</h4>
	</div>
	<div class="content">
		<div>
			<table>
				<thead>
					<tr>
						<th rowspan="1"> STT </th>
						<th rowspan="1"> Sản phẩm </th>
						<th colspan="1"> Giá </th>
						<th rowspan="1"> Số lượng </th>
						<th colspan="1"> Tổng (VNĐ) </th>
						<th rowspan="1"> &nbsp; </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="product-number"> 1 </td>
						<td class="product-name">
							<a title="Nước uống sâm quy" href="/vi/san-pham/thuc-pham-chuc-nang/p-472/nuoc-uong-sam-quy.aspx"> Nước uống sâm quy</a>
						</td>
						<td class="product-price"> 20,000 </td>
						<td class="product-quantity">
							<input id="txtQuantity" class="quantity" type="text" productid="472" minquantity="0" onchange="CheckQuantity(this.id)" maxlength="8" value="2" name="txtQuantity">
						</td>
						<td class="product-price"> 20,000 </td>
						<td>
							<input id="btnRemoveItem" type="image" style="border-width:0px;" onclick="return confirm('Bạn có chắc chắn?');" src="<?php echo base_url()?>application/content/images/btn_trash.gif" title="Xóa sản phẩm" name="btnRemoveItem">
						</td>
					</tr>
					<tr class="even">
						<td class="product-number"> 2 </td>
						<td class="product-name">
							<a title="Nước uống sâm quy" href="/vi/san-pham/thuc-pham-chuc-nang/p-472/nuoc-uong-sam-quy.aspx"> Nước uống sâm quy</a>
						</td>
						<td class="product-price"> 20,000 </td>
						<td class="product-quantity">
							<input id="txtQuantity" class="quantity" type="text" productid="472" minquantity="0" onchange="CheckQuantity(this.id)" maxlength="8" value="2" name="txtQuantity">
						</td>
						<td class="product-price"> 20,000 </td>
						<td>
							<input id="btnRemoveItem" type="image" style="border-width:0px;" onclick="return confirm('Bạn có chắc chắn?');" src="<?php echo base_url()?>application/content/images/btn_trash.gif" title="Xóa sản phẩm" name="btnRemoveItem">
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td class="total-price" colspan="50">
							<strong>Tổng cộng </strong>
							:
							<strong> 60,000 VNĐ</strong>
						</td>						
					</tr>
					<tr>
						<td colspan="50">
							<input id="ctl00_ContentPlaceHolder1_ctl00_ctl00_btnContinue" class="button" type="submit" onclick="javascript:history.go(-1); return false;" value="Tiếp tục" name="ctl00$ContentPlaceHolder1$ctl00$ctl00$btnContinue">
							<input id="ctl00_ContentPlaceHolder1_ctl00_ctl00_btnUpdate" class="button" type="submit" value="Cập nhật giỏ hàng" name="ctl00$ContentPlaceHolder1$ctl00$ctl00$btnUpdate">
							<input id="ctl00_ContentPlaceHolder1_ctl00_ctl00_btnCheckOut" class="button" type="submit" value="Thanh toán" name="ctl00$ContentPlaceHolder1$ctl00$ctl00$btnCheckOut">
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<div class="clean"> </div>
</div>