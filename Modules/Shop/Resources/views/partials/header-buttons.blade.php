<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.shop.index', trans('shop::menus.backend.shop.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    @if(access()->hasPermission('create-shop'))
        {{ link_to_route('admin.shop.create', trans('shop::menus.backend.shop.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    @endif()
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('shop::menus.backend.shop.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" shop="menu">
            <li>{{ link_to_route('admin.shop.index', trans('shop::menus.backend.shop.all')) }}</li>
            <li>{{ link_to_route('admin.shop.create', trans('shop::menus.backend.shop.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
