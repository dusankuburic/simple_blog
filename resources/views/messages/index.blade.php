@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">

                <div class="card-body">
                        @if(count($contact_messages) > 0)
                            <table class="table table-striped">
                                <thead>
                                    <th>Email</th>
                                    <th>Content</th>
                                    <th>Created At</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($contact_messages as $message)
                                        <tr>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->message}}</td>  <!-- poor naming BAD BAD BAD CODE. change migration, message => content -->
                                            <td>{{$message->created_at}}</td>
                                            <td>
                                                {!! Form::open(['action' => ['ContactMessagesController@destroy', $message->id], 'method' => 'POST']) !!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            @else
                            <p>There is no messages</p>
                        @endif
                    <div class="float-right">
                            {{$contact_messages->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection