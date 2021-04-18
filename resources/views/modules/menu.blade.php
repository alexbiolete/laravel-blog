<div class="list-group">
    <li class="list-group-item disabled">
        Writer Panel
    </li>
    <a href="{{ route('posts') }}" class="list-group-item">
        All Posts
    </a>
    <a href="{{ route('post.create') }}" class="list-group-item">
        Create new post
    </a>
</div>
@if (Auth::user()->admin)
<div class="list-group">
    <li class="list-group-item disabled">
        Administrator Panel
    </li>
    <a href="{{ route('posts.trashed') }}" class="list-group-item">
        Thrashed Posts
    </a>
    <a href="{{ route('categories') }}" class="list-group-item">
        Categories
    </a>
    <a href="{{ route('tags') }}" class="list-group-item">
        Tags
    </a>
    <a href="{{ route('users') }}" class="list-group-item">
        Users
    </a>
    <a href="{{ route('settings') }}" class="list-group-item">
        Settings
    </a>
</div>
@endif