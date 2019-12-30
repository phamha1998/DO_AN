@extends('backend.master.master')

@section('content')
@section('titile','Thêm sản phẩm')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm sản phẩm</div>
                    <div class="panel-body">
                        <form  method="post" enctype="multipart/form-data">@csrf
                            <form action="" method="post"></form>
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category" class="form-control">
                                                <option value='1' selected>Nam</option>
                                                <option value='3'>---|Áo khoác nam</option>
                                                <option value='2'>Nữ</option>
                                                <option value='4'>---|Áo khoác nữ</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input  type="text" name="product_code" class="form-control">
                                            {{ showErrors($errors, 'product_code') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input  type="text" name="product_name" class="form-control">
                                            {{ showErrors($errors, 'product_name') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input  type="number" name="product_price" class="form-control">
                                            {{ showErrors($errors, 'product_price') }}
                                        </div>

                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select  name="product_state" class="form-control">
                                                <option value="1">Còn hàng</option>
                                                <option value="0">Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            <input id="img" type="file" name="product_img" class="form-control hidden"
                                                onchange="changeImg(this)">
                                                {{ showErrors($errors,'product_img') }}
                                            <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/import-img.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Thông tin</label>
                                    <textarea  name="info" style="width: 100%;height: 100px;"></textarea>
                                </div>

                            </div>
                            <div class="col-xs-4">

                                <div class="panel panel-default">
                                    <div class="panel-body tabs">
                                        <label>Các thuộc Tính <a href="/admin/product/detail-attr"><span class="glyphicon glyphicon-cog"></span>
                                                Tuỳ chọn</a></label>
                                                {{ showErrors($errors,'attr_name') }}
                                                {{ showErrors($errors,'value_name') }}
                                        <ul class="nav nav-tabs">
                                            
                                            @php
                                                $i=0;
                                            @endphp
                                            @foreach ($attrs as $attr)
                                            <li @if($i==0) class='active' @endif><a href="#tab{{ $attr->id }}" data-toggle="tab">{{ $attr->name }}</a></li>
                                                @php
                                                    $i=1;
                                                @endphp
                                            @endforeach
                                            <li><a href="#tab-add" data-toggle="tab">+</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            @foreach ($attrs as $attr)
                                            <div   class="tab-pane fade @if($i==1) active @endif in" id="tab{{ $attr->id }}">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            @foreach ($attr->values as $item)
                                                            <th>{{  $item->value }}</th>
                                                            @endforeach
                                                           
                                                            

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            @foreach ($attr->values as $item)
                                                            <td> <input class="form-check-input" type="checkbox" name="attr[17][60]"
                                                                value="60"> </td>
                                                            @endforeach
                                                          
                                                           

                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <hr>
                                                <div class="form-group">
                                                    <form action="/admin/product/add-value" method="post">@csrf
                                                    <label for="">Thêm biến thể cho thuộc tính</label>
                                                    <input type="hidden" name="id_pro" value="17">
                                                    <input name="value_name" type="text" class="form-control"
                                                        aria-describedby="helpId" placeholder="">
                                                    <div> <button name="add_val" type="submit">Thêm</button></div>
                                                </form>
                                                </div>
                                            </div>
                                            @php
                                            $i=2;
                                            @endphp

                                            @endforeach
                                           


                                            <div class="tab-pane fade" id="tab-add">
                                                <form action="/admin/product/add-attr" method="post">@csrf

                                                <div class="form-group">
                                                    <label for="">Tên thuộc tính mới</label>
                                                    <input type="text" class="form-control" name="attr_name"
                                                        aria-describedby="helpId" placeholder="">
                                                </div>

                                                <button type="submit" name="add_pro" class="btn btn-success"> <span
                                                        class="glyphicon glyphicon-plus"></span>
                                                    Thêm thuộc tính</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <p></p>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor"  name="description" style="width: 100%;height: 100px;"></textarea>
                                    </div>
                                    <button class="btn btn-success" name="add-product" type="submit">Thêm sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        <div class="clearfix"></div>
                    </form>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>
    
    <!--end main-->
    @endsection
    @section('script')
    @parent

    @endsection
