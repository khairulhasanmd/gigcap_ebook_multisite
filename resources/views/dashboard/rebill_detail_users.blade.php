@extends('admin.layouts.app')

@section('site_title', formatTitle([__('Dashboard'), config('settings.title')]))

@section('content')

<style>
    .container{
        max-width: 95%;
    }
</style>

<div class="bg-base-1 flex-fill">
    <div class="container py-3 my-3">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 rounded-top shadow-sm overflow-hidden">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Paid At</th>
                                <th>Amount</th>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody><?php $j=1;?>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $j++ }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->amount }}</td>
                                    <td>{{ $user->user_id }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td><a target="_blank" href="https://member.vivoebook.com/admin/?entity=User&action=show&menuIndex=1&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1&referer=%252Fadmin%252F%253Fentity%253DUser%2526action%253Dlist%2526menuIndex%253D1%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&id={{ $user->user_id }}">{{ $user->email }} </a></td>
                                    <td>{{ $user->location }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('shared.sidebars.user')
