<div>
    <div class="list-group list-group-flush w-100 p-0 overflow-auto vh-90 w-100">
        @foreach ($pdfs as $pdf )
            <a class="text-decoration-none list-group-item-action p-1 pdf-doc" href="javascript:void(0);" data-url="{{ $pdf->file_path }}" data-name="{{ $pdf->name }}">
                <div class="callout callout-primary m-0">
                    <h6>{{ $pdf->name }}</h6>
                    {{ $pdf->created_at }}
                </div>
            </a>
        @endforeach
    </div>
</div>
