<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.order.index', trans('order::menus.backend.order.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    @if(access()->hasPermission('create-order'))
        {{ link_to_route('admin.order.create', trans('order::menus.backend.order.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    @endif()
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('order::menus.backend.order.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" order="menu">
            <li>{{ link_to_route('admin.order.index', trans('order::menus.backend.order.all')) }}</li>
            <li>{{ link_to_route('admin.order.create', trans('order::menus.backend.order.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
