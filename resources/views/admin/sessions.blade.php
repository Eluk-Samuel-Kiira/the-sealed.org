@extends('admin.layout')
@section('title','Dashboard | Sessions')
@section('content')

    <!-- Info contents -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="badge bg-sm">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Current Sessions
                    </span>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">   
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>IP address</th>
                                        <th>Country</th>
                                        <th>Code</th>
                                        <th>Region</th>
                                        <th>City</th>
                                        <th>ZipCode</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if ($currentUserInfo)
                                        <tr>
                                            <td>{{ $currentUserInfo->ip }}</td>
                                            <td>{{ $currentUserInfo->countryName }}</td>
                                            <td>{{ $currentUserInfo->countryCode }}</td>
                                            <td>{{ $currentUserInfo->regionCode }}</td>
                                            <td>{{ $currentUserInfo->cityName }}</td>
                                            <td>{{ $currentUserInfo->zipCode }}</td>
                                            <td>{{ $currentUserInfo->latitude}}</td>
                                            <td>{{ $currentUserInfo->longitude}}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end contents -->
    
@endsection
