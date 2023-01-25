@extends("template.master")
@section("tittle") Blog Create @stop
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="">
                    <form action="{{ route('blog.index') }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search Post" value="{{ request('keyword') }}" name="keyword">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>


                <table class="table table-bordered align-middle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Post</th>
                        <th>Controls</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td class="small mb-0">
                                <span class="fw-bold">{{ Str::words($blog->title,7) }}</span>
                                <br>
                               <span class="text-black-50"> {{ Str::words($blog->description,7) }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                <form action="{{ route('blog.destroy',$blog->id) }}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-danger">Del</button>
                                </form>
                            </td>
                            <td class="small">{{ $blog->created_at->format("d/m/y") }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="">
{{--                    {{ $blogs->appends(request()->query())->links() }}--}}
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

