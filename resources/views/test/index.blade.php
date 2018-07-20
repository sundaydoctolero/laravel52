@extends('layouts.app.app')


@section('main-content')
    <a href="#" ng-click="addNewFeed()">Add New RSS Feed</a>
    <table class="table table-hover" ng-table="tableParams">
        <thead>
            <th></th>
        </thead>
        <tr ng-repeat="row in $data track by row.id">
            <td data-title="'Name'" sortable="'name'">sdf</td>
            <td data-title="'Feed URL'" sortable="'url'">sdf</td>
            <td data-title="'Actions'">
                <a href="#" ng-click="editFeed(row) ">Edit</a>
                <a href="#" ng-click="confirmDelete(row.id) ">Delete</a>
            </td>
        </tr>
    </table>

@endsection

@push('scripts')



@endpush
