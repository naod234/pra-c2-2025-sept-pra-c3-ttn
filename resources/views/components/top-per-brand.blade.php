@foreach ($results as $brand => $manuals)
    <h3>{{ $brand }}</h3>
    <ul>
        @foreach ($manuals as $manual)
            <li>{{ $manual->type }} ({{ $manual->views }} views)</li>
        @endforeach
    </ul>
@endforeach
