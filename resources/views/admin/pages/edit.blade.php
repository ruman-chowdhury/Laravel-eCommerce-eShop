@extends('admin.pages.master')

@section('content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Forms</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Category Elements</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                </div>
            </div>
            @include('message.error')
            <div class="box-content">
                <form class="form-horizontal" method="post" action="{{ route('admin.category.update',$singleData->id) }}">
                    {{ csrf_field() }}

                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="cat-name">Category Name:</label>
                            <div class="controls">
                                <input type="text" name="categoryName" id="cat-name" value="{{ $singleData->cat_name }}">
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Category Description:</label>
                            <div class="controls">
                                <textarea class="cleditor" name="categoryDescription" id="textarea2" rows="3">
                                    {{ $singleData->cat_description }}
                                </textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="cat-status">Publish:</label>
                            <div class="controls">
                                <input type="checkbox" name="categoryStatus" id="cat-status" value="1" {{ $singleData->cat_status == true?'checked':'' }}>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->


@endsection