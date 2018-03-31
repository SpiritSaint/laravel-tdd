@extends('layouts.app')

@section('content')
<admin-users-list inline-template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Administration') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Users') }}</li>
                </ol>
            </nav>

            <h1 class="display-4 mt-5 mb-2">
                {{ __('Users') }}
            </h1>

            <p class="lead mb-5">
                View your registered users.
            </p>

            <table id="users" class="table table-responsive-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th class="text-center">{{ __('Administrator') }}</th>
                        <th class="text-right">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $user->name }} 
                            @if(auth()->user() == $user)
                                <small>
                                    &boxh; 
                                    {{ __('You') }}
                                </small>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($user->is_admin)
                            <i class="fa fa-check text-success">&nbsp;</i>
                            @else
                            <i class="fa fa-times text-danger">&nbsp;</i>
                            @endif
                        </td>
                        <td class="text-right">
                            <a class="btn btn-light" href="{{ route('admin.users.show', $user) }}">
                                <i class="fa fa-search">&nbsp;</i>
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th class="text-center">{{ __('Administrator') }}</th>
                        <th class="text-right">{{ __('Actions') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</admin-users-list>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#users').DataTable();
    } );
</script>
@endpush

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endpush