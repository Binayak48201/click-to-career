@extends('posts.layouts.app')
@section('content')
    <main id="tt-pageContent" class="tw-bg-deep-black/5">
        <div class="container py-4" style="background: white;">
            <div class="tt-wrapper-inner">
                <h1 class="tt-title-border">
                    Edit Posts
                </h1>
                <form class="form-default form-create-topic" method="POST" action="/posts/{{ $forum->slug }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="col-md-12 pl-0 pr-0">
                            <div class="form-group">
                                <label for="inputTopicTitle">Category</label>
                                <select class="form-control" name="category_id">
                                    <option selected>Select</option>
                                    @foreach($channels as $category)
                                        <option value="{{ $category->id }}" {{ ($category->id == $forum->category_id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('category_id')
                        <div class="custom-red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputTopicTitle">Post Title</label>
                        <div class="tt-value-wrapper">
                            <input type="text" name="title" class="form-control" id="inputTopicTitle"
                                   value="{{ $forum->title }}"
                                   placeholder="Subject of your topic">
                        </div>
                        @error('title')
                        <div class="custom-red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="pt-editor">
                        <h6 class="pt-title">Topic Body</h6>
                        <div class="form-group">
                        <textarea name="body" class="form-control" rows="5"
                                  placeholder="Lets get started">{{ $forum->body }}</textarea>
                            @error('body')
                            <div class="custom-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-auto ml-md-auto">
                                <button type="submit" class="btn btn-secondary btn-width-lg">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
