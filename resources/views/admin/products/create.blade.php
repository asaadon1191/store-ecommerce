@extends('layouts.admin')

@section('title')
    Create Product
@endsection
@section('style')
    <style>
        .form
        {
            margin-top: 20px;
            box-sizing: border-box;
        }

        .form .header
        {
            background-color: #2d2d2d;
            font-size: 25px;
            font-weight: bold;
            
            text-align: center;
            cursor: pointer;

        }

        .general-tab
        {
            
            
        }
        .form-price
        {
            display:none
        }

        .active 
        {
            background-color: #080;
            height: 100%;
            width: 100%;
            color: #fff;
        }
    </style>
@endsection
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{ __('admin/products.Create new product') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> {{ __('admin/products.Create new product') }} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="form">
                                        <div class="header" class="general">
                                            <div class="row">
                                                <div onclick="swap(this);" data-tab="general" class="general-tab col-md-3">
                                                    General
                                                </div>
    
                                                <div onclick="swap(this);" data-tab="price" class="price-tab col-md-3">
                                                    Prices
                                                </div>
    
                                                <div onclick="swap(this);" data-tab="inventory" class="inventory-tab col-md-3">
                                                    Inventories
                                                </div>

                                                <div onclick="swap(this);" data-tab="inventory" class="image-tab col-md-3">
                                                    Images
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- begin alet section-->
                                    @include('admin.alerts.errors')
                                    @include('admin.alerts.success')
                                <!-- end alet section-->

                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        {{--  GENERAL FORM  --}}
                                            <form class="form-general" action="{{ route('store.products') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf 

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="ft-home"></i> {{ __('admin/products.Product Detailes') }}</h4>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{ __('admin/products.Name') }} </label>
                                                                <input type="text" id="name"
                                                                    class="form-control"
                                                                    name="name">
                                                                @error("name")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{ __('admin/products.Slug') }} </label>
                                                                <input type="text" id="name"
                                                                    class="form-control"
                                                                    name="slug">
                                                                @error("slug")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    {{ __('admin/products.Select Category') }}
                                                                </label>
                                                                <select name="categories[]" class="form-control" multiple>
                                                                    <optgroup label="{{ __('admin/products.Select Category') }}">
                                                                        @if ($categories && $categories->count() > 0)
                                                                            @foreach ($categories as $category)
                                                                                <option value="{{ $category->id }}">
                                                                                    {{ $category->name }}
                                                                                </option>
                                                                            @endforeach 
                                                                        @endif
                                                                </select>
                                                                @error("categories")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    {{ __('admin/products.Select Category') }}
                                                                </label>
                                                                <select name="tags[]" class="form-control" multiple>
                                                                    <optgroup label="{{ __('admin/products.Select Tag') }}">
                                                                        @if ($tags && $tags->count() > 0)
                                                                            @foreach ($tags as $tag)
                                                                                <option value="{{ $tag->id }}">
                                                                                    {{ $tag->name }}
                                                                                </option>
                                                                            @endforeach 
                                                                        @endif
                                                                </select>
                                                                @error("tags")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    {{ __('admin/products.Select Brand') }}
                                                                </label>
                                                                <select name="brand_id" class="form-control">
                                                                @if ($brands && $brands->count() > 0)
                                                                    @foreach ($brands as $brand)
                                                                        <option value="{{ $brand->id }}">
                                                                            {{ $brand->name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                                </select>
                                                                @error("brand_id")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label> {{ __('admin/products.Describtion') }} </label>
                                                                <textarea name="description" id="" cols="30" rows="5" class="form-control" contenteditable="true">

                                                                </textarea>
                                                                @error("description")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ __('admin/products.Short Describtion') }} </label>
                                                                <textarea name="short_description" id="" cols="30" rows="5" class="form-control">

                                                                </textarea>
                                                                @error("short_description")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mt-1">
                                                                <input type="checkbox"  value="1" 
                                                                    name="is_active"
                                                                    id="switcheryColor4"
                                                                    class="switchery" data-color="success"
                                                                
                                                                    checked
                                                                    />
                                                                <label for="switcheryColor4"
                                                                    class="card-title ml-1">{{ __('admin/products.Product Status') }} </label>

                                                                    @error("is_active")
                                                                            <span class="text-danger"> {{ $message }}</span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-actions">
                                                        <button type="button" class="btn btn-warning mr-1"
                                                                onclick="history.back();">
                                                            <i class="ft-x"></i> {{ __('admin/profile.Back') }}
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i> {{ __('admin/profile.Save') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        {{--  PRICES FOEM  --}}
                                            <form class="form-price" action="{{ route('store_prices.products') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf 

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="ft-home"></i> {{ __('admin/products.Product Price') }}</h4>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{ __('admin/products.Product Price') }} </label>
                                                                <input type="number" id="name"
                                                                    class="form-control"
                                                                    name="price">
                                                                @error("price")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{ __('admin/products.Special Price') }} </label>
                                                                <input type="number" id="name"
                                                                    class="form-control"
                                                                    name="special_price">
                                                                @error("special_price")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    {{ __('admin/products.Special Price Type') }}
                                                                </label>
                                                                <select name="special_price_type" class="form-control">
                                                                    <optgroup label="{{ __('admin/products.Select Spicial Price Type') }}">
                                                                        <option value="">Select Type</option>
                                                                       <option value="fixed">{{ __('admin/products.Fixed Price') }}</option>
                                                                       <option value="percent">{{ __('admin/products.Percent Price') }}</option>
                                                                </select>
                                                                @error("special_price_type")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    {{ __('admin/products.Select Spicial Price Start Date') }}
                                                                </label>
                                                                <input type="date" name="special_price_start">
                                                                @error("special_price_start")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    {{ __('admin/products.Select Spicial Price End Date') }}
                                                                </label>
                                                               <input type="date" name="special_price_end">
                                                                @error("special_price_end")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-actions">
                                                        <button type="button" class="btn btn-warning mr-1"
                                                                onclick="history.back();">
                                                            <i class="ft-x"></i> {{ __('admin/profile.Back') }}
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i> {{ __('admin/profile.Save') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        {{--  INVENTORY FORM  --}}
                                            <form class="form-inv" action="{{ route('store_inv.products') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf 

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="ft-home"></i> {{ __('admin/products.Product Inv') }}</h4>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> {{ __('admin/products.Sku Product') }} </label>
                                                                <input type="text" id="sku"
                                                                    class="form-control"
                                                                    name="sku">
                                                                @error("sku")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    {{ __('admin/products.Manage Stock') }}
                                                                </label>
                                                                <select name="manage_stock" class="form-control" id="manageStock">
                                                                    <option value="" selected>
                                                                        Select {{ __('admin/products.Manage Stock') }}
                                                                    </option>
                                                                    <option value="1">
                                                                        {{ __('admin/products.Follow Quantity') }}
                                                                    </option>
                                                                    <option value="0">
                                                                        {{ __('admin/products.UnFollow Quantity') }}
                                                                    </option>
                                                                </select>
                                                                @error("manage_stock")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" style="display: none" id="qty_dev">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    {{ __('admin/products.Product Qty') }}
                                                                </label>
                                                                <input type="number" id="qty" name="qty" class="form-control">
                                                                @error("qty")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    {{ __('admin/products.Product Stock') }}
                                                                </label>
                                                                <select name="in_stock" class="form-control">
                                                                   <option value="" selected>
                                                                        {{ __('admin/products.Product Stock') }}
                                                                   </option>
                                                                   <option value="1">
                                                                        {{ __('admin/products.Product Stock Avliable') }}  
                                                                   </option>
                                                                   <option value="0">
                                                                        {{ __('admin/products.Product Stock UnAvliable') }}
                                                                   </option>
                                                                </select>
                                                                @error("in_stock")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                
                                                    <div class="form-actions">
                                                        <button type="button" class="btn btn-warning mr-1"
                                                                onclick="history.back();">
                                                            <i class="ft-x"></i> {{ __('admin/profile.Back') }}
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i> {{ __('admin/profile.Save') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        {{--  IMAGES FORM  --}}
                                            <form class="form-image" action="{{ route('store_image.products') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf 

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="ft-home"></i> صور المنتج </h4>
                                                    <div class="form-group">
                                                        <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                            <div class="dz-message">يمكنك رفع اكثر من صوره هنا</div>
                                                        </div>
                                                        <br><br>
                                                    </div>
                                                    
                                                
                                                    <div class="form-actions">
                                                        <button type="button" class="btn btn-warning mr-1"
                                                                onclick="history.back();">
                                                            <i class="ft-x"></i> {{ __('admin/profile.Back') }}
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i> {{ __('admin/profile.Save') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
       $(document).ready(function()
       {
            $(".general-tab").click(function()
            {
                $(".form-general").show();
                $(".form-price").hide();
                $(".form-image").hide();
                $(".form-inv").hide();
                $(".general-tab").addClass("active");
                $(".price-tab").removeClass("active");
                $(".inventory-tab").removeClass("active");
            });
       });

        $(".price-tab").click(function()
        {
            $(".form-general").hide();
            $(".form-inv").hide();
            $(".form-image").hide();
            $(".form-price").show();
            $(".price-tab").addClass("active");
            $(".general-tab").removeClass("active");
            $(".inventory-tab").removeClass("active");
            $(".iamge-tab").removeClass("active");
        });

        $(".inventory-tab").click(function()
        {
            $(".form-inv").show();
            $(".form-general").hide();
            $(".form-price").hide();
            $(".form-image").hide();
            $(".inventory-tab").addClass("active");
            $(".general-tab").removeClass("active");
            $(".price-tab").removeClass("active");
            $(".image-tab").removeClass("active");
        });

        $(".image-tab").click(function()
        {
            $(".form-image").show();
            $(".form-general").hide();
            $(".form-price").hide();
            $(".form-inv").hide();
            $(".image-tab").addClass("active");
            $(".general-tab").removeClass("active");
            $(".price-tab").removeClass("active");
            $(".inventory-tab").removeClass("active");
        });

        $(document).on('change','#manageStock',function()
        {

            if($(this).val() == 1)
            {
                $('#qty_dev').show();
            }else
            {
                $('#qty_dev').hide();
            }
        });

       
        var uploadedDocumentMap = {}
        Dropzone.options.dpzMultipleFiles = {
            paramName: "ali", // The name that will be used to transfer the file
            //autoProcessQueue: false,
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
            dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
            dictCancelUpload: "الغاء الرفع ",
            dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
            dictRemoveFile: "حذف الصوره",
            dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
            headers: {
                'X-CSRF-TOKEN':
                    "{{ csrf_token() }}"
            }

            ,
            url: "{{ route('store_image.products') }}", // Set the url
            success:
                    function (file, response) {
                        $('form').append('<input type="file" name="document[]" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    }
            ,
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('.form-image').find('input[name="document[]"][value="' + name + '"]').remove()
            }
            ,
            // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
            init: function () {

                    @if(isset($event) && $event->document)
                var files =
                {!! json_encode($event->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('.form-image').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>
@endsection