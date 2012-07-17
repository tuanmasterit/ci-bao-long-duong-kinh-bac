<div id="shopping-cart">
	<div id="title">
		<h4>
			<span>Hoàn tất</span>
		</h4>
	</div>
	<div class="content">
		<div>
		<?php 
		if($check == false)
		{
		?>
			<div class="empty">
				<p> Bạn không có sản phẩm nào trong giỏ hàng.</p>
				<p>
				Xin mời bạn
				<a class="parent" href="#">tiếp tục mua hàng</a>
				.
				</p>
			</div>
		<?php }else{?>
			<div class="empty">
				<p id="lblMessage"></p>				
			</div>
			<table class="tblcart">
				<thead>
					<tr>
						<th rowspan="1"> STT </th>
						<th rowspan="1"> Sản phẩm </th>
						<th colspan="1"> Giá (VNĐ)</th>
						<th rowspan="1"> Số lượng </th>
						<th colspan="1"> Tổng (VNĐ) </th>
						<th rowspan="1">&nbsp;  </th>
					</tr>
				</thead>
				<tbody id="contentcart">
				<?php 				
						$num = 1;
						$sum = 0;					
				?>
				<?php $i = 1; ?>
						<?php foreach ($this->cart->contents() as $items): ?>
						<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
								<tr <?php  if(($num%2)==0) echo "class='even'";?>>
                                    <td class="product-number"> <?php echo $num;?> </td>
                                    <td class="product-name">
                                        <a title="<?php echo $items['name']; ?>" href="<?php echo base_url().'welcome/product/'.$items['id'];?>"> <?php echo $items['name']; ?></a>
                                    </td>
                                    <td class="product-price"> <?php echo number_format($items['price'],0); ?> </td>                                    
                                    <td class="product-quantity">
                                        <input id="txtQuantity" class="quantity" type="text" productid="<?php echo $items['id']; ?>"  minquantity="0" onchange="CheckQuantity(this.id)" maxlength="8" value="<?php echo $items['qty']?>" name="<?php echo $i.'[qty]';?>">
                                    </td>
                                    <td class="product-price"> <?php echo number_format($items['subtotal'],0); ?> </td>
                                    <td>
                                        <input class="btnRemoveItem" id="<?php echo $items['id']; ?>" value="<?php echo base_url()?>shoppingcart/delete" type="image" style="border-width:0px;"  src="<?php echo base_url()?>application/content/images/btn_trash.gif" title="Xóa sản phẩm" name="btnRemoveItem">
                                    </td>
                                </tr>					
					<?php								
							$num++;	
							endforeach;				
					?>
				</tbody>
				<tfoot>
					<tr>
						<td class="total-price" colspan="50">
							<strong>Tổng cộng </strong>
							:
							<strong id="tonggiatri"> <?php echo number_format($this->cart->total(),0); ?> VNĐ</strong>
						</td>						
					</tr>
					<tr>
						<td colspan="50">
							<input id="btnContinue" class="button" type="submit" onclick="javascript:history.go(-1); return false;" value="Tiếp tục" name="btnContinue">
							<input id="btnUpdate"  class="button" type="submit" title="tblcart" value="Cập nhật giỏ hàng" name="<?php echo base_url();?>shoppingcart/update">
							
						</td>
					</tr>
				</tfoot>
			</table>			
			<?php }?>
		</div>
		
	</div>
	<div class="clean"> </div>
</div>
<div id="contact-form">
	<?php echo form_open('shoppingcart/sendcart',array('id'=>'formID','class'=>'stdform'));?>	
	<div class="customer-info" style="margin: 20px;">
		<label class="infomation"> Thông tin khách hàng</label>
		<?php 
		if(!isset($user))
		{
		?>
		<label>
			Họ tên
			<strong style="color: red;">*</strong>
		</label>
		<input id="txtFullName" type="text" name="txtFullName" class="validate[required]">		
		<label>
			Email
			<strong style="color: red;">*</strong>
		</label>
		<input id="txtEmail" type="text" name="txtEmail" class="validate[required,custom[email]]">		
		<label>
			Điện thoại			
		</label>
		<input id="txtDienThoai" type="text" name="txtDienThoai">		
		<label>
			Di động			
		</label>
		<input id="txtDiDong" type="text" name="txtDiDong">		
		<label>
			Địa chỉ	
			<strong style="color: red;">*</strong>		
		</label>
		<input id="txtDiachi" type="text" name="txtDiaChi" class="validate[required]">		
		<?php 
		}
		else 
		{
			
		?>
		<label>
			Họ tên
			<strong style="color: red;">*</strong>
		</label>
		<input id="txtFullName" value="<?php echo $user['user_nicename'];?>" type="text" name="txtFullName" class="validate[required]">		
		<label>
			Email
			<strong style="color: red;">*</strong>
		</label>
		<input id="txtEmail" value="<?php echo $user['user_email'];?>" type="text" name="txtEmail" class="validate[required,custom[email]]">		
		<label>
			Điện thoại			
		</label>
		<input id="txtDienThoai" type="text" name="txtDienThoai">		
		<label>
			Di động			
		</label>
		<input id="txtDiDong" type="text" name="txtDiDong">		
		<label>
			Địa chỉ	
			<strong style="color: red;">*</strong>		
		</label>
		<input id="txtDiachi" type="text" name="txtDiaChi" class="validate[required]">		
		
		<?php }?>
		<label>
		Ý kiến của bạn
		<strong style="color: red;">*</strong>
		</label>
		<textarea id="txtComments" cols="20" rows="2" name="txtComments" class="validate[required]"></textarea>
		<br>
		<div id="RadCaptcha" class="RadCaptcha RadCaptcha_Default captcha">
			<div id=SpamProtectorPanel" class="captcha">
				<?php echo $image;?>
			</div>
			<p>
				<input type="hidden" id="word" name="word" value="<?php echo $word;?>">
				<input id="captchaTextBox" type="text" title="" name="CaptchaTextBox" class="validate[required,equals[word]]">
				<label id="CaptchaTextBoxLabel" for="CaptchaTextBox">Nhập mã bảo mật</label>
			</p>
		</div>		
		<br>
		<input id="btnSubmit" class="button" type="submit" value="Gửi" name="btnSubmit">
		<input class="button reset" type="reset" value="Reset">
	</div>
	<?php echo form_close();?>
</div>
<script type="text/javascript" language="javascript">
	function CheckQuantity(id) {
		var txtQuantity = document.getElementById(id);
		var minQty = txtQuantity.getAttribute("MinQuantity");
		var curQty = txtQuantity.value;
		if (parseInt(curQty) < parseInt(minQty)) {
			alert('Số lượng sản phẩm ít nhất phải là ' + minQty);
			txtQuantity.value = minQty;
			txtQuantity.select();
		}				
	}
	jQuery(document).ready(function(){
		jQuery('.tblcart .btnRemoveItem').click(function(){
			var c = confirm('Bạn có chắc chắn?');
			if(c){
				var url = jQuery(this).attr('value');
				var id = jQuery(this).attr('id');			
				jQuery.post(url,{param:id},function(data) {
					jQuery("#lblMessage").html(data.message1);
					jQuery("#tonggiatri").html(data.message2 + " VNĐ");					
					jQuery("#cart-count").html(data.message3);
													
				},'json');			
				jQuery(this).parents('tr').fadeOut(function(){ 
					jQuery(this).remove();
				});
			}
			return false;
		});
		
	});

		jQuery('#btnUpdate').click(function(){		
				var url = jQuery(this).attr('name');
				var id = '';
				var soluong='';
				var tb = jQuery(this).attr('title');							// get target id of table								   
				//var sel = false;											//initialize to false as no selected row
				var txt = jQuery('.'+tb).find('tbody input[type=text]');		//get each checkbox in a table
				
				txt.each(function(){
					//if(jQuery(this).is(':checked')) {
						//sel = true;
						soluong += jQuery(this).attr('value')+",";
						id +=jQuery(this).attr('productid')+",";
									
					//}
				});				
				soluong = soluong.substring(0, soluong.length-1);
				id = id.substring(0, id.length-1);
				
				jQuery.post(url,{param:id, soluong:soluong},function(data) {
					jQuery("#contentcart").html(data.message1);
					jQuery("#tonggiatri").html(data.message2 + " VNĐ");
					
					
				},'json');
				//if(!sel) alert('No data selected');							//alert to no data selected
			});

		function RedirectChechOut()
		{
			window.location="<?php echo base_url()?>shoppingcart/checkout";
		}
</script>
