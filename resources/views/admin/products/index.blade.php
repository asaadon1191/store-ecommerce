@extends('layouts.admin')
@section('title')
{{ __('admin/products.Products') }}
@endsection
@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> ا{{ __('admin/products.Products') }}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('create.products')}}">{{ __('admin/tags.DashBoard') }}</a>
                                </li>
                                <li class="breadcrumb-item active"> {{ __('admin/products.Products') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    @if ($products && $products->count() > 0)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        
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

                                    @include('admin.alerts.success')
                                    @include('admin.alerts.errors')

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <table
                                                class="table display nowrap table-striped table-bordered scroll-horizontal">
                                                <thead class="">
                                                <tr>
                                                    <th>{{ __('admin/products.Name') }} </th>
                                                    <th> {{ __('admin/products.Product Price') }}</th>
                                                    <th>{{ __('admin/products.Status') }}</th>
                                                    <th>{{ __('admin/products.Created At') }}</th>
                                                    <th>{{ __('admin/products.Controles') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                
                                                    @foreach($products as $product)
                                                        <tr>
                                                            <td>{{$product ->name}}</td>
                                                            <td> {{ $product->price}}</td>
                                                            <td> {{ $product->status()}}</td>
                                                            <td> {{ $product->created_at}}</td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    <a href="{{route('edit.tags',$product -> id)}}"
                                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ __('admin/tags.Update') }}</a>


                                                                    <a href="{{route('delete.tags',$product -> id)}}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('admin/tags.Delete') }}</a>



                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                            


                                                </tbody>
                                            </table>
                                            {{--  <div class="justify-content-center d-flex">  --}}
                                                {{ $products->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else  
                        <h1 class="text-center">
                            No Products
                        </h1>
                    @endif
                    
                </section>
            </div>
        </div>
    </div>

@endsection