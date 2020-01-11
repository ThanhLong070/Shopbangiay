@if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item" style="color: #0b0b0b">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif