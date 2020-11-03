@extends('layouts.admin')

@section('title')
    Edit Shipping Methods
@endsection
    
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">{{ __('admin/shippingMethods.settings') }} </a>
                            </li>
                            <li class="breadcrumb-item"><a href="">{{ __('admin/shippingMethods.shipping methods') }}  </a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin/shippingMethods.edit shipping methods') }}
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
                                <h4 class="card-title" id="basic-layout-form">{{ __('admin/shippingMethods.edit shipping methods') }} </h4>
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









                                    <form class="form" action="{{ route('update.shipping.Methods',$data->id) }}"
                                          method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')


                                        

                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i>{{ __('admin/shippingMethods.shipping methods detailes') }}  </h4>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ __('admin/shippingMethods.shipping method name') }}  </label>
                                                            <input type="text" value="{{ $data->value }}" id="name"
                                                                class="form-control"
                                                                name="value">
                                                            @error("value")
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{ __('admin/shippingMethods.shipping method cost') }} </label>
                                                            <input type="number" id="pac-input"
                                                                   class="form-control"
                                                                   name="plain_value"
                                                                   value="{{ $data->plain_value }}"
                                                            >
    
                                                            @error('plain_value')
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{ __('admin/shippingMethods.back') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{ __('admin/shippingMethods.update') }}
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