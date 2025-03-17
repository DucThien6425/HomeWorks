
@extends('master')
@section('content')
		
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="/pagetrangchu">Home</a>
					/<span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
          <ul class="aside-menu">
              @foreach ($type_product as $type)
                  <li><a href="#">{{ $type->name }}</a></li>
              @endforeach
          </ul>

					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
              <p class="pull-left">Tìm thấy {{ count($sp_theoloai) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                @foreach($sp_theoloai as $sp)
                  <div class="col-sm-4">
                      <div class="single-item">
                          @if($sp->promotion_price!=0)
                          <div class="ribbon-wrapper">
                              <div class="ribbon sale">i love you</div>
                          </div>
                          @endif
                          <div class="single-item-header">
                              <a href="/detail/{{ $sp->id }}"><img src="source/image/product/{{$sp->image}}" width="200" height="200" alt=""></a>
                          </div>
                          <div class="single-item-body" style="font-size: 18px">
                              <p class="single-item-title">{{$sp->name}}</p>
                              <p class="single-item-price">
                                  @if($sp->promotion_price==0)
                                  <span class="flash-sale">{{number_format($sp->unit_price)}}đồng</span>
                                  @else
                                  <span class="flash-del">{{number_format($sp->unit_price)}}đồng</span>
                                  <span class="flash-sale">{{number_format($sp->promotion_price)}}đồng</span>
                                  @endif
                              </p>
                          </div>
                          <div class="single-item-caption">
                              <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                              <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                              <div class="clearfix"></div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
						
					<!-- .beta-products-list -->
					</div>
				</div> 
				


			</div> <!-- .main-content -->
		</div>
		<div class="row">{{$sp_khac->links("pagination::bootstrap-4")}}</div>
				<div class="space40">&nbsp;</div><!-- end section with sidebar and main content --> <!-- #content -->
	</div> <!-- .container --><!-- #footer -->
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Privacy policy. (&copy;) 2014</p>
			<p class="pull-right pay-options">
				<a href="#"><img src="assets/dest/images/pay/master.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/pay.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/visa.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/paypal.jpg" alt="" /></a>
			</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->


	<!-- include js files -->
	<script src="assets/dest/js/jquery.js"></script>
	<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="assets/dest/vendors/animo/Animo.js"></script>
	<script src="assets/dest/vendors/dug/dug.js"></script>
	<script src="assets/dest/js/scripts.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="assets/dest/js/waypoints.min.js"></script>
	<script src="assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
@endsection

	