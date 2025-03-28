@foreach($activities as $activity)
    <li class="event-list">
        <div class="event-date text-primary">{{ $activity->created_at->diffForHumans() }}</div>
        <h5>{{ $activity->description }}</h5>
        
        @php
            $properties = $activity->properties->toArray();
        @endphp
    
        <ul class="list-unstyled">
            @foreach ($properties as $key => $val)
                @if(is_array($val))
                    @foreach ($val as $k => $v)
                    <li>
                        <strong>{{ ucfirst(str_replace('_', ' ', $k)) }}:</strong>                    
                        {{ $v }}                   
                    </li>
                    @endforeach                    
                @else
                    <li>
                        <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong>                    
                        {{ $val }}                   
                    </li>
                @endif                    
            @endforeach
        </ul>
    </li>
@endforeach
