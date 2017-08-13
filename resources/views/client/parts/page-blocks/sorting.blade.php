@if(isset($sort))
    <div class="sort-category  hidden">
        <i class="fa fa-sort" aria-hidden="true"></i>
        <div class="dropdown">
            Сортировать:
            <a data-toggle="dropdown" href="" class="sort-category-link">{{ $sort == 'active' ? 'По свежести' : 'По рейтингу' }}
                <i class="fa fa-chevron-down sort-category-ico" aria-hidden="true"></i></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li role="presentation">
                    <a role="menuitem" tabindex="-1" href="">{{ $sort == 'active' ? 'По рейтингу' : 'По свежести' }}</a>
                </li>
            </ul>
        </div>
    </div>
@endif

<div class="sort">
    @if(isset($sort))
        <i class="fa fa-sort" aria-hidden="true"></i>
        <span class="sort-text">
                Сортировать по:
                <a href="{{ route('client.filterByStatus', ['sort' => 'active']) }}" class="{{ $sort == 'active' ? 'sort-by' : 'sort-link ink-is-active' }}">свежести</a> или
                <a href="{{ route('client.filterByStatus', ['sort' => 'rating']) }}" class="{{ $sort == 'active' ? 'sort-link link-is-active' : 'sort-by' }}">рейтингу</a>
        </span>
    @endif
</div>