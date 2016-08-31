@extends('layouts.default')
@section('title')
    Accounts
@stop
@section('breadcrumb')
    <li>Settings</li>
    <li class="active">Accounts</li>
@stop
@section('content')
    <div class="col-md-12">
        <div class="white-box">
            <a href="{{ url('/accounts/new') }}"><button class="btn btn-success waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-plus"></i></span>New</button></a>
            <br /><br />
            <table class="table dataTable" id="accounts_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Last login</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="label user_role{{$user->role_id }}">{{ $user->role->name }}</span></td>
                            <td>
                                @if($user->updated_at != $user->created_at)
                                    {{ $user->updated_at->format('j M Y - H:i') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ url('/accounts/edit/'.$user->id) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                @if($user->id != Auth::id())
                                    <a href="javascript:deleteUserAlert({{ $user->id }})"><i class="fa fa-close text-danger"></i></a>
                                    <a id="deleteUserLink-{{ $user->id }}" href="{{ url('/accounts/delete/'.$user->id) }}" style="display:none;"></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{ url('plugins/bower_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ url('plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
    <script src="{{ url('plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#accounts_table').DataTable();
            $('#accounts_table thead th:last-child').addClass('clear_after');
        });

        /*
         * This function generate a Are you sure ? popup and redirect the Ok button to the user deleting url
         */
        function deleteUserAlert(userId){

            swal({
                title: "Are you sure?",
                text: "This user will be permanently deleted!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {
                    document.getElementById('deleteUserLink-'+userId).click();

                }
            });
        }
    </script>
@stop

