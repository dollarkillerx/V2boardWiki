@extends("layout")

@section('content')
    <section id="post" class="wrapper bg-img" data-bg="{{$blog->bg_img}}">
        <div class="inner">
            <article class="box">
                <header><h2>{{$blog->title}}</h2>
                    <p>{{$blog->created_at->format('d.m.Y')}}</p>
                </header>
                <div class="content">
                    {{!! $blog->body !!}}
                </div>
                <footer>
                    <ul class="actions">
                        @if($blog->id > 1)
                            <li><a href="/detail/{{$blog->id -1}}" class="button alt icon fa-chevron-left"><span class="label">Previous</span></a></li>
                        @endif
                        <li><a href="/detail/{{$blog->id +1}}" class="button alt icon fa-chevron-right"><span class="label">Next</span></a></li>
                    </ul>
                </footer>
            </article>
        </div>
    </section><!-- Footer -->
@endsection
