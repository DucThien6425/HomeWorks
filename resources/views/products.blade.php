@extends('master')
@section('content')
<div class="container">
    <div class="row">
        @foreach($topproducts as $product)
            <div class="col-md-3 col-sm-6 mb-4"> {{-- Responsive cho nhiều màn hình, thêm margin-bottom --}}
                <div class="single-item border rounded shadow-sm p-3"> {{-- Thêm viền, bo góc, đổ bóng nhẹ --}}
                    <div class="single-item-header text-center"> {{-- Căn giữa hình ảnh --}}
                        @if($product->promotion_price != 0)
                            <div class="ribbon-wrapper">
                                <div class="ribbon sale">Sale</div>
                            </div>
                        @endif
                        <a href="product.html">
                            <img src="{{ asset('source/image/product/'.$product->image) }}" alt="{{ $product->name }}" 
                                class="img-fluid" style="max-height: 180px; object-fit: cover;">
                        </a>
                    </div>
                    <div class="single-item-body text-center mt-3"> {{-- Khoảng cách giữa ảnh và nội dung --}}
                        <p class="single-item-title font-weight-bold">{{ $product->name }}</p>
                        <p class="single-item-price">
                            @if($product->promotion_price != 0)
                                <span class="text-muted text-decoration-line-through">{{ number_format($product->unit_price) }}đ</span>
                                <span class="text-danger font-weight-bold">{{ number_format($product->promotion_price) }}đ</span>
                            @else
                                <span class="text-primary font-weight-bold">{{ number_format($product->unit_price) }}đ</span>
                            @endif
                        </p>
                    </div>
                    <div class="single-item-caption text-center mt-2">
                        <a class="btn btn-sm btn-outline-success" href="shopping_cart.html">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </a>
                        <a class="btn btn-sm btn-primary" href="product.html">
                            Details <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
