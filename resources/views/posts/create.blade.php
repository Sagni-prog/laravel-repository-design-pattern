@extends('index')
<div class="container my-5">
    <div class="row">
        <div class="col-xl-6 col-12 m-auto">
            <form action="{{ route('post.post')}}" method="POST" class="w-100">
                @csrf
                {{-- @if ($edit)
                    @method('PUT')
                @endif --}}
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title">Post</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group my-2">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="post_title"class="form-control" id="title" required ">
                        </div>

                        <div class="form-group my-2">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea name="post_content" class="form-control" id="content" required></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="#" class="btn btn-secondary">Back</a>

                        {{-- @if (!$view) --}}
                            <button type="submit" class="btn btn-primary">Save</button>
                        {{-- @endif --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>