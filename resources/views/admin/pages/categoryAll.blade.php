@extends('admin.pages.master')

@section('content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">-All Categories</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Category List</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="10%">Status</th>
                        <th class="text-center" width="15%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

@php $i=1; @endphp
@foreach($allCategoryData as $value)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td class="center">
                            {{  $value->cat_name }}
                        </td>
                        <td class="center">
                                {!!  Str::words( strip_tags($value->cat_description),18,'.....')  !!}
                        </td>

                        <td class="center">
                            @if($value->cat_status == true)
                                <span class="label label-info">Published</span>
                            @else
                                <span class="label label-warning">Pending</span>
                            @endif
                        </td>
                        <td class="text-center" >
                            @if($value->cat_status == true)
                                <a class="btn btn-default" href="{{ route('admin.category.unpublish',$value->id) }}">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            @else
                                <a class="btn btn-success" href="{{ route('admin.category.publish',$value->id) }}">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                            @endif
                            <a class="btn btn-info" href="{{ route('admin.category.edit.form',$value->id) }}">
                                <i class="halflings-icon white edit"></i>
                            </a>

                            <button class="btn btn-danger" type="button" onclick="deleteCategory({{ $value->id }})">
                                <i class="halflings-icon white trash"></i>
                            </button>
                            <form method="post" action="{{ route('admin.category.delete',$value->id) }}" id="form-{{ $value->id }}" style="display: none">
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>

@endforeach


                    </tbody>

                </table>
            </div>
        </div><!--/span-->

    </div>
@endsection

@push('js')
{{--   ================SweetAlert==============--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        function deleteCategory(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {

                    event.preventDefault();
                    document.getElementById('form-'+id).submit();

                }
            })

        }



    </script>

@endpush