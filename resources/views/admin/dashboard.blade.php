@extends('layouts.master')

@section('title')
Admin's Dashboard
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Email Statistics</h4>
                        <p class="card-category">Latest Sales Performance</p>
                    </div>
                    <div class="card-body ">
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Incoming
                            <i class="fa fa-circle text-danger"></i> Outcoming
                            <i class="fa fa-circle text-warning"></i> Pending
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Sales updated 2 days ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Employee performance</h4>
                        <p class="card-category">Monthly</p>
                    </div>
                    <div class="card-body ">
                        <div id="chartHours" class="ct-chart"></div>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Increased
                            <i class="fa fa-circle text-danger"></i> Dropped
                            <i class="fa fa-circle text-warning"></i> Missing in action
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">2019 Sales</h4>
                        <p class="card-category">All products including Taxes</p>
                    </div>
                    <div class="card-body ">
                        <div id="chartActivity" class="ct-chart"></div>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Increased
                            <i class="fa fa-circle text-danger"></i> Dropped
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-check"></i> Data information certified
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card  card-tasks">
                    <div class="card-header ">
                        <h4 class="card-title">Tasks</h4>
                    </div>
                    <div class="card-body ">
                        <div class="table-full-width">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>Sign contract with new vendor</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Edit Task"
                                                class="btn btn-info btn-simple btn-link">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove"
                                                class="btn btn-danger btn-simple btn-link">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>Meeting with stakeholders</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Edit Task"
                                                class="btn btn-info btn-simple btn-link">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove"
                                                class="btn btn-danger btn-simple btn-link">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection