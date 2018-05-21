<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.product.index', trans('product::menus.backend.product.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    @if(access()->hasPermission('create-product'))
        {{ link_to_route('admin.product.create', trans('product::menus.backend.product.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    @endif()
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('product::menus.backend.product.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" product="menu">
            <li>{{ link_to_route('admin.product.index', trans('product::menus.backend.product.all')) }}</li>
            <li>{{ link_to_route('admin.product.create', trans('product::menus.backend.product.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
