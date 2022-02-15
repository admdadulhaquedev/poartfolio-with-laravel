@extends('layouts.backend.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Portfolio List</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index_admin.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Portfolio List</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Portfolio Title</th>
                                        <th>Portfolio Logo</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_portfolio as $key => $portfolio)

                                        <tr>
                                            <td class="text">{{ $portfolio->title }}</td>
                                            <td>
                                                <img class="w-60" src="{{asset('uploads/portfolios/logos')}}/{{ $portfolio->logo }}" alt="">
                                            </td>

                                            <td class="text-center">
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_{{ $key }}" class="check" {{ ($portfolio->status == 1)?"checked":"" }}>
                                                    <label for="status_{{ $key }}" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" href="{{ route('portfolio.show',$portfolio->slug) }}">
                                                        <i class="fe fe-eye"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-sm bg-success-light" href="{{ route('portfolio.edit',$portfolio->slug) }}">
                                                        <i class="fe fe-pencil"></i>
                                                        Edit
                                                    </a>

                                                    <a class="btn btn-sm bg-danger-light" href="{{ route('portfolio.destroy', $portfolio->slug) }}">
                                                        <i class="fe fe-trash"></i>
                                                        Delete
                                                    </a>

                                                </div>
                                            </td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
