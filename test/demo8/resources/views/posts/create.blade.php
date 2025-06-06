@extends("layout")

@section("form")
    <h2>New Blog</h2>

    <form action="/blogs" method="post">
        @csrf
        <div class="field half first">
            <label for="name">Title</label>
            <input name="title" type="text" placeholder="Title"></div>
        @error('title')
        <span style="color: green">{{$errors->first('title')}}</span>
        @enderror
        <div class="field">
            <label for="email">简介</label>
            <input name="excerpt" type="text"></div>
        @error('excerpt')
        <span style="color: green">{{$errors->first('excerpt')}}</span>
        @enderror
        <div class="field">
            <label for="message">Message</label>
            <textarea name="message" rows="6" placeholder="Message"></textarea></div>
        @error('body')
        <span style="color: green">{{$errors->first('message')}}</span>
        @enderror
        <ul class="actions">
            <li><input value="提交" class="button alt" type="submit"></li>
        </ul>
    </form>

@endsection
