@extends('layouts.master')

@section('title')
Add Category
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <h1>Add Category</h1>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{ url('/add-category') }}" name="basic-validate" id="basic-validate" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Category Name</label>
                                <div class="controls">
                                    <input type="text" name="category_name" required="required">
                                </div>
                            </div>
                            <br/>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <input type="text" name="description" id="description" required="required">
                                </div>
                            </div>
                            <br/>
                            <div class="control-group">
                                <label class="control-label">URL</label>
                                <div class="controls">
                                    <input type="text" name="url" id="url" required="required">
                                </div>
                            </div>
                            <br>
                            <input type="submit" value="Add Category" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection