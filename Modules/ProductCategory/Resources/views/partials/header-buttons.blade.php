<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.productcategory.index', trans('productcategory::menus.backend.productcategory.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    @if(access()->hasPermission('create-productcategory'))
        {{ link_to_route('admin.productcategory.create', trans('productcategory::menus.backend.productcategory.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    @endif()
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('productcategory::menus.backend.productcategory.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" productcategory="menu">
            <li>{{ link_to_route('admin.productcategory.index', trans('productcategory::menus.backend.productcategory.all')) }}</li>
            <li>{{ link_to_route('admin.productcategory.create', trans('productcategory::menus.backend.productcategory.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
