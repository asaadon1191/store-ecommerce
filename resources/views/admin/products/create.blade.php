@extends('layouts.admin')

@section('title')
    Create Product
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
                            </div>

                            <!-- begin alet section-->
                                @include('admin.alerts.errors')
                                @include('admin.alerts.success')
                            <!-- end alet section-->

                            <div class="card-content collapse show">
                                <div class="card-body">









                                    <form class="form" action="{{ route('store.products') }}"
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
                                                        <textarea name="description" id="" cols="30" rows="5" class="form-control">

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