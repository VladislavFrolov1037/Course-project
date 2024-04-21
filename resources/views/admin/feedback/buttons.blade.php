<div class="container mb-5">
    <ul class="nav nav-tabs" id="advertisementTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ $id === 1 ? 'active' : '' }}" id="all-ads-tab" href="{{ route('admin.feedbacks.index') }}" role="tab"
               aria-controls="all-ads" aria-selected="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                     class="bi bi-list mb-2 mt-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                </svg>
                Ожидаемые идеи
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $id === 2 ? 'active' : '' }}" id="all-ads-tab" href="{{ route('admin.feedbacks.approve') }}" role="tab"
               aria-controls="all-ads" aria-selected="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                     class="bi bi-list mb-2 mt-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                </svg>
                Одобренные идеи
            </a>
        </li>
    </ul>
</div>
