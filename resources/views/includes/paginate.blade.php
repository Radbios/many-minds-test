<div class="page-navigation">
    <ul class="pagination">
        {{-- Anterior --}}
        <li class="page-item-before">
            <a href="{{ $page->previousPageUrl() }}" aria-label="Anterior" class="page-link {{ ($page->currentPage() == 1) ? 'disabled' : '' }}">
                <span aria-hidden="true">Anterior</span>
            </a>
        </li>

        {{-- Paginas --}}
        @php
            $start = max(1, $page->currentPage() - 2);
            $end = min($start + 4, $page->lastPage());

            if ($end - $start < 4) {
                $start = max(1, $end - 4);
            }
        @endphp

        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ ($page->currentPage() == $i) ? 'active' : '' }}">
                <a href="{{ $page->url($i) }}" class="page-link">{{ $i }}</a>
            </li>
        @endfor

        {{-- Próximo --}}
        <li class="page-item-previous">
            <a href="{{ $page->nextPageUrl() }}" aria-label="Próximo" class="page-link {{ ($page->currentPage() == $page->lastPage()) ? 'disabled' : '' }}">
                <span aria-hidden="true">Próximo</span>
            </a>
        </li>
    </ul>
</div>
