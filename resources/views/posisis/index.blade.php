@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posisi</h2>
            </div>
            <div class="pull-right">
                @can('posisi-create')
                <a class="btn btn-success" href="{{ route('posisis.create') }}"> Create New Posisi</a>
                @endcan
                @can('posisi-delete')
                <a class="btn btn-info" href="posisis/trash"> Deleted Posisi</a>
                @endcan
            </div>
            <div class="my-3 col-12 col-sm-8 col-md-5">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Keyword" name = "keyword" aria-label="Keyword" aria-describedby="basic-addon1">
                        <button class="input-group-text btn btn-primary" id="basic-addon1">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID Posisi</th>
            <th>Nama Posisi</th>
        
            <th width="280px">Action</th>
        </tr>
        @foreach ($posisis as $posisi)
        <tr>
            <td>{{ $posisi->id_posisi }}</td>
            <td>{{ $posisi->nama_posisi }}</td>
            <td>
                <form action="{{ route('posisis.destroy',$posisi->id_posisi) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('posisis.show',$posisi->id_posisi) }}">Show</a>
                    @can('posisi-edit')
                    <a class="btn btn-primary" href="{{ route('posisis.edit',$posisi->id_posisi) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('posisi-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $posisis->links() !!}
    
@endsection


