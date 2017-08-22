@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    my list
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <table>
                        @foreach($entries as $entry)
                            <tr>
                                <td>{{ $entry->title }}</td>
                                <td>{{ $entry->content }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <form action="{{ route('gb_store_entry') }}" method="post">
                        {{ csrf_field() }}
                        <input name="title">
                        <textarea name="content"></textarea>

                        <input type="submit" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
