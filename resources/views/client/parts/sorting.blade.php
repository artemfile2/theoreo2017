<div class="sort-category hidden-sm hidden-md hidden-lg">
    <div class="dropdown">
        Сортировать:
        <a data-toggle="dropdown" href="#" class="sort-category__link">По свежести <i class="ico ico-arrow-down-grey sort-category__ico"></i></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li role="presentation">
                <a role="menuitem" tabindex="-1" href="">По рейтингу</a>
            </li>
        </ul>
    </div>
</div>

<div class="sort hidden-xs" style="float: right">
    @if(isset($sort))
        <i class="fa fa-sort" aria-hidden="true"></i> &nbsp; <span class="sort__text">
                Сортировать по:
                <a href="{{ route('client.filterByStatus', ['sort' => 'active']) }}" class="sort__by">свежести</a> или
                <a href="{{ route('client.filterByStatus', ['sort' => 'rating']) }}" class="sort__link link-is-active">рейтингу</a>
        </span>
    @endif
</div>