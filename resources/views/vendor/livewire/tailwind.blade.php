@php
if (! isset($scrollTo)) {
$scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
? <<<JS
    (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '' ;
    @endphp

    <div>
    @if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <div class="flex justify-between items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                Anterior
            </span>
            @else
            <button
                wire:click="previousPage"
                wire:loading.attr="disabled"
                class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-indigo-50 transition-colors">
                Anterior
            </button>
            @endif

            {{-- Pagination Elements --}}
            <div class="flex space-x-1">
                @foreach ($elements as $element)
                @if (is_string($element))
                <span class="px-3 py-2 text-gray-500">{{ $element }}</span>
                @endif

                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span class="px-3 py-2 text-white bg-indigo-600 border border-indigo-600 rounded-lg cursor-default">
                    {{ $page }}
                </span>
                @else
                <button
                    wire:click="gotoPage({{ $page }})"
                    class="px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-indigo-50 transition-colors">
                    {{ $page }}
                </button>
                @endif
                @endforeach
                @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <button
                wire:click="nextPage"
                wire:loading.attr="disabled"
                class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-indigo-50 transition-colors">
                Siguiente
            </button>
            @else
            <span class="px-4 py-2 text-gray-400 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                Siguiente
            </span>
            @endif
        </div>
    </nav>
    @endif
    </div>