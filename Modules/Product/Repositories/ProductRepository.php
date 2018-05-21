<?php

namespace Modules\Product\Repositories;

use Modules\Product\Entities\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Product::class;

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

    public function create($input)    
    {
        DB::transaction(function () use ($input) {
        $product                    = self::MODEL;
        $product                    = new product();
        $product->name              = $input['name'];
        $product->code_no           = 'P-0000';
        $product->description       = isset($input['description'])? $input['description']: '';
        $product->price             = $input['price'];
        $product->manufacture_date  = date("Y-m-d", strtotime($input['manufacture_date'])); 
        $product->expired_date      = date("Y-m-d", strtotime($input['expired_date'])); 
        $product->ingredients       = $input['ingredients'];
        $product->product_qr        = 'Promotion QR';
        $product->status            = isset($input['status']) ? 1 : 0;
        if (parent::save($product)) {
                return true;      
            }

            throw new GeneralException(trans('product::exceptions.backend.product.create_error'));
        });

    }

    public function update(Model $product, array $input)
    {
       
        $input['description']       = isset($input['description']) ? $input['description'] : '';
        $input['code_no']           = 'P-0000';
        $input['product_qr']        = 'Promotion QR';
       $input['manufacture_date']   = date("Y-m-d", strtotime($input['manufacture_date'])); 
       $input['expired_date']       = date("Y-m-d", strtotime($input['expired_date'])); 
        $input['status']            = isset($input['status']) ? 1 : 0 ; 
        DB::transaction(function () use ($input, $product) {
            if(parent::update($product, $input)){                
                    return true;
                }
            throw new GeneralException(trans('exceptions.backend.knowledge_base.update_error'));
        });
    }
}
