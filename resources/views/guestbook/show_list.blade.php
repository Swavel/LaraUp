@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h3>@lang('guestbook.pages.list.all_entries')</h3>
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
                                <td style="width: 200px; font-weight: 900">{{ $entry->title }}</td>
                                <td>{{ $entry->content }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <form action="{{ route('gb_store_entry') }}" method="post" class="form-group" style="margin-top: 100px">
                        {{ csrf_field() }}
                        <h3>@lang('guestbook.pages.list.new_entry')</h3>
                        <label class="">
                            <input name="title" class="form-control">
                        </label>
                        <textarea name="content" class="form-control"></textarea>

                        <input type="submit" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
