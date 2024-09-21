<div class="modal modal-blur fade" id="{{ $id }}" tabindex="-1" aria-hidden="false" style="display: none">
    <form action="{{ route('outbox.store') }}" method="{{ $method }}" enctype="multipart/form-data">
        @csrf
        @method("{{ $method }}")
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                {{ $slot }}
            </div>
        </div>
    </form>
    <!-- Well begun is half done. - Aristotle -->
</div>
