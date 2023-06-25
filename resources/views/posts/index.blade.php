@extends('layouts.app');
@section('content')

<a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">ADD POST</a>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">IMAGE</th>
        <th scope="col">TITLE</th>
        <th scope="col">CONTENT</th>
        <th scope="col">ACTION</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($posts as $post)
        <tr>
            <td class="text-center">
                <img src="{{asset('storage/posts/'.$post->image)}}" class="rounded" style="width: 150px">
            </td>
            <td>{{ $post->title }}</td>
            <td>{!! $post->content !!}</td>
            <td class="text-center">
                <form onsubmit="return confirm('Are you sure want to delete this post?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                </form>
            </td>
        </tr>
      @empty
          <div class="alert alert-danger">
              No Post Data Available
          </div>
      @endforelse
    </tbody>
</table>  
{{ $posts->links() }}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'SUCCESS!'); 
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'ERROR!'); 
        
    @endif
</script>
@endsection