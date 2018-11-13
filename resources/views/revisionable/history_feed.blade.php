<div class="block block-themed">
    <div class="block-header bg-flat">
        <ul class="block-options">
            <li>
                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i
                            class="si si-size-fullscreen"></i></button>
            </li>
            <li>
                <button type="button" data-toggle="block-option" data-action="content_toggle"><i
                            class="si si-arrow-up"></i></button>
            </li>
        </ul>
        <h3 class="block-title">History</h3>
    </div>
    <div class="block-content timeline">
        @if(!$histories->isEmpty())
            <ul class="list list-timeline pull-t">
                @foreach($histories as $history)
                    @include('revisionable.feed_item')
                @endforeach
            </ul>
        @else
            @include('revisionable.empty')
        @endif
    </div>
</div>

@push('scripts')
    {{--<script>--}}
        {{--jQuery(function () {--}}
            {{--// Init page helpers (SlimScroll plugin)--}}
            {{--App.initHelpers('slimscroll');--}}
        {{--});--}}
    {{--</script>--}}
@endpush

