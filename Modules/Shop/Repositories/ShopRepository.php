<?php

namespace Modules\Shop\Repositories;

use Modules\Shop\Entities\Shop;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShopRepository.
 */
class ShopRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Shop::class;

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($order_by = 'created_at', $sort = 'desc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable($order_by = 'created_at', $sort = 'desc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->select('*');
    }

     public function create(array $input)
    { 
        DB::transaction(function () use ($input) {

        $shop               = self::MODEL;
        $shop               = new $shop();
        $shop->name         = $input['name'];
        $shop->address      = $input['address'];
        $shop->opening_hour = $input['opening_hour'];
        $shop->closing_hour = $input['closing_hour'];
        $shop->description  = isset($input['description']) ? $input['description'] : '';
        $shop->status       = isset($input['status']) ? 1 : 0; 
            if (parent::save($shop)) {
                return true;      
            }

            throw new GeneralException(trans('shop::exceptions.backend.shop.create_error'));
        });
    }

    public function update(Model $shop, array $input)
    {
       
        $input['description']  = isset($input['description']) ? $input['description'] : '';
        $input['status']       = isset($input['status']) ? 1 : 0 ; 
        DB::transaction(function () use ($input, $shop) {
            if(parent::update($shop, $input)){                
                    return true;
                }
            throw new GeneralException(trans('exceptions.backend.knowledge_base.update_error'));
        });
    }
}
