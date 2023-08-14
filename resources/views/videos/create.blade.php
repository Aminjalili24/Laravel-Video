@extends('layout')

@section('create')
<!-- // main-category -->
<x-validation-errors></x-validation-errors>
<div class="site-output">
    <div class="col-md-2 no-padding-left hidden-sm hidden-xs">
        <div class="left-sidebar">
            <div id="sidebar-stick" >
                <ul class="menu-sidebar">
                    <li><a href="01-home.html"><i class="fa fa-home"></i>خانه</a></li>
                    <li><a href="#"><i class="fa fa-bolt"></i>رندوم</a></li>
                    <li><a href="14-history.html"><i class="fa fa-clock-o"></i>تاریخچه</a></li>
                    <li><a href="11-blog.html"><i class="fa fa-file-text"></i>وبلاگ</a></li>
                    <li><a href="10-upload.html"><i class="fa fa-upload"></i>آپلود</a></li>
                </ul>
                <ul class="menu-sidebar">
                    <li><a href="#"><i class="fa fa-edit"></i>ویرایش پروفایل</a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i>خروج</a></li>
                </ul>
                <ul class="menu-sidebar">
                    <li><a href="#"><i class="fa fa-gear"></i>تنظیمات</a></li>
                    <li><a href="#"><i class="fa fa-question-circle"></i>راهنما</a></li>
                    <li><a href="#"><i class="fa fa-send-o"></i>ارسال بازخورد</a></li>
                </ul>
            </div><!-- // sidebar-stick -->
            <div class="clear"></div>
        </div><!-- // left-sidebar -->
    </div><!-- // col-md-2 -->



    <div id="all-output" class="col-md-10 upload">
        <div id="upload">
            <div class="row">
                <!-- upload -->
                <div class="col-md-8">
                    <h1 class="page-title"><span>آپلود</span> فیلم</h1>
                    <form action="{{ route('videos.store') }}" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>عنوان</label>
                                <input name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="عنوان">
                            </div>
                            <div class="col-md-6">
                                <label>مدت زمان</label>
                                <input name="length" type="text" class="form-control" value="{{ old('length') }}" placeholder=" مدت زمان">
                            </div>
                            <div class="col-md-6">
                                <label>نام یکتا</label>
                                <input name="slug" type="text" class="form-control" value="{{ old('slug') }}" placeholder="نام یکتا">
                            </div>
                            <div class="col-md-6">
                                <label>دسته بندی</label>
                                <select name="category_id"  class="form-control"  placeholder="دسنه بندی">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>آپلود فیلم</label>
                                <input name="url" id="upload_file" type="file"  value="{{ old('url') }}" class="file">
                            </div>
                            <div class="col-md-12">
                                <label>توضیحات</label>
                                <textarea name="description" class="form-control" rows="4"   placeholder="توضیح">{{ old('description') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label>تصویر</label>
                                <input name="thumbnail" id="featured_image" type="text" value="{{ old('thumbnail') }}" class="file">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" id="contact_submit" class="btn btn-dm">ذخیره</button>
                            </div>
                        </div>
                    </form>
                </div><!-- // col-md-8 -->

                <div class="col-md-4">
                    <a href="#"><img src="{{ asset('img/upload-adv.png') }}" alt=""></a>
                </div><!-- // col-md-8 -->
                <!-- // upload -->
            </div><!-- // row -->
        </div><!-- // upload -->
    </div>
</div>
@endsection

