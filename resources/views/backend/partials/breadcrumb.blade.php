<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">{{__('Home') }}</a></li>
        @foreach($links as $link)
            <li class="breadcrumb-item active" aria-current="page">
                @if(isset($link['route']))
                    <a href="{{$link['route']}}">{{$link['label']}}</a>
                @else
                    {{$link['label']}}
                @endif

            </li>
        @endforeach
    </ol>
</nav>
