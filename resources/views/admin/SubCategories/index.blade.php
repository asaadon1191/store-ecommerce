@extends('layouts.admin')
@section('title')
   sub Categories
@endsection

@section('content')
    
<div class="container">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> Sub Categories </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('Categories') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> <a href="{{ route('Categories') }}">
                                    Categories
                                </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">  </h4>
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
                                    @if($mainCategories && $mainCategories->count() > 0)

                                        <div class="card-body card-dashboard">
                                            <table
                                                class="table display nowrap table-striped table-bordered ">
                                                <thead>
                                                <tr>
                                                    <th> name</th>
                                                    <th> Category</th>
                                                    <th>slug</th>
                                                    <th>status</th>
                                                    <th>photo</th>
                                                    <th>الإجراءات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($mainCategories)
                                                        @foreach ($mainCategories as $row)
                                                            <tr>
                                                                <td> {{ $row->name }}</td>
                                                                <td> {{ $row->CATEGORY->name }}</td>
                                                                <td> {{ $row->slug }}</td>
                                                                <td>
                                                                    {{ $row->Status() }}
                                                                </td>
                                                                <td>
                                                                    <img src="{{ asset('assets/images/') }} " style="height: 100px; width:100px;">
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic example">
                                                                        <a href="{{ route('edit.SubCategory',$row->id) }}"
                                                                        class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>

                                                                        <a href="{{ route('delete.SubCategory',$row->id) }}"
                                                                        class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حزف</a>
                                                                    
                                                                        

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                    
                                                    {{ $mainCategories->links() }}
                                                </tbody>
                                            </table>
                                            <div class="justify-content-center d-flex">

                                            </div>
                                        </div>

                                    @else
                                    <h2 class="text-center">
                                        No Sub Categories
                                    </h2>
                                       

                                    @endif    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection