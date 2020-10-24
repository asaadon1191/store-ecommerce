@extends('layouts.admin')

@section('title')
    Update Tag {{ $tag->name }}
@endsection
    
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">{{ __('admin/categories.Edit Category') }}</a>
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
                                <h4 class="card-title" id="basic-layout-form"> {{ __('admin/categories.Edit Category') }} </h4>
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









                                    <form class="form" action="{{ route('update.tags',$tag->id) }}"
                                          method="post">
                                        @csrf 
                                        @method('PUT')

                                        
                                        <input type="hidden" value="{{ $tag->TAG->id }}" name="id">
                                       

                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> {{ __('admin/categories.Category Detailes') }}</h4>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{ __('admin/categories.Category Name') }} </label>
                                                        <input type="text" id="name"
                                                            class="form-control"
                                                            name="name" value="{{ $tag->name }}">
                                                        @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Tag Slug </label>
                                                        <input type="test" id="slug"
                                                            class="form-control"
                                                            name="slug" value="{{ $tag->slug }}">
                                                        @error("slug")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </di
                                                </div>
                                            </div>
                                           
                                            <div class="form-actions text-left">
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