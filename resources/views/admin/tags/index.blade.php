@extends('layouts.admin')
@section('title')
   Tags
@endsection
@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الاقسام الرئيسية </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('create.brands')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الاقسام الرئيسية
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    @if ($tags && $tags->count() > 0)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">جميع الاقسام الرئيسية </h4>
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
                                                    <th>الاسم </th>
                                                    <th>اسم الرابط</th>
                                                    <th>الإجراءات</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                
                                                    @foreach($tags as $tag)
                                                        <tr>
                                                            <td>{{$tag ->name}}</td>
                                                            <td> {{ $tag->slug}}</td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    <a href="{{route('edit.tags',$tag -> id)}}"
                                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                    <a href="{{route('delete.tags',$tag -> id)}}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>



                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                            


                                                </tbody>
                                            </table>
                                            <div class="justify-content-center d-flex">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else  
                        <h1 class="text-center">
                            No Tags
                        </h1>
                    @endif
                    
                </section>
            </div>
        </div>
    </div>

@endsection