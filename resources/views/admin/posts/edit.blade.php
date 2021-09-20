@extends('layouts.app')
@section('content')

<div class="container">
@if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li> 
                    @endforeach
                </ul>
            </div>
        @endif

<form action="{{route('admin.posts.update',$post->id)}}" method="post">
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="titolo" class="form-label">titolo</label>
      <input type="string" class="form-control" name="title" id="titolo" value="{{$post->title}}" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
                <label for="category" class="form-label">Categoria</label>
                <select name="category_id" id="category" class="form-control">
                <option value="">- Select a category -</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            @if($category->id == old('category_id', $post->category_id)) selected
                            @endif>
                
                        {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>

    <div class="mb-3">
        <label for="">Scegli tags</label>
        <div class="mb-3 d-flex">
            @foreach($tags as $tag)
            <div class="mx-2">
                <input type="checkbox" id="tag{{$loop->iteration}}" name="tags[]" value="{{$tag->id}}"
                @if($post->tags->contains( $tag->id )) 
                checked 
                @elseif(in_array($tag->id, old('tags', [])))
                checked 
                @endif
                >
                <label for="tag{{$loop->iteration}}">{{$tag->name}}</label>
            </div>    
    
            @endforeach
        </div>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$post->content}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection