<div class="fixd-right">
	<ul>
		<li><a class="quick-view" href="#quick-view" ><img src="frontend/img/form.png"></a></li>
		<li><a href="http://zalo.me/0389301518"><img src="frontend/img/zalo.png"></a></li>
		<li><a target="_blank" href="https://www.facebook.com/duancongvienthienduong/"><img src="frontend/img/facebook_icon.png"></a></li>
		<li><a target="_blank" href="https://www.youtube.com/watch?v=2RDwX7ppUrg"><img src="frontend/img/youtube.png"></a></li>
		<li><a href="tel:0389301518"><img src="frontend/img/phone.png"></a></li>
		
	</ul>
</div>

<style type="text/css">
	.fixd-right{ position:fixed; right:0; bottom:30px; z-index:99; }
	.fixd-right ul li img{ width: 50px }
	.fixd-right ul li{ margin-bottom:10px }

	.form-popup{ text-align:center; }
	.form-popup .form{ padding:20px; }
	.form-popup .form input{box-shadow: 0 0 0 0.05rem rgba(0, 123, 255, .25);}
</style>


<div class="overlay-dark modal fade quick-view-modal" id="quick-view" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-ms">
        <div class="modal-content">
            <div class="close view-close">
                <span aria-hidden="true">×</span>
            </div>
            <div class="modal-body property-block summary p-3 form-popup">
                <div class="row row-cols-xl-1 row-cols-1">
                    <div class="col">
                        <div class="form">
		                    <h4 class="mb-3">LIÊN HỆ BÁO GIÁ</h4>
		                    <!-- <p>Trân trọng kính mời Quý khách tham quan MIỄN PHÍ Công viên Thiên đường vào thứ 7 và Chủ nhật hàng tuần. Toàn bộ chi phí và việc đưa đón chuyến tham quan sẽ do Công viên Thiên đường hân hạnh đài thọ.</p> -->
		                    <form class="form-icon-right" action="dangky" method="post">
		                    	@csrf
		                        <div class="row">
		                            <div class="col-12 mb-10">
		                                <div class="form-group mb-0">
		                                    <input required type="text" class="form-control" name="name" placeholder="Họ & Tên *">
		                                </div>
		                            </div>
		                            <div class="col-12 mb-10">
		                                <div class="form-group mb-0">
		                                    <input required type="text" class="form-control" name="phone" placeholder="Số điện thoại *">
		                                </div>
		                            </div>
		                            <div class="col-12 mb-10">
		                                <div class="form-group mb-0">
		                                    <input type="email" class="form-control" name="email" placeholder="Địa chỉ Email">
		                                </div>
		                            </div>
		                            <div class="col-12">
		                                <div class="form-group mb-0">
		                                    <button class="btn btn-primary w-100">GỬI NGAY</button>
		                                </div>
		                            </div>
		                        </div>
		                    </form>
		                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>