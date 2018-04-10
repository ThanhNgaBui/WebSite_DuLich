<div class="box">
	<div class="box-title">
        <div class="lb-name">Thông tin liên hệ</div>
    </div>
    <div class="thongtinlienhe">
        <div class="col-md-10 col-xs-offset-1" style="padding: 0px; width: 670px; margin: 20px 0 0 20px;">
            <div class="panel panel-primary">
                <div class="panel-heading">Thông tin liên hệ</div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" method="post" action="" id="">
                            <!-- row -->
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-3">Họ và tên <span style="color: red; margin-left: 15px; font-size: 13px;">(*)</span></div>
                                <div class="col-md-9"><input type="text" name="" value="" required class="form-control"></div>
                            </div>
                            <!-- end row -->
                            <!-- row -->
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-3">Địa chỉ <span style="color: red; margin-left: 15px; font-size: 13px;">(*)</span></div>
                                <div class="col-md-9"><input type="text" name="" value="" required class="form-control"></div>
                            </div>
                            <!-- end row -->
                            <!-- row -->
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-3">Điện thoại <span style="color: red; margin-left: 15px; font-size: 13px;">(*)</span></div>
                                <div class="col-md-9"><input type="text" name="" value="" required class="form-control"></div>
                            </div>
                            <!-- end row -->
                            <!-- row -->
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-3">Email <span style="color: red; margin-left: 15px; font-size: 13px;">(*)</span></div>
                                 <div class="col-md-9"><input type="text" name="" value="" required class="form-control"></div>
                            </div>
                            <!-- end row -->
                            <!-- row -->
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-3">Yêu cầu khác</div>
                                <div class="col-md-9">
                                    <textarea name="" required class="form-control"></textarea>
                                 </div>
                            </div>
                            <!-- end row -->
                            <!-- row -->
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <img src="image.php" id="img-captcha"/>
                                    <img src="public/frontend/image/btnnewimg.png" onclick="$('#img-captcha').attr('src', 'image.php?rand=' + Math.random())" style="margin-left: 10px;">
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- row -->
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-3">Mã xác minh <span style="color: red; margin-left: 15px; font-size: 13px;">(*)</span></div>
                                <div class="col-md-9">
                                    <input type="text" id="captcha" value="" class="form-control"/>
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- row -->
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <input type="submit" value="Process" class="btn btn-primary" id="submit">
                                    <input type="reset" value="Reset" class="btn btn-danger">
                                </div>
                            </div>
                            <!-- end row -->
                  		</form>
                    </div>
                </div>
            </div>
        </div>
        <span style="color: red; float: right; font-size: 14px; margin-bottom: 20px; font-weight: bold;">(*) : Thông tin bắt buộc</span>
</div>
<div class="box">
	<div class="box-title">
        <div class="lb-name">Liên hệ</div>
    </div>
    
</div>
<!-- end thong tin lien he -->
<script language="javascript">
    $(document).ready(function(){
        $('#submit').click(function()
        {
            // Lấy dự liệu
            var data = {
                captcha : $('#captcha').val()
            };   
            // Validate
            if ($.trim(data.captcha) == ''){
                alert('Bạn chưa nhập captcha');
            }
            else{   
                $.ajax({
                    type : 'POST',
                    dataType : 'json',
                    url : 'ajax_validate.php',
                    data : data,
                    success : function (result){
                        if (!result.hasOwnProperty('error')){
                            alert('Kết quả trả về không phù hợp');
                        }
                        else if (result['error'] == 'success'){
                            $('#mainform').submit();
                            alert('Kiểm tra thành công');
                        }
                        else{
                            if (result['content'] != ''){
                                alert(result['content']);
                            }  
                            if (result['captcha'] != ''){
                                alert(result['captcha']);
                            }
                        }
                    },
                    error : function (){
                        alert('Có lỗi xảy ra trong quá trình xử lý');
                    }
                });
            }
            return false;
        });
    });
</script>