@extends("layout")

@section("form")
    <h2>Edit Blog</h2>

    <form action="/detail/{{$id}}/update" method="post">
        @csrf
        <div class="field half first">
            <label for="name">Title</label>
            <input name="title" type="text" placeholder="Title" value="{{$blog->title}}"></div>
        @error('title')
        <span style="color: red">{{$errors->first('title')}}</span>
        @enderror
        <div class="field">
            <label for="email">简介</label>
            <input name="excerpt" type="text" value="{{$blog->excerpt}}"></div>
        @error('excerpt')
        <span style="color: red">{{$errors->first('excerpt')}}</span>
        @enderror
        <div class="field">
            <label for="message">Message</label>
            <textarea name="message" rows="6" placeholder="Message">{{$blog->body}}</textarea>
            @error('body')
            <span style="color: red">{{$errors->first('body')}}</span>
            @enderror
        </div>
        <ul class="actions">
            <li><input value="提交" class="button alt" type="submit"></li>
        </ul>
    </form>

@endsection
