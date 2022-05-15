@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<a href="/groups/create" class="card-link btn-primary">Tambah group</a>
@foreach ($groups as $group)

  <div class="card my-3 " style="width: 15rem;">
    <div class="card-body ">
      <a class="text-decoration-none" href="/groups/{{ $group['id'] }}">
        <h5 class="card-title">{{ $group['name'] }}</h5>
        <p class="card-text">{{ $group['description'] }}</p>
          <hr>
            <a href="" class="card-link btn-primary">Tambah anggota teman</a>
              @foreach ($group->friends as $friend)
              <li>{{$friend->nama}}</li>
              @endforeach

          <hr>
        <a href="/groups/{{ $group['id'] }}/edit" class="card-link btn-warning">Edit group</a>
        <form action="/groups/{{$group['id']}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="card-link btn-danger">Delete group</button>
        </form>
      </div>
    </div>
  </div>

    
@endforeach
<div>
  {{ $groups->links() }}
</div>
@endsection