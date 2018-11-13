<li>
    <div class="list-timeline-time">{{$history->created_at}}</div>
    <i class="{{$history->key == 'created_at' && !$history->old_value ? 'si si-plus' : 'fa fa-pencil'}} list-timeline-icon bg-flat"></i>
    <div class="list-timeline-content">
        <ul class="nav-users push">
            <li>
                @if($history->key == 'created_at' && !$history->old_value)
                    {{ $history->userResponsible()->achternaam }}
                    , {{ $history->userResponsible()->voornaam }} {{ $history->userResponsible()->tussenvoegsel }}
                    created this resource
                @else
                    {{ $history->userResponsible()->achternaam }}
                    , {{ $history->userResponsible()->voornaam }} {{ $history->userResponsible()->tussenvoegsel }}
                    changed {{ $history->fieldName() }} from {{ $history->oldValue() }} to {{ $history->newValue() }}
                @endif
                {{--<div class="font-w400 text-muted">--}}
                {{--<small>{{$history->place}}</small>--}}
                {{--</div>--}}
            </li>
        </ul>
    </div>
</li>