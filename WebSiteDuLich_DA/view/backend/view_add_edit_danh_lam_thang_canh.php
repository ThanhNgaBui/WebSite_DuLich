<div class="col-md-10 col-xs-offset-1" style="width: 1020px; margin-top: 40px; margin-left: -9px;">
	<div class="panel panel-primary">
		<div class="panel-heading">Thêm, sửa danh lam thắng cảnh</div>
		<div class="panel-body">
			<form enctype="multipart/form-data" method="post" action="<?php echo $form_action; ?>">
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-3">Tiêu đề</div>
					<div class="col-md-9"><input type="text" name="ten" value="<?php echo isset($arr["ten"])?$arr["ten"]:""; ?>" required class="form-control"></div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-3">Nội dung</div>
					<div class="col-md-9">
						<textarea name="noi_dung"><?php echo isset($arr["noi_dung"])?$arr["noi_dung"]:""; ?></textarea>
						<script type="text/javascript">CKEDITOR.replace("noi_dung")</script>
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-3">Chi tiết</div>
					<div class="col-md-9">
						<textarea name="chi_tiet"><?php echo isset($arr["chi_tiet"])?$arr["chi_tiet"]:""; ?></textarea>
						<script type="text/javascript">CKEDITOR.replace("chi_tiet")</script>
					</div>
				</div>
				<!-- end row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-3">Ảnh</div>
					<div class="col-md-9">
					<input type="file" name="anh">
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<?php
					$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
					$anh = $this->model->fetch("select anh from danh_lam_thang_canh where pk_id='$id'");
				?>
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-3">Ảnh đã chọn</div>
					<div class="col-md-9">
						<img src="public/frontend/upload/danh_lam_thang_canh/<?php echo $anh[0]["anh"];?>" style="width: 100px;">
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-3"></div>
					<div class="col-md-9">
					<input type="checkbox" name="hot" <?php echo isset($arr["hot"])&&$arr["hot"]==1?"checked":""; ?> id="hot"><label for="hot">&nbsp;Tin nổi bật</label>
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-3"></div>
					<div class="col-md-9">
						<input type="submit" value="Process" class="btn btn-primary">
						<input type="reset" value="Reset" class="btn btn-danger">
					</div>
				</div>
				<!-- end row -->
			</form>
		</div>
	</div>
</div>